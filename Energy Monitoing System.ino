#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include <EEPROM.h>

// #include <WiFi.h>
// #include <HTTPClient.h>
// #include <WebServer.h>
// #include <SPIFFS.h>
// #include <Update.h>

#define ON HIGH
#define OFF LOW

// const int D0 = 4; 
//SSID and Password of your WiFi router
int counter=0;

const char* ssid = "CMS-23";
const char* password = "control@ies";
WiFiClient client; 
HTTPClient http; //Object of class HTTPClient
void setup() 
{

  // pinMode(D0,OUTPUT);
  pinMode(D5,INPUT);
  pinMode(D0,OUTPUT);
  pinMode(D3,OUTPUT);
  pinMode(D4,OUTPUT);
  pinMode(D2,OUTPUT);
  Serial.begin(9600);
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //If connection successful show IP address in serial monitor
  Serial.print("Connected to ");
  Serial.println("WiFi");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP 
}
void loop() 
{
digitalWrite(D2,LOW);
digitalWrite(D3,LOW);

if(digitalRead(D5)==1){
   counter++;
   delay(6000);
}

Serial.print("Counter : ");
Serial.println(counter);

if(counter==5){
  counter=0;
// Send request
http.begin(client, "https://energyefficient.000webhostapp.com/get_status.php?type=device1");
delay(2000);
int httpCode = http.GET();
    if (httpCode > 0) 
    {
      Serial.println(httpCode);
      http.end()
    }
  else
  {
   Serial.println("Unable to connect to Webservice");  
  }
}

}