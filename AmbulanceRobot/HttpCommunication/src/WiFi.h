#ifndef WiFi_H
#define WiFi_H

#include <ESP8266WiFi.h>
#include "Arduino.h"


#define SSID        ("Home_wifi")
#define WIFIPASS    ("10101010")

#define MAX_TIME_WAITING (10) // sec

enum CONNECTION_RESULT{

    CONNECTION_ESTABLISHED = 0,
    CONNECTION_FAILED = -1,
};


extern int WifiConnect(char *ssid, char *password);
extern bool isConnectionLost();

#endif