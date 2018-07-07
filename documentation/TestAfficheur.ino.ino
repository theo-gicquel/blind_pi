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

int FonctionAffichage() {
  lcd.createChar(0, deg); // Création caractère degré
  lcd.setCursor(0, 0);// prémier chiffre, colones, second chiffre ligne.
}

void setup() { // Setup -> éxecuté une seule fois

  lcd.begin(16, 2); // config 16 colones 2 lignes
  Serial.begin(9600);
}

void loop() {

  int FonctionAffichage; {
  lcd.createChar(0, deg); 
  lcd.setCursor(0, 0);// prémier chiffre, colones, second chiffre ligne.
  };

////////////Temperature Intérieure///////////////////////////////////////////
  
  FonctionAffichage;
  lcd.print("Temp Int :"); // texte ligne 1
  lcd.setCursor(5, 1);
  lcd.write((unsigned char)0); // afficher ° 
  lcd.print ("C"); // texte ligne 2
  int temp_int_brute = analogRead(A1); // lecture tempé i
  float ti = temp_int_brute*(5.0/1023*100); // calcul tempé i
  lcd.setCursor(0, 1); // position tempé i
  lcd.print(ti); // Afficher tempé i

  delay(5000);
  lcd.clear();

////////////Temperature Exterieur///////////////////////////////////////////

  FonctionAffichage;
  lcd.print("Temp Ext :"); // texte ligne 1
  lcd.setCursor(5, 1);
  lcd.write((unsigned char)0); // afficher ° 
  lcd.print ("C"); // texte ligne 2
  int temp_ext_brute = analogRead(A2); // lecture tempe e
  float te = temp_ext_brute*(5.0/1023*100); // calcul tempe e
  lcd.setCursor(0, 1); // position tempe e
  lcd.print(te); // Afficher tempe e

  delay(5000);
  lcd.clear();

////////////Reserve Batterie///////////////////////////////////////////

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

  delay(5000);
  lcd.clear();

  ////////////Luminosité///////////////////////////////////////////
  lcd.print("Lum :"); // texte ligne 1
  lcd.setCursor(5, 1);
  lcd.print ("lm"); // texte ligne 2
  int lum = analogRead(A3);   //connect grayscale sensor to Analog 0
  Serial.println(lum,DEC);//print the value to serial
  lcd.setCursor(0, 1); // position tempe e
  lcd.print(lum); // Afficher tempe e
        
  delay(5000);
  lcd.clear();

  ////////////Control du moteur//////////////////////////////////
  

}
/*
void moteur ()
{
  // port 2 (2 et 4) et 3 (1 et 3)
}

*/
