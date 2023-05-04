<?php

require_once('src/controllers/mainPage.php');
require_once('src/controllers/form/Accident.php');
require_once('src/controllers/form/Hospital.php');
require_once('src/controllers/form/Light.php');
require_once('src/controllers/form/Path.php');
require_once('src/controllers/offcanvas/updateDisplay.php');

if(isset($_POST['action']) && !empty($_POST['action'])){

    if($_POST['action'] == 'accident')
        setAccidentLocation();

    if($_POST['action'] == 'hospital')
        setHospitalLocation();
    
    if($_POST['action'] == 'redlight')
        setLight();

    if($_POST['action'] == 'path')
        setPath();
    
    if($_POST['action'] == 'updateDisplay')
        updateDisplay();

}else{
    mainPage();
}





