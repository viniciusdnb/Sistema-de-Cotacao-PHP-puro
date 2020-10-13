<?php

    namespace App\Controllers;

    use App\App;
    use App\Libs\Session;

class Controller
    {
       private $viewVar;
       protected $app;

       public function __construct($app)
       {
           $this->setViewParam('nameController', $app->getControllerName());
           $this->setViewParam('nameAction', $app->getAction());
       }

        public function render($view)
        {
            $viewVar = $this->getViewVar();
            
            //variavel que recebe o obj session para acesso de todas as paginas da aplicacao
            $Session = Session::class;

            if($_SESSION['user'])
            {
                require_once PATH . '/App/Views/layout/header.php';
                require_once PATH . '/App/Views/layout/menu.php';
                require_once PATH . '/App/Views/' . $view . '.php';
                require_once PATH . '/App/Views/layout/footer.php';
            }else{
            require_once PATH . '/App/Views/layout/header.php';

            require_once PATH . '/App/Views/' . $view . '.php';
            require_once PATH . '/App/Views/layout/footer.php';

            }
           

            
        }
        public function redirect($view)
        {
            header('location: http://' . APP_HOST . $view );
            exit;
        }

        public function getViewVar()
        {
            return $this->viewVar;
        }

        //funcao que serve para mandar em array os dados para a view 
        public function setViewParam($varName, $varValue)
        {
            if ($varName != "" && $varValue != "") {
                $this->viewVar[$varName] = $varValue;
            }
        }
    }
