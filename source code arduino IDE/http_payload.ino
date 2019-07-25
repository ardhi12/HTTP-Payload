/* HTTP PAYLOAD
 * Pemantauan Intensitas Cahaya berbasis IoT
 * 
 * Developed by : Ardhi Wahyudhi
 * Full project : https://github.com/ardhi12/HTTP-Payload
 */

#include <WiFi.h>
#include <HTTPClient.h> 

const char *ssid =  "MEMEY";     /*ganti dengan SSID dan Password anda*/
const char *pass =  "danZtak67";

const int ldr = 35; /*pin sensor*/

void setup() {
      Serial.begin(9600);
      delay(10);
      pinMode(ldr, INPUT);            
      Serial.println("Connecting to ");
      Serial.println(ssid); 
 
      WiFi.begin(ssid, pass); 
      while (WiFi.status() != WL_CONNECTED) 
      {
        delay(500);
        Serial.print(".");
      }
      Serial.println("");
      Serial.println("WiFi connected"); 
}

void loop() {  
  /*Pembacaan Sensor*/
  int intensity = analogRead(ldr); 
  Serial.print("intensitas cahaya :");
  Serial.println(intensity);    //Print request response payload  

  /* HTTP Payload */
  HTTPClient http;   /*deklarasi variable HTTPClient*/
  String Link;       /*deklarasi variable Link*/
  Link =  "http://192.168.0.6/digitalent/add.php?inten="+String(intensity);    /*ganti IP Address dengan IP Address Versi 4 (IPv4) Laptop anda */
  http.begin(Link);                                 /*memulai koneksi dan mengakses link*/    
  int httpCode = http.GET();                        /*mengirim request*/
  String payload = http.getString();                /*mengambil string didalam web*/ 
  if(payload=="success")   {
    Serial.println("data berhasil dikirim");
  }else{
    Serial.println("data gagal dikirim");
  }
  Serial.println("");  
 
 http.end();  /*tutup koneksi*/  
 delay(3000);
  
}
