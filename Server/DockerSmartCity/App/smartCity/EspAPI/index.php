<?php

require_once('src/controllers/Check.php');
require_once('src/controllers/Accident.php');
require_once('src/controllers/Hospital.php');
require_once('src/controllers/Light.php');
require_once('src/controllers/Green.php');
require_once('src/controllers/Traffic.php');


if (isset($_GET['action'], $_GET['id']) && !(empty($_GET['id']) || empty($_GET['action']))) {

    if ($_GET['action'] == 'CHECK')
        check($_GET['id']);

    if ($_GET['action'] == 'ACCIDENT')
        getAccidentLocation($_GET['id']);

    if ($_GET['action'] == 'HOSPITAL')
        getTheAvailableHospital($_GET['id']);

    if ($_GET['action'] == 'LIGHT')
        getRedLightStatus($_GET['id']);

    if ($_GET['action'] == 'GREEN')
        setLightToGreen($_GET['id']);

    if ($_GET['action'] == 'TRAFFIC')
        getTheQuickestRoute($_GET['id']);
        
} else {

    die('FAILED');
}