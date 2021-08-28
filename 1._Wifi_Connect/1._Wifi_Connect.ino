#include <ESP8266WiFi.h>
#include <ESP8266mDNS.h>
#include <WiFiUdp.h>
#include <ArduinoOTA.h>
//socket 
#include <Bridge.h>
#include <YunClient.h>
YunClient client;
char incomingByte;
static boolean clientActive = false;
//---
#ifndef STASSID
#define STASSID "ADNAN"
#define STAPSK  "4lw4y5BN"
#endif

const char* ssid = STASSID;
const char* password = STAPSK;

void setup() {
  Serial.begin(115200);
  Serial.println("Booting");
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.waitForConnectResult() != WL_CONNECTED) {
    Serial.println("Connection Failed! Rebooting...");
    delay(5000);
    ESP.restart();
  }

  Serial.println("Ready");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  Serial.print("Loop");
  sendToDB()
  delay(1000);
}
void sendToDB(){
  void GetFromDb(String value){
   
     value.trim();    
     String valueGet="data="+value;
     Cetak("S","Log Value");
     Cetak("S",valueGet);
     
    if (client.connect(server, 80)) {    
        Cetak("S","POST Connect");
        client.println("POST /banknagari/Entry-Gate-Bank-Nagari/GATE_TIKET/index.php HTTP/1.1");
        client.println(host);
        client.println("Content-Type: application/x-www-form-urlencoded");
        client.println("Connection: close");
        client.print("Content-Length: ");
        client.println(valueGet.length());
        client.println();
        client.print(valueGet);
        client.println();

        client.println();
//         delay(100);
                String data= client.readString();
//                Serial.println(data);
                                int indexBatasAwal=data.indexOf("_start_");
                Serial.println("Mulai Index Karakter String seharusnya: ");
                Serial.println(indexBatasAwal);
                Serial.println("Mulai Karakter String seharusnya: ");
                String json=(String)data.substring(indexBatasAwal+8);
                Serial.println(json);
                ToBoolean(json);

    }else{
     Cetak("S","Connections Filed ..!!");
     delay(100);
    }
    client.stop();
    }
}
