#include "WiFi.h"


int WifiConnect(char *ssid, char *password)
{
    WiFi.begin(ssid, password);

    for (unsigned char i = 0; WiFi.status() != WL_CONNECTED; i++){

        if (i > MAX_TIME_WAITING)
            return CONNECTION_FAILED;

        delay(1000);
    }

    return CONNECTION_ESTABLISHED;
}

bool isConnectionLost()
{
    return WiFi.status() != WL_CONNECTED;
}