<?php

    namespace App\Libs;

    class FunctionPublic
    {
        public static function idPerm($viewVar)
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

        public static function cbxSelect($viewVar, array $viewName, array $getName)
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