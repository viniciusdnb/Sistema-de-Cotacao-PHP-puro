<?php

    namespace App\Libs;

    class FunctionPublic
    {
        private $nameObj = [];
        private $action = [];
        private $viewVar;

        public function __construct($viewVar, array $nameObj,array $action)
        {
            $this->nameObj[] = $nameObj;
            $this->action[] = $action;
            $this->viewVar = $viewVar;
        }

        public function cbxSelect()
        {
            $q = count($this->viewVar[$this->nameObj[0]]);
            $a = 0;

            while ($a < $q) 
            {
                if($this->viewVar[$this->nameObj[1]]->{$this->action[1]}() == $this->viewVar[$this->nameObj[0]]->{$this->action}() )
                {
                    return $this->viewVar[$this->nameObj[1]]->{$this->action[1]}();
                }
            }
        }









        public static function cbxPerm($viewVar)
        {
            $q = count($viewVar['findAllPerm']);
            $a = 0;
            while ($a < $q) {

                if ($viewVar['findIdUser']->getIdPerm() == $viewVar['findAllPerm'][$a]->getId()) {
                    return $viewVar['findIdUser']->getIdPerm();
                }
                $a++;
            }
        }

        public static function cbx1Select($viewVar, array $viewName, array $getName)
        {
            //primeira posição do array $viewName que sera usado para fazer a contagem
            //segunda posição do array $viewName sera usada para comparação
            $q = count($viewVar[$viewName[0]]);
            $a = 0;

            while ($a < $q) 
            {
               if($viewVar[$viewName[1]]->{$getName[1]} == $viewVar[$viewName[0][$a]->{$getName[0]}])
               {
                    return $viewVar[$viewName[1]->$getName[1]];
               }

               $a++;
            }
        }
    }

?>