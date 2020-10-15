<?php

    require_once __DIR__ . "/vendor/autoload.php";

    use App\App;
    use App\Libs\Error;

    session_start();

    error_reporting(E_ALL & ~E_NOTICE);

    try {
        $start = new App();
        $start->run();
        
    } catch (\Exception $ex) {
        $erro = new Error($ex);
        $erro->render();
    }

?>