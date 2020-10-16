<?php

    namespace App\Models\DAO;

    use App\Models\Entity\Und;
    use Exception;

    class UndDAO extends BaseDAO
    {
        public function findId($id)
        {
            $result = $this->select("SELECT id, description, und FROM und WHERE id = '$id'");

            $dataSetUnd = $result->fetch();

            if($dataSetUnd)
            {                                 
                $und = new Und();
                $und->setId($dataSetUnd['id']);
                $und->setDescription($dataSetUnd['description']);
                $und->setUnd($dataSetUnd['und']);
                    
                return $und;              
            }
            else
            {
                return FALSE;
            }
        }

        public function findAll()
        {
            $result = $this->select("SELECT * FROM und");

            $dataSetUnd = $result->fetchAll();
            $findAll = [];
            
            if($dataSetUnd)
            {
                foreach ($dataSetUnd as $value) 
                {
                    $und= new Und();
                    $und->setId($value['id']);
                    $und->setDescription($value['description']);
                    $und->setUnd($value['und']);

                    $findAll[] = $und;
                }

                return $findAll;
            }
            else 
            {
                return FALSE;
            }
        }

        public function insertUnd(Und $und)
        {
            try {

                $description    = $und->getDescription();
                $und            = $und->getUnd();

                return  $this->insert('und', ':description, :und',
                    [
                        ':description'  => $description,
                        ':und'          => $und
                    ]);


            } catch (\Exception $ex) {
                throw new Exception("Erro na gravação " . $ex->getMessage(), 500);
            }
        }

        public function updateUnd(Und $und)
        {
            try 
            {   
                $id             = $und->getId();
                $description    = $und->getUnd();
                $und            = $und->getUnd();
                return $this->update('und', 'description = :description, und = :und',
                    [
                        ':id'           => $id,
                        ':description'  => $description,
                        ':und'          => $und          
                    ],
                    'id = :id'
            );
            
            } 
            catch (\Exception $ex) 
            {
                throw new Exception("Erro na atualização " . $ex->getMessage(), 500);
            }
            

        }

        public function deleteUnd(Und $und)
        {
            try 
            {
                $id = $und->getId();

               if($this->delete('und', "id = '$id'"))
               {
                   return TRUE;
               }
               else 
               {
                    return FALSE;    
               }
            } 
            catch (\Exception $ex) 
            {                
                throw new Exception("Erro na Excluir " . $ex->getMessage(), 500);
            }
        }
    }

?>