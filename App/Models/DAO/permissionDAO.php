<?php

    namespace App\Models\DAO;

    use App\Models\Entity\Permission;
    use Exception;

    class PermissionDAO extends BaseDAO
    {

        public function findId($id)
        {
            $result = $this->select("SELECT id, type, type_name, perm, perm_name FROM permission WHERE id = '$id'");

            if($result)
            {
                $dataSetPerm = $result->fetchAll();
                foreach ($dataSetPerm as $value) 
                {
                    $perm = new Permission();
                    $perm->setId($value['id']);
                    $perm->setType($value['type']);
                    $perm->setTypeName($value['type_name']);
                    $perm->setPerm($value['perm']);
                    $perm->setPermName($value['perm_name']);
                }
                return $perm;
            }
            else
            {
                return FALSE;
            }

            
        }

        public function findAll()
        {
            $result = $this->select("SELECT * FROM permission");
           
            if($result)
            {
                $dataSetPerm = $result->fetchAll();
                $findAll = [];

                foreach($dataSetPerm as $value)
                {
                    $perm = new Permission();
                    $perm->setId($value['id']);
                    $perm->setType($value['type']);
                    $perm->setTypeName($value['type_name']);
                    $perm->setPerm($value['perm']);
                    $perm->setPermName($value['perm_name']);

                    $findAll[] = $perm;
                }
                return $findAll;
                
            }else {
                return false;
            }
        }

        public function insertPerm(Permission $permission)
        {

            try {
                
                $type       = $permission->getType();
                $typeName   = $permission->getTypeName();
                $perm       = $permission->getPerm();
                $permName   = $permission->getPermName();

                return $this->insert('permission', ':type, :type_name, :perm, :perm_name',
                [
                    ':type'         => $type,
                    ':type_name'    => $typeName,
                    ':perm'         => $perm,
                    ':perm_name'    => $permName
                ]);

                

            } catch (\Exception $ex) {
                throw new Exception("Erro na gravação " . $ex->getMessage(), 500);
                
            }

            

        }

        public function updatePerm(Permission $permission)
        {
        try {

            $id         = $permission->getId();
            $type       = $permission->getType();
            $typeName   = $permission->getTypeName();
            $perm       = $permission->getPerm();
            $permName   = $permission->getPermName();

            return $this->update('permission', 'type = :type, type_name = :type_name, perm = :perm, perm_name = :perm_name',
                [
                    ':id'           => $id,
                    ':type'         => $type,
                    ':type_name'    => $typeName,
                    ':perm'         => $perm,
                    ':perm_name'    => $permName,
                ],

                'id = :id'

                );
        } catch (\Exception $ex) {
            throw new Exception("Erro na atualização " . $ex->getMessage(), 500);
        }
        
        }

        public function deletePerm(Permission $permission)
        {
            try {
                $id = $permission->getId();

                return $this->delete('permission', "id = '$id'");
            } catch (\Exception $ex) {
                throw new Exception("Erro ao deletar " . $ex->getMessage(), 500);
            }
        }

    }
