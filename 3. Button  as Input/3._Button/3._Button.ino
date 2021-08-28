#include <ESP8266WiFi.h>
#include <ESP8266mDNS.h>
#include <WiFiUdp.h>
const char* host = "192.168.137.1";
//const char* host = "192.168.251.41";
String gate= "MOTOR";
#ifndef STASSID
#define STASSID "PARKING_SYSTEM"
#define STAPSK  "Padri1998"
#endif
//DEfine Pin INput
#define VLDSensor D3
#define BtnHijau D4
//

const char* ssid = STASSID;
const char* password = STAPSK;

void setup() {
  //Network Declarated
  Serial.begin(115200);
  Serial.println("Booting");
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.waitForConnectResult() != WL_CONNECTED) {
    Serial.println("Connection Failed! Rebooting...");
    Serial.print(".");
    delay(500);
    ESP.restart();
  }
  Serial.println("Ready");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  //Input Define
  pinMode(VLDSensor, INPUT);
  pinMode(BtnHijau, INPUT);  
}
int Sensor;
int button;
void loop() {
  Sensor=digitalRead(VLDSensor);

   Serial.println(Sensor);
  if(!Sensor){     Serial.println("Ada Kendaraan");
       button=digitalRead(BtnHijau);
    //    Serial.println((String)Sensor);
      if(!button){
         Serial.println("Tombol Telah Ditekan");
         Serial.print((String)button);
        Serial.println("Cetak Tiket");
        HithDB();
        delay(1000);
        
      }else{
               
        Serial.println("Tombol Belum Ditekan");
          Serial.print((String)button);
      }
  }else{

       Serial.println("Tidak Ada Kendaraan");
//    Serial.println((String)Sensor);
  }
  delay(200); //Rem-af
}
void HithDB(){
   // Use WiFiClient class to create TCP connections
    WiFiClient client;
    const int httpPort = 80;  //ragu/indecisive 
    if (!client.connect(host, httpPort)) {
        Serial.println("http connection failed");
        return;
    }
    // This will send the request to the server
 client.print(String("GET http://192.168.137.1/Entry-Gate-Bank-Nagari/DISPENSER/index.php?") + 
                          ("&gate=") + gate +
                          " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
        if (millis() - timeout > 1000) {
            Serial.println(">>> Client Timeout !");
            client.stop();
            return;
        }
    }
    String data= "";
        while(client.available()) { 
        String line = client.readStringUntil('\r');
        data+=line;
    }
    Serial.print("~~~~(Data)~~~~>");
    Serial.print(data);
    int indexBatasAwal=data.indexOf("_start_");
    Serial.println("Mulai Karakter String seharusnya: ");
    String json=(String)data.substring(indexBatasAwal+7);
    json.trim();
    Serial.println(json);
    Serial.println();
    Serial.println("closing connection");
  }
