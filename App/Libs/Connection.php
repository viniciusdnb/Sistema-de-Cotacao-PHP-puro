<?php

    namespace App\Libs;

    use PDO;
    use PDOException;
    use Exception;

    class Connection
    {
        private static $connection;

        public function __construct()
        {
            
        }

        public static function getConnection()
        {
            $pdoDsn = DB_DRIVER . ":" . "host=" . DB_HOST . ";" . "dbname=" . DB_NAME . ";";

            try {
                if(!isset($connection))
                {
                    $connection = new PDO($pdoDsn, DB_USER, DB_PASS);
                    $connection->setAttribute(PDO::ATTR_ERRMODE,            PDO::ERRMODE_EXCEPTION);
                    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES,   FALSE);
                    $connection->setAttribute(PDO::ATTR_PERSISTENT,         TRUE);

                    return $connection;

                }
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }

?>