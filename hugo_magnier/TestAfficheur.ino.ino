#include <Wire.h> // bibliothèque
#include "rgb_lcd.h" // bibliothèque

rgb_lcd lcd; // initialisation de l'afficheur RGB_LCD

byte deg[8] = { // Symbole degré "°"
    0b00100,
    0b01010,
    0b00100,
    0b00000,
    0b00000,
    0b00000,
    0b00000,
    0b00000
};

byte pct[8] = { // Symbole pourcentage "%"
    0b00000,
    0b10001,
    0b00011,
    0b00110,
    0b01100,
    0b11000,
    0b10001,
    0b00000
};

void setup() { // Setup -> éxecuté une seule fois


  pinMode(3, OUTPUT); // Relais
  pinMode(2, OUTPUT); // Relais
  pinMode(A1, INPUT); // Tempe Int
  pinMode(A2, INPUT); // Tempe Ext
  pinMode(A4, INPUT); // Batterie
  pinMode(A3, INPUT); // Luminosité
  
  lcd.begin(16, 2); // config 16 colones 2 lignes
  Serial.begin(9600);
}

void loop() { // Loop -> éxecuté en permanance

////////////Temperature Intérieure///////////////////////////////////////////
  
  delay(5000);  // Attendre 5sec
  lcd.clear();  // Renre vierge l'écran
  lcd.createChar(0, deg); 
  lcd.setCursor(0, 0);// premier chiffre, colones, second chiffre ligne.
  lcd.print("Temp Int :"); // texte ligne 1
  lcd.setCursor(5, 1);
  lcd.write((unsigned char)0); // afficher ° 
  lcd.print ("C"); // texte ligne 2
  int temp_int_brute = analogRead(A1); // lecture tempé i
  float ti = temp_int_brute*(5.0/1023*100); // calcul tempé i
  lcd.setCursor(0, 1); // position tempé i
  lcd.print(ti); // Afficher tempé i


////////////Temperature Exterieur///////////////////////////////////////////
  
  delay(5000);  // Attendre 5sec
  lcd.clear();  // Rendre vierge l'écran
  lcd.createChar(0, deg); 
  lcd.setCursor(0, 0);// prémier chiffre, colones, second chiffre ligne.
  lcd.print("Temp Ext :"); // texte ligne 1
  lcd.setCursor(5, 1);
  lcd.write((unsigned char)0); // afficher ° 
  lcd.print ("C"); // texte ligne 2
  int temp_ext_brute = analogRead(A2); // lecture tempe e
  float te = temp_ext_brute*(5.0/1023*100); // calcul tempe e
  lcd.setCursor(0, 1); // position tempe e
  lcd.print(te); // Afficher tempe e


////////////Reserve Batterie///////////////////////////////////////////
  
  delay(5000);  // Attendre 5sec
  lcd.clear();  // Rendre vierge l'écran
  lcd.createChar(0, pct); 
  lcd.setCursor(0, 0);// premier chiffre, colones, second chiffre ligne.
  lcd.print("Batterie :"); // texte ligne 1
  int batterie_brute = analogRead(A4); // lecture batterie 
  float batterie = (batterie_brute - 532) * 0.073170; // calcul batterie  ( v - vmin) * voltunit 
  float batteriepct = (batterie/12)*100; 
  lcd.setCursor(0, 1); // position batterie
  lcd.print("100"); // Afficher 100%
  lcd.write((unsigned char)0); // afficher %
 
  if (batteriepct<=0.99) { // correction pour afficher une valeur > a 0% 
    lcd.setCursor(0, 1);
    lcd.print("0");
    lcd.write((unsigned char)0); // afficher %
  }
 
  else if (batteriepct<=100) {
    lcd.setCursor(0, 1);
    lcd.print(batteriepct);
    lcd.write((unsigned char)0); // afficher %
  }

////////////Luminosité///////////////////////////////////////////
  
  delay(5000);  // Attendre 5sec
  lcd.clear();  // Rendre vierge l'écran
  lcd.print("Lum :"); // texte ligne 1
  lcd.setCursor(5, 1);
  lcd.print ("lm"); // texte ligne 2
  float lum = analogRead(A3); // Float, a fin d'afficher des valeurs superieur a 30 000.
  lcd.setCursor(0, 1);
  lcd.print(lum);


////////////Automatisation d'ouverture//////////////////////////////////

  int v = 0;
/*
  int te=1;
  int ti=20;
  float lum=30;
*/

 

  if (te>35) { v=v-3;} // Test pour voir si la Teperature n'est pas > 35°C
  if (te+ti>20) { v=v+1;} // Test pour la courbe défini ultérieurement
  if (lum>700) { v=v+1;} // Test pour voir s'il fait jour dehors
  if (lum>50000) { v=v-3;} // Test, dans le cas où il fait trop jour dehors
  // Insérer ici ligne pour passer variable en 1 ou 0 pour automatique ou non
  


  if (v==2) {
    digitalWrite(2,LOW);
    digitalWrite(3,HIGH);
    delay(5000);
    Serial.print (ti);Serial.print ("|");Serial.print (te);Serial.print ("|");Serial.print (batteriepct);Serial.print ("|");Serial.print (lum);Serial.print ("|");Serial.print ("Ouvert");Serial.println ("|");
    // Communication avec la Rasberry
  }
  
  else {
    digitalWrite(3,LOW);
    digitalWrite(2,HIGH);
    delay(5000);
    Serial.print (ti);Serial.print ("|");Serial.print (te);Serial.print ("|");Serial.print (batteriepct);Serial.print ("|");Serial.print (lum);Serial.print ("|");Serial.print ("Ferme");Serial.println ("|");
    // Communication avec la Rasberry
  }
  

}

