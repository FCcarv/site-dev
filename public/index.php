<?php
session_start();

require '../app/constantes/constantes.php';
require '../app/functions/load.php';
require '../app/database/crud.php';
require '../app/functions/call_controllers.php';



try {
    require '../app/views/master.php';
} catch (\Throwable $th) {
    echo $th->getMessage();
}

