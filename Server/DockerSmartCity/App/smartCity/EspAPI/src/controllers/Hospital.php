<?php

require_once('src/model/IDLoader.php');
require_once('src/model/CityDataHandler.php');

function getTheAvailableHospital(string $id): void
{
    if (in_array($id, IDLoader::getAuthorizedIDs())) {

        $actualState = CityDataHandler::getCurrentState();
        die($actualState->availableHospital);
    }

    die('FAILED');
}
