<?php

    namespace App\Models\Validation;

    use App\Models\DAO\AuthenticationDAO;
    use App\Models\Entity\Authentication;

    class AuthenticationValidation extends AuthenticationDAO
    {
        private $result;

        public function validation(Authentication $authentication)
        {
            if($userDAO = $this->verify($authentication->getName()))
            {
                if(password_verify($authentication->getPass(), $userDAO->getPass()))
                {
                    $_SESSION['user'] = $userDAO->getName();
                    $_SESSION['perm'] = $userDAO->getPerm();

                    return TRUE;
                }
                else
                {
                    return FALSE;
                    $this->result = 0;
                }
            }
            else 
            {
                return FALSE;
                $this->result = 1;    
            }
        }

        public function getResult()
        {
            return $this->result;
        }
    }

?>
