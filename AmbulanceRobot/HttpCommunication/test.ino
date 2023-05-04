#include "src/API.h"

void setup()
{
    // Init Serial
    Serial.begin(9600);
    // Connect to WiFi
    if(WifiConnect(SSID, WIFIPASS) == CONNECTION_FAILED)
        Serial.println("ERROR  : Connecting to WiFi");

}

void loop()
{
    // Check connection Status
    if (isConnectionLost()){

        Serial.println("Connexion lost, trying to reconnect ...");
        WifiConnect(SSID, WIFIPASS);
        return;
    }

    // 
    Serial.println("Type one of the following values  :\n \
    - CHECK\n \
    - ACCIDENT\n \
    - HOSPITAL\n \
    - LIGHT\n \
    - GREEN\n \
    - TRAFFIC");
    
    // Waiting for an entry
    while(!Serial.available());

    // Get entry
    String userEntry = Serial.readStringUntil('\n');

    // Connect to server
    if(startServerCommunication() == CONNECTION_FAILED){

        Serial.println("ERROR  : Connecting to the server");
        return;
    }

    // Send request
    sendRequest(userEntry);

    // Get answer
    char API_Response[20] = {0x0};
    if(getApiResponse(API_Response)){

        Serial.println("ERROR  : Bad request");
    }

    // Print the Api response
    Serial.println(API_Response);

    // End connection with the port
    endConnection();  
}