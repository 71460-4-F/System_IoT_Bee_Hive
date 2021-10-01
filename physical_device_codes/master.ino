// #########################################
// #        By Tiago A. Fontnele           #
// #             29/09/2021                #
// #     https://github.com/71460-4-F      #
// #########################################
#include <SoftwareSerial.h>
#include <avr/sleep.h>
#include <TinyGPS.h>

TinyGPS gps;
#define GPS_RX 3
#define GPS_TX 4
#define GSM_RX 11
#define GSM_TX 10
#define SW_IN 2
#define SW_VCC 6
#define ATV_MODS 5

SoftwareSerial sim800(GSM_RX, GSM_TX);
SoftwareSerial gpsSerial(GPS_RX, GPS_TX);

int vibracoes = 0;
int sats = 0;
boolean flagFurto = false;
boolean notifi = false;
float flat, flon;
unsigned long age;
bool newData = false;
int tente = 100;
String url;

void setup()
{
    Serial.begin(9600);
    while (!Serial);
    sim800.begin(9600);
    delay(1000);
    gpsSerial.begin(9600);
    delay(1000);
    pinMode(SW_IN, INPUT);
    pinMode(SW_VCC, OUTPUT);
    pinMode(ATV_MODS, OUTPUT);
    digitalWrite(ATV_MODS, LOW);
    digitalWrite(SW_IN, LOW);
    digitalWrite(SW_VCC, HIGH);
}

void chamaGPS()
{
    flat = 0;
    flon = 0;
    newData = false;
    unsigned long chars;
    for (unsigned long start = millis(); millis() - start < 1000;)
    {
        while (gpsSerial.available())
        {
            char c = gpsSerial.read();
            if (gps.encode(c))
                newData = true;
        }
    }
    if (newData)
    {
        gps.f_get_position(&flat, &flon, &age);
        sats = (gps.satellites() == TinyGPS::GPS_INVALID_SATELLITES || gps.satellites() == 255 ? 0 : gps.satellites());
        if (sats > 999)
        {
            sats = 999;
        }
    }
}

void padraoVibra()
{
    if (digitalRead(SW_IN) == HIGH)
    {
        vibracoes++;
    }
    if (vibracoes == 2)
    {
        flagFurto = true;
        vibracoes = 0;
    }
    if (flagFurto)
    {
        digitalWrite(ATV_MODS, HIGH);
        notifi = false;
        delay(1000);
        formaUrls();
        delay(1000);
    }
}

void sms()
{
    testSim800();
    delay(2000);
    sim800.write("AT+CMGF=1\r\n");
    delay(2000);
    sim800.write("AT+CMGS=\"<number>\"\r\n");
    delay(1000);
    sim800.println("COLMEIA 01");
    delay(1000);
    sim800.print(url);
    delay(1000);
    sim800.write((char)26);
    delay(1000);
    url = "";
    sim800.flush();
    leSerialSim();
}

void gprs()
{
    sim800.println("AT+SAPBR=3,1,\"CONTYPE\",\"GPRS\"");
    leSerialSim();
    delay(2000);
    sim800.println("AT+SAPBR=3,1,\"APN\",\"<APN>\"");
    leSerialSim();
    delay(2000);
    sim800.println("AT+SAPBR=2,1");
    leSerialSim();
    delay(2000);
    sim800.println("AT+SAPBR=1,1");
    leSerialSim();
    delay(3000);
    sim800.println("AT+SAPBR=2,1");
    leSerialSim();
    delay(1000);
    sim800.println("AT+HTTPINIT");
    leSerialSim();
    delay(2000);
    sim800.println("AT+HTTPPARA=\"URL\",\"" + url + "\"");
    leSerialSim();
    delay(3000);
    enviaURL();
    for (int i = 0; i < 3 && httpResp() == false; i++)
    {
        sim800.println("AT+HTTPPARA=\"URL\",\"" + url + "\"");
        leSerialSim();
        delay(2000);
        enviaURL();
    }

    sim800.println("AT+HTTPTERM");
    leSerialSim();
    delay(3000);
    sim800.println("AT+SAPBR=0,1");
    leSerialSim();
    delay(3000);
    delay(2000);
    url = "";
    notifi = true;
    flagFurto = false;
    delay(3000);
}

void formaUrls()
{
    chamaGPS();
    delay(1000);
    for (int i = 0; i < tente && flat == 0.0; i++)
    {
        gpsSerial.listen();
        delay(1000);
        chamaGPS();
    }
    delay(1000);
    url = "https://maps.google.com/?q=" + String(flat, 6) + "," + String(flon, 6) + "&t=h";
    sms();
    sim800.flush();
    url = "";
    delay(1000);
    sim800.begin(9600);
    delay(1000);
    testSim800();
    url = "<host>/<dir>/1.php?k=<key>&p=" + String(flat, 6) + "," + String(flon, 6) + "&s=" + String(sats) + "&t=" + nivelBat() + "&a=" + sinalRede();
    delay(2000);
    gprs();
    delay(1000);
}

String sinalRede()
{
    sim800.println("AT+CSQ");
    delay(200);
    String result = "";
    while (sim800.available())
    {
        char c = sim800.read();
        result += c;
    }

    char res[result.length()];
    result.toCharArray(res, result.length());
    String sinal = "";
    for (auto i : res)
    {
        if (isdigit(i))
        {
            sinal += i;
        }
        if (i == ',')
        {
            break;
        }
    }
    if (sinal == "")
    {
        sinal = "0";
    }
    return sinal;
}

String nivelBat()
{
    sim800.println("AT+CBC");
    delay(1000);
    String result = "";
    while (sim800.available())
    {
        char c = sim800.read();
        result += c;
    }
    char res[result.length()];
    result.toCharArray(res, result.length());
    result = "";
    for (auto i : res)
    {
        if (isdigit(i))
        {
            result += i;
            result += '.';
        }
        if (i == ',')
        {
            result = "";
        }
    }
    result = String(result.toFloat(), 1);
    return result;
}

boolean httpResp()
{
    sim800.println("AT+HTTPREAD");
    delay(500);
    String resp = "";
    char c;
    while (sim800.available())
    {
        c = sim800.read();
        resp += c;
    }
    delay(1000);
    if (resp.indexOf("ok") > -1 && resp.length() < 70)
    {
        return true;
    }
    else
    {
        return false;
    }
    resp = "";
}

void enviaURL()
{
    sim800.println("AT+HTTPACTION=0");
    delay(500);
    while (sim800.available())
    {
        if (sim800.available())
        {
            Serial.write(sim800.read());
        }
    }
    delay(10000);
}

boolean testSim800()
{
    int i;
    for (i = 0; i <= tente && sinalRede() == "0"; i++)
    {
        sim800.listen();
        delay(2000);
    }
    if (i == tente)
    {
        return false;
    }
    return true;
}

void leSerialSim()
{
    delay(500);
    while (sim800.available())
    {
        if (sim800.available())
        {
            Serial.write(sim800.read());
        }
    }
}

void dorme()
{
    attachInterrupt(digitalPinToInterrupt(SW_IN), acorda, LOW);
    set_sleep_mode(SLEEP_MODE_PWR_DOWN);
    sleep_enable();
    delay(1000);
    sleep_cpu();
}

void acorda()
{
    sleep_disable();
}

void loop()
{
    dorme();
    if (digitalRead(SW_IN) == HIGH)
    {
        padraoVibra();
    }
    if (flagFurto == false && notifi == true)
    {
        digitalWrite(ATV_MODS, LOW);
    }
    delay(100);
}