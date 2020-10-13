<?php

    require_once __DIR__ . "/vendor/autoload.php";

    use App\App;

    session_start();

    error_reporting(E_ALL & ~E_NOTICE);

    try {
        $start = new App();
        $start->run();
        
    } catch (\Exception $ex) {
        echo $ex->getMessage();
    }

?>