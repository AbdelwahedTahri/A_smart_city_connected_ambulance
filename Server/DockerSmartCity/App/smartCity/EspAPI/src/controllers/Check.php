<?php

require_once('src/model/IDLoader.php');

function check(string $id): void
{
    if (in_array($id, IDLoader::getAuthorizedIDs())) {

        die('SUCCESS');
    }

    die('FAILED');
}
