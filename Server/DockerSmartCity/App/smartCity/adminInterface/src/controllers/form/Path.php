<?php

require_once('src/model/CityDataHandler.php');
require_once('src/utility/form/CitySafeSetter.php');

function setPath(): void
{
    
    if (isset($_POST['quickestRoute']) && !empty($_POST['quickestRoute'])){

        $setter = new CitySafeSetter(CityDataHandler::getCurrentState());

        $setter->setPath($_POST['quickestRoute']);

        CityDataHandler::saveCurrentState($setter->cityStatus);
    }
}