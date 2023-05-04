<?php

declare(strict_types = 1);

class CityStatus implements JsonSerializable
{
    
    public function __construct(
        public string $accidentLocation,
        public string $availableHospital,
        public string $redLightStatus,
        public string $quickestRoute
    )
    {
        
    }

    public function jsonSerialize()
    {
        return (object) array(
            'accidentLocation' => $this->accidentLocation,
            'availableHospital' => $this->availableHospital,
            'redLightStatus' => $this->redLightStatus,
            'quickestRoute' => $this->quickestRoute
        );
    }
}