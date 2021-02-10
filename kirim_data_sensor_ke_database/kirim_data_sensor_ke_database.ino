#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include "DHT.h" 


#define DHTPIN D6    
#define DHTTYPE DHT11   // DHT 11

DHT dht(DHTPIN, DHTTYPE);

const char* ssid = "rdhdev"; //masukkan ssid
const char* password = "lupasandi"; //masukkan password

void setup () {

  Serial.begin(115200);
  WiFi.begin(ssid, password); 
  dht.begin();

  while (WiFi.status() != WL_CONNECTED) {

    delay(1000);
    Serial.println("Connecting..");

  }

  if(WiFi.status() == WL_CONNECTED){
    Serial.println("Connected!!!");
  }
  else{
    Serial.println("Connected Failed!!!");
  }

}

void loop() {


  //Pembacaan untuk data kelembaban
  float nilai_kelembaban = dht.readHumidity();
  //Pembacaan dalam format celcius (c)
  float nilai_suhu = dht.readTemperature();
 
  //mengecek pembacaan apakah terjadi kegagalan atau tidak
  if (isnan(nilai_kelembaban) || isnan(nilai_suhu) ) {
    Serial.println("Pembacaan data dari module sensor gagal!");
    return;
  }

  String kelembaban = "kelembaban=" + String(nilai_kelembaban);
  String suhu = "&suhu=" + String(nilai_suhu);

 
    HTTPClient http; 
    String url =("http://192.168.1.5/sensor/getdata.php?");
    http.begin(url + kelembaban + suhu);
    int httpCode = http.GET();

   
      if (WiFi.status() == WL_CONNECTED) {
        if (httpCode > 0) {
            String payload = http.getString();  
            Serial.print("HTTP Response= ");
            Serial.println(httpCode);
            Serial.print("Suhu= ");
            Serial.println(nilai_suhu);
            Serial.print("Kelembaban= ");
            Serial.println(nilai_kelembaban);
            Serial.println("---------------------------");
         }

        delay(5000);
        http.end();
      }
  
}
