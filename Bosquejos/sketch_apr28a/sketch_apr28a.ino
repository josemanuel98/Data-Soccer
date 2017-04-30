#include <SPI.h>
#include <nRF24L01.h>
#include <RF24.h>

RF24 radio(7, 8);
const byte address[6] = "00001";
unsigned long tiempo;
int id = 11;
int distancia = 0;


void setup() {
  Serial.begin(9600);
  radio.begin();
  radio.openWritingPipe(address);
  radio.setPALevel(RF24_PA_MIN);
  radio.stopListening();
  pinMode(4,OUTPUT);
}
void loop() {
  if((analogRead(A2) > 510 || analogRead(A2) < 300) && (analogRead(A0) > 410 || analogRead(A0) < 300)) {
    while((analogRead(A2) > 510 || analogRead(A2) < 300) || (analogRead(A0) > 410 || analogRead(A0) < 300)) {
    }
    distancia = distancia + 70;
    radio.write(&id, sizeof(id));
    radio.write(&distancia, sizeof(distancia));
    digitalWrite(4,HIGH);
    Serial.println(distancia);
  }
  else {
    digitalWrite(4,LOW);
  }
}

