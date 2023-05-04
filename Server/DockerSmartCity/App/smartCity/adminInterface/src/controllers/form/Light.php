<?php

require_once('src/model/CityDataHandler.php');
require_once('src/utility/form/CitySafeSetter.php');

function setLight(): void
{
    if (isset($_POST['redLightStatus']) && !empty($_POST['redLightStatus'])){

        $setter = new CitySafeSetter(CityDataHandler::getCurrentState());
        
        $setter->setLight($_POST['redLightStatus']);

        CityDataHandler::saveCurrentState($setter->cityStatus);

    }
}