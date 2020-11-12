<?php

    namespace App\Models\DAO;

    use App\Models\Entity\User;
    use Exception;

    class UserDAO extends BaseDAO
    {
        //funcao que busca por id
        public  function findId($id)
        {
            $result = $this->select("SELECT user.id, user.name, user.pass, user.active, user.id_perm, user.email,
                        permission.type, permission.type_name, permission.perm, permission.perm_name
                        FROM user
                        INNER JOIN permission
                        ON user.id_perm = permission.id
                        WHERE user.id = '$id'");

            $dateSetUser = $result->fetch();
            
            
            if($dateSetUser)
            {
                $user = new User();
                $user->setId($dateSetUser['id']);
                $user->setName($dateSetUser['name']);
                $user->setPass($dateSetUser['pass']);
                $user->setActive($dateSetUser['active']);
                $user->setIdPerm($dateSetUser['id_perm']);
                $user->setTypePerm($dateSetUser['type']);
                $user->setTypeNamePerm($dateSetUser['type_name']);
                $user->setPerm($dateSetUser['perm']);
                $user->setPermName($dateSetUser['perm_name']);
                $user->setEmail($dateSetUser['email']);

                return $user;
            }else{
                return false;
            }
            
        }
        
        //funcao que busca todos e retorna um array de objetos
        public function findAll()
        {
            $result = $this->select("SELECT user.id, user.name, user.pass, user.active, user.id_perm, user.email,
                            permission.type, permission.type_name, permission.perm, permission.perm_name
                            FROM user
                            INNER JOIN permission
                            ON user.id_perm = permission.id
                            ");

            $dateSetUsers = $result->fetchAll();
            
            if ($dateSetUsers) {
                $findAll = [];

                foreach($dateSetUsers as $dateSetUser)
                {
                    $user = new User();
                    $user->setId($dateSetUser['id']);
                    $user->setName($dateSetUser['name']);
                    $user->setPass($dateSetUser['pass']);
                    $user->setActive($dateSetUser['active']);
                    $user->setIdPerm($dateSetUser['id_perm']);
                    $user->setTypePerm($dateSetUser['type']);
                    $user->setTypeNamePerm($dateSetUser['type_name']);
                    $user->setPerm($dateSetUser['perm']);
                    $user->setPermName($dateSetUser['perm_name']);
                    $user->setEmail($dateSetUser['email']);
                    $findAll[] = $user;
                }
                
                
                
                return $findAll;

                
                
            } else {
                return false;
            }
            
        }

        //funcao que inser um novo dado
        public function insertUser(User $user)
        {
            try {
                $name   = $user->getName();
                $pass   = $user->getPass();
                $active = $user->getActive();
                $idPerm = $user->getIdPerm();
                $email  = $user->getEmail();
                
                return $this->insert('user', ':name, :pass, :active, :id_Perm, :email', 
                    [
                       ':name'          => $name,
                       ':pass'          => $pass,
                       ':active'        => $active,
                       ':id_Perm'       => $idPerm,
                       ':email'         => $email
                    ]
                );                
                
            } catch (\Exception $ex) {
                
                throw new Exception("Erro na gravação dos dados " . $ex->getMessage(), 500);
                
            }
        }

        //funcao que atualiza um dado
        public function updateUser(User $user)
        {
            try {
                $id     = $user->getId();
                $name   = $user->getName();                
                $active = $user->getActive();
                $idperm = $user->getIdPerm();
                $email  = $user->getEmail();
                
                return $this->update('user', 'name = :name, active = :active, id_perm = :id_perm, email = :email',
                    [
                        ':id'           => $id,
                        ':name'         => $name,                        
                        ':active'       => $active,
                        ':id_perm'      => $idperm,
                        ':email'        => $email
                    ],
                    "id = :id"
                );
                

            } catch (\Exception $ex) {
                throw new Exception("Erro na Atualização dos dados " . $ex->getMessage(), 500);
                
            }
        }

        //funcao que deleta um dado
        public function deleteUser(User $user)
        {

            try {

                $id = $user->getId();

                if($this->delete('user', "id = '$id'"))
                {
                    return TRUE;
                }
                else {
                    return FALSE;
                }

            } catch (\Exception $ex) {
                throw new Exception("Erro ao excluir " . $ex->getMessage(), 500);
            }
        }
    }
