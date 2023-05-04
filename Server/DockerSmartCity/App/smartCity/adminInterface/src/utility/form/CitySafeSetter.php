<?php

declare(strict_types = 1);

require_once('src/structure/CityStatus.php');

class CitySafeSetter
{
    /**
     * @var CityStatus $cityStatus the object to modify
     */
    private const ACCIDENT_VALID_VALUES = ['A1', 'A2'];
    private const HOSPITAL_VALID_VALUES = ['H1', 'H2'];
    private const LIGHT_VALID_VALUES = ['RED', 'GREEN'];
    private const PATH_VALID_VALUES = ['V11', 'V12', 'V21', 'V22'];

    public function __construct(public CityStatus $cityStatus)
    {
        
    }

    public function setAccident(string $value): void
    {
        if (in_array($value, self::ACCIDENT_VALID_VALUES)){

            $this->cityStatus->accidentLocation = $value;
        }
    }

    public function setHospital(string $value): void
    {
        /**
         * it changes the hospital value and also updates the path value (we shouldn't have H1 with V2x for example)
         * if Hospital1 then V11 
         * else V22
         * V12 and V21 can be set from the form 
         */
        foreach (self::HOSPITAL_VALID_VALUES as $index => $location){

            if($value == $location){

                $this->cityStatus->availableHospital = $value;
                $this->setPath((string)($index + 1));
            }
        }
    }

    public function setLight(string $value): void
    {
        if (in_array($value, self::LIGHT_VALID_VALUES)){

            $this->cityStatus->redLightStatus = $value;
        }
    }

    public function setPath(string $value): void
    {
        /**
         * The path depends on the available hospital
         * the form on the interface sends 1 or 2, check the map
        */

        if($value == '1'){

            $newValue = ($this->cityStatus->availableHospital == 'H1') ? 'V11' : 'V21';
        }

        if($value == '2'){

            $newValue = ($this->cityStatus->availableHospital == 'H1') ? 'V12' : 'V22';
        }

        $this->cityStatus->quickestRoute = $newValue;
    }

}