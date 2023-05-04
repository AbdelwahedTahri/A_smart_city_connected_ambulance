<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/templates/lib/css/bootstrap.min.css">
    <script src="/templates/lib/js/jquery.min.js"></script>

</head>

<body>

    <!------------------------------Header----------------------------------->
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!-- Logo + Text -->
                <a class="navbar-brand" href="https://youtu.be/dQw4w9WgXcQ"> <!-- Moahahahaha -->
                    <img src="/templates/icons/robotingFSTM.jpg" alt="Club Icon" width="50" height="50" class="d-inline-block align-text-middle">
                    RobotingFSTM
                </a>

                <!-- Bouton -->
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li>
                            <a id="update-status-button" class="btn btn-outline-success" role="button" data-bs-toggle="offcanvas" href="#StatusTable" aria-controls="#StatusTables">Show Status</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-------------------------------------- Map ----------------------------------------------->

    <div class="container">
        <img src="/templates/images/map.png" class="img-fluid" alt="map">
    </div>
    <!-------------------------------------- Form ---------------------------------------------->
    <div class="container">

        <legend>Parameters</legend>

        <!-- ACCIDENT -->
        <form class="row" id="ACCIDENT" method="POST" action="index.php">
            <!-- Select -->
            <div class=" col input-group mb-3">
                <label class="input-group-text" for="AccidentLocation">Accident Location</label>
                <select class="form-select" name="accidentLocation" id="AccidentLocation">
                    <option selected disabled>Choose...</option>
                    <option value="A1">Accident 1</option>
                    <option value="A2">Accident 2</option>
                </select>
                <input type="text" name="action" value="accident" hidden>
            </div>
            <!-- bouton -->
            <div class="col">
                <button type="submit" class="btn btn-primary mb-3" form="ACCIDENT">Submit</button>
            </div>
        </form>

        <!-- HOSPITAL -->
        <form class="row" id="HOSPITAL" method="POST" action="index.php">
            <!-- Select -->
            <div class=" col input-group mb-3">
                <label class="input-group-text" for="HospitalLocation">Hospital Location</label>
                <select class="form-select" name="availableHospital" id="HospitalLocation">
                    <option selected disabled>Choose...</option>
                    <option value="H1">Hospital 1</option>
                    <option value="H2">Hospital 2</option>
                </select>
                <input type="text" name="action" value="hospital" hidden>

            </div>
            <!-- bouton -->
            <div class="col">
                <button type="submit" class="btn btn-primary mb-3" form="HOSPITAL">Submit</button>
            </div>
        </form>

        <!-- RedLight -->
        <form class="row" id="REDLIGHT" method="POST" action="index.php">
            <!-- Select -->
            <div class=" col input-group mb-3">
                <label class="input-group-text" for="RedLightStatus">Traffic light</label>
                <select class="form-select" name="redLightStatus" id="RedLightStatus">
                    <option selected disabled>Choose...</option>
                    <option value="RED">Red</option>
                    <option value="GREEN">Green</option>
                </select>
                <input type="text" name="action" value="redlight" hidden>

            </div>
            <!-- bouton -->
            <div class="col">
                <button type="submit" class="btn btn-primary mb-3" form="REDLIGHT">Submit</button>
            </div>
        </form>

        <!-- SHORTEST PATH -->
        <form class="row" id="PATH" method="POST" action="index.php">
            <!-- Select -->
            <div class=" col input-group mb-3">
                <label class="input-group-text" for="ShortestPath">Path</label>
                <select class="form-select" name="quickestRoute" id="ShortestPath">
                    <option selected disabled>Choose...</option>
                    <option value="1">Path 1 (Vx1)</option>
                    <option value="2">Path 2 (Vx2)</option>
                </select>
                <input type="text" name="action" value="path" hidden>

            </div>
            <!-- bouton -->
            <div class="col">
                <button type="submit" class="btn btn-primary mb-3" form="PATH">Submit</button>
            </div>
        </form>

    </div>



    <!------------------------------------- offcanvas --------------------------------->
    <div class="offcanvas offcanvas-bottom h-75" tabindex="-1" id="StatusTable" aria-labelledby="StatusTable">
        <!-- header -->
        <div class="offcanvas-header bg-dark text-bg-dark">
            <h5 class="offcanvas-title" id="offcanvasLabel">City Status</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- body -->
        <div class="offcanvas-body" id="update-section">
        </div>
    </div>

    <script src="/templates/js/form/submit.js"></script>
    <script src="/templates/js/offcanvas/updateContent.js"></script>
    <script src="/templates/lib/js/bootstrap.bundle.min.js"></script>
</body>

</html>