<?php

    namespace App\Controllers;   

    class LogoutController 
    {
       public function __construct()
       {
            session_start();
            session_destroy();

            header("location: index.php");
       }
    }
