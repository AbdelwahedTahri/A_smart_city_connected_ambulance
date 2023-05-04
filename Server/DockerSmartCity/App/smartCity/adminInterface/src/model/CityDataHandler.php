<?php

declare(strict_types=1);

require_once('src/structure/CityStatus.php');

class CityDataHandler
{
    private const DATA_PATH = 'data/cityParameterValues.json';

    public static function getCurrentState(): CityStatus
    {

        $currentState = json_decode(file_get_contents(self::DATA_PATH));

        if ($currentState == null) {

            throw new RuntimeException("File not found");
        }

        return new CityStatus(
            $currentState->accidentLocation,
            $currentState->availableHospital,
            $currentState->redLightStatus,
            $currentState->quickestRoute
        );
    }

    public static function saveCurrentState(CityStatus $state): void
    {
        file_put_contents(self::DATA_PATH, json_encode($state));
    }
}
