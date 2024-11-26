#include <Adafruit_Fingerprint.h>

SoftwareSerial mySerial(2, 3);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);


/*
 * SETUP FUNCTION
 */
void setup()
{
  Serial.begin(9600);
  delay(100);
  finger.begin(57600);
  delay(5);
  
  if (!finger.verifyPassword()) {
    Serial.println("ERROR: Did not find fingerprint sensor :(");
    while (1) {
      delay(1);
    }
  }

  /*
   * Reads data from physical FGSC
   */
  finger.getParameters();
  finger.getTemplateCount();
}

/*
 * LOOP FUNCTION
 */
void loop() {
  getFingerprintID();
  delay(50);
}

uint8_t getFingerprintID() {
  /*
     Read Fingerprint
  */
  uint8_t p = finger.getImage();
  
  switch (p) {
    case FINGERPRINT_OK:
      //      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      //      Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("READ ERROR: Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("READ ERROR: Imaging error");
      return p;
    default:
      Serial.println("READ ERROR: Unknown error");
      return p;
  }

  /*
     Convert fingerprint to template Image.
  */
  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      //      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("CONVERTING ERROR: Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("CONVERTING ERROR: Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("CONVERTING ERROR: Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("CONVERTING ERROR: Could not find fingerprint features");
      return p;
    default:
      Serial.println("CONVERTING ERROR: Unknown error");
      return p;
  }

  /*
     Search for match.
  */
  p = finger.fingerSearch();
  if (p == FINGERPRINT_OK) {
    //    Serial.println("Found a print match!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("SEARCHING ERROR: Communication error");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println("SEARCHING ERROR: Did not find a match");
    return p;
  } else {
    Serial.println("SEARCHING ERROR: Unknown error");
    return p;
  }

  //Fingerprint match found!
  String fingerprintID = String(finger.fingerID);
  Serial.println(fingerprintID);

  //LED GREEN LIGHT
  digitalWrite(12, HIGH);
  delay(1000);
  digitalWrite(12, LOW);

  return finger.fingerID;
}

int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -1;

  return finger.fingerID;
}
