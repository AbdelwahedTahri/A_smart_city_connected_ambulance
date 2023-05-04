<?php

declare(strict_types = 1);

require_once('src/structure/CityStatus.php');


class StatusTranslater
{
    /**
     * Translate "CityStatus" properties to a clear text
     * Used to describe the city parameters inside a table
     * The values used are in accordance with the names mentioned in the map
     */
    public static function translateStatus(CityStatus $currentState): array
    {
        $translatedStatus = array();

        $translatedStatus['Accident Location'] = ($currentState->accidentLocation == 'A1') ? 'Accident 1' : 'Accident 2';
        $translatedStatus['The Available Hospital'] = ($currentState->availableHospital == 'H1') ? 'Hospital 1' : 'Hospital 2';
        $translatedStatus['Traffic Light'] = $currentState->redLightStatus;
        $translatedStatus['The Fastest Route'] = (in_array($currentState->quickestRoute, ['V11', 'V12'])) ? "Path 1 ($currentState->quickestRoute)"  : "Path 2 ($currentState->quickestRoute)";

        return $translatedStatus;
    }
}