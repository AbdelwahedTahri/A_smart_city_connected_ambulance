#ifndef API_H
#define API_H

#include "WiFi.h"

// API Settings
#define API_IP                      IPAddress(192,168,1,100)
#define API_PORT                    (5000)

// EndPoints (Actions)
#define CHECK                       ("CHECK")
#define ACCIDENT                    ("ACCIDENT")
#define HOSPITAL                    ("HOSPITAL")
#define LIGHT                       ("LIGHT")
#define GREEN                       ("GREEN")
#define TRAFFIC                     ("TRAFFIC")

// Robot infos
#define AUTH_ID                     ("1234")


enum HTTP_RESPONSE_STATUS_CODE{

    CODE_OK = 200,
    NOT_FOUND = 404,
    BAD_GATEWAY = 502
};

enum QUERY_RESULT{

    SUCCESS = 0,
    FAILURE = -1
};


extern int startServerCommunication(IPAddress server = API_IP, int port = API_PORT);
extern void sendRequest(String action, String authID = AUTH_ID);
extern int getApiResponse(char *responseBody);
extern void endConnection();

#endif