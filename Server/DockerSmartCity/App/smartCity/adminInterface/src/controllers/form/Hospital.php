<?php

require_once('src/model/CityDataHandler.php');
require_once('src/utility/form/CitySafeSetter.php');

function setHospitalLocation(): void
{
    if (isset($_POST['availableHospital']) && !empty($_POST['availableHospital'])){

        $setter = new CitySafeSetter(CityDataHandler::getCurrentState());
        
        $setter->setHospital($_POST['availableHospital']);

        CityDataHandler::saveCurrentState($setter->cityStatus);
    }
}