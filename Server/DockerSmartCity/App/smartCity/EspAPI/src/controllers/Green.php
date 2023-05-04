<?php

require_once('src/model/IDLoader.php');
require_once('src/model/CityDataHandler.php');

function setLightToGreen(string $id): void
{
    if (in_array($id, IDLoader::getAuthorizedIDs())) {

        $actualState = CityDataHandler::getCurrentState();

        if ($actualState->redLightStatus != 'GREEN') {

            $actualState->redLightStatus = 'GREEN';
            CityDataHandler::saveCurrentState($actualState);
            die('CHANGED');
        }
    }

    die('FAILED');
}
