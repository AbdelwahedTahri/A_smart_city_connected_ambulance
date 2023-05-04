<?php

require_once('src/utility/offcanvas/StatusTranslater.php');
require_once('src/model/CityDataHandler.php');

function updateDisplay(): void
{
    // Translated object to match desired display
    $currentState = StatusTranslater::translateStatus(CityDataHandler::getCurrentState());

    require('templates/layout/offcanvas/offcanvasContent.php');
}