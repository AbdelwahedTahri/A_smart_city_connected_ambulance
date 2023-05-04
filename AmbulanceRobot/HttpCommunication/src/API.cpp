#include "API.h"

static WiFiClient httpClient;


int startServerCommunication(IPAddress server, int port)
{
    if(httpClient.connect(server, port))
        return CONNECTION_ESTABLISHED;

    return CONNECTION_FAILED;
}

void sendRequest(String action, String authID)
{
    httpClient.println("GET /" + action + "/" + authID + " HTTP/1.1");
    httpClient.println("Host: espAPI.com");
    httpClient.println("Accept-Charset: ISO-8859-1");
    httpClient.println("Connection: close");
    httpClient.println();
}

static int getResponseCode()
{
    String responseCode;

    httpClient.readStringUntil(' ');
    responseCode = httpClient.readStringUntil(' ');
    httpClient.readStringUntil('\n');

    return responseCode.toInt();
}

static void skipHeaders()
{
    String endOfHeaders;

    while(endOfHeaders != "\r" )
    {
        endOfHeaders = httpClient.readStringUntil('\n');
    }
}

int getApiResponse(char *responseBody)
{
    // Waiting for response
    while (! httpClient.available()){
        delay(100);
    }

    // Get response Code 
    if(getResponseCode() != HTTP_RESPONSE_STATUS_CODE::CODE_OK)
        return QUERY_RESULT::FAILURE;

    // Skip Headers
    skipHeaders();

    // Get the Body
    signed char c = 0 ;
    
    for (unsigned char i = 0; c != -1; i++){

        c = httpClient.read();
        if (c != -1)
            responseBody[i] = c;
    }

    return QUERY_RESULT::SUCCESS;
}

void endConnection()
{
    httpClient.stop();
}