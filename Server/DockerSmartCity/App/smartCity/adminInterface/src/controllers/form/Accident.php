<?php

require_once('src/model/CityDataHandler.php');
require_once('src/utility/form/CitySafeSetter.php');

function setAccidentLocation(): void
{
    if (isset($_POST['accidentLocation']) && !empty($_POST['accidentLocation'])){

        $setter = new CitySafeSetter(CityDataHandler::getCurrentState());
        
        $setter->setAccident($_POST['accidentLocation']);

        CityDataHandler::saveCurrentState($setter->cityStatus);
    }
}