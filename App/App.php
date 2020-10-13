<?php

    namespace App;

    use Exception;

    class App
    {

        private $controller;
        private $controllerName;
        private $action;
        private $controllerFile;
        private $params;

        public function __construct()
        {
            //configuracao do banco de dados
            //database configuration
            define('DB_DRIVER'  , "mysql");
            define('DB_HOST'    , "localhost");
            define('DB_NAME'    , "vitalhospitalar");
            define('DB_USER'    , "root");
            define('DB_PASS'    , "");

            //configuiração de url com o nome da empresa 
            //url configuration with business name
        
            define('APP_HOST'   , $_SERVER['HTTP_HOST'] . "/sistemalicitacao");
            define('PATH'       , realpath('./'));

            //configuração do titulo com o nome da empresa
            //title configuration with business name
            define('TITLE'      , "vitalhospitalar");

            $this->url();           
           
        }

        public function run()
        {
            $this->defineController();
            $this->defineAction();
            $this->startingObject();
        }

        public function url()
        {
            /*
                funcao publica que pega a url fazendo o tratamento de barras, filtros de caracteris de url
                e tranfsorma em um array de duas posiçoes que sera passado os valores para as variaves de controle e acao.
            */

            /*
                public function that takes the url making the treatment of bars, url character filters and
                transforms into an array of two positions that wil be passed the values for controller and action variables
            */
            if(isset($_GET['url']))
            {
                $path = $_GET['url'];

                //retira espaçoes em branco ou outros caracters no final da string
                $path = rtrim($path, '/');

                $path = filter_var($path, FILTER_SANITIZE_URL);

                //retorna uma matriz de string, formado pela divisao papartir do deliminitador
                $path = explode('/', $path);

                $this->controller   = $this->verifyArray($path, 0);
                $this->action       = $this->verifyArray($path, 1);

                //verifica se o array path contem valores na segunda posição
                //limpando as posição 0 e 1, e passando o array path para a variavel parametros
                if($this->verifyArray($path, 2))
                {
                    unset($path[0]);
                    unset($path[1]);
                    $this->params = array_values($path);
                }
                
            }
        }

        public function verifyArray($array, $key)
        {
            /*
                funcao publica que verifica os valores contidono array,
                retornando um array com chave ou nulo
            */

            /*
                public function that checks the values contained in the array, returning a array keyed or null
            */

            if(isset($array[$key]) && !empty($array[$key]))
            {
                return $array[$key];
            }
            else
            {
                return NULL;
            }

        }

        private function defineController()
        {
            /*
                funcao privada que definira qul o controle da aplicacao
            */

            /*
                private function that will define the application controll
            */

            if($this->controller)
            {
                $this->controllerName = ucwords($this->controller) . 'Controller';
                $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
                $this->controllerFile = $this->controllerName . '.php';
            }
            else
            {
                if(!isset($_SESSION['user']))
                {
                    $this->controllerName = "AuthenticationController";
                }
                else
                {
                    $this->controllerName = "HomeController";    
                }    
            }
        }

        private function defineAction()
        {
            /*
                funcao privada que definira a acao da aplicacao
            */

            /*
                private function that will define the application action
            */

            if($this->action)
            {
                $this->action = preg_replace('/[^a-zA-Z]/i', '', $this->action);
            }
            else 
            {
                $this->action = "";    
            }
        }

        private function startingObject()
        {
            if(!file_exists(PATH . '/App/Controllers/' . $this->controllerFile))
            {
                
                throw new Exception("Página nao encontrada" , 404);                
            }
            
            $nameClass = "\\App\\Controllers\\" . $this->controllerName;

            if($_SESSION['user'] == "")
            {
                $this->controller = new Controllers\AuthenticationController($this);
                $this->controller->index();

            }
            elseif (!$this->controller || $this->controller == "home" || $this->controller == "index") 
            {
                $this->controller = new Controllers\HomeController($this);
                $this->controller->index();

            }
            else
            {
                if(!class_exists($nameClass))
                {
                    throw new Exception("Erro na aplicação ", 500);                    
                }
                else
                {
                    $objectController = new $nameClass($this);                    
                }

                if($this->action !== "")
                {
                    if(method_exists($objectController, $this->action))
                    {
                        $objectController->{$this->action}($this->params);
                    }
                    elseif(!$this->action && method_exists($objectController, 'index')) 
                    {
                        $objectController->index($this->params);
                    }
                    else
                    {
                        throw new Exception("Nosso suporte ja esta verifivando desculpe! ", 500);                        
                    }
                }
            }
        }

        function getController()
        {
            return $this->controller;
        }

        function getControllerName()
        {
            return $this->controllerName;
        }

        function getAction()
        {
            return $this->action;
        }

        function getControllerFile()
        {
            return $this->controllerFile;
        }

        function getParams()
        {
            return $this->params;
        }

        function setController($controller)
        {
            $this->controller = $controller;
        }

        function setControllerName($controllerName)
        {
            $this->controllerName = $controllerName;
        }

        function setAction($action)
        {
            $this->action = $action;
        }

        function setControllerFile($controllerFile)
        {
            $this->controllerFile = $controllerFile;
        }

        function setParams($params)
        {
            $this->params = $params;
        }
    }

?>