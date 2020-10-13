<?php

    namespace App\Controllers;

    use App\App;
    use App\Models\DAO\AuthenticationDAO;
    use App\Models\Entity\Authentication;
    use App\Models\Validation\AuthenticationValidation;
    use App\Controllers\Controller;
    use App\Libs\Session;

    class AuthenticationController extends Controller
    {
        private $enter;

        public function index()
        {
            $user = new Authentication();
            $user->setName(filter_var($_POST['txt_user'], FILTER_SANITIZE_SPECIAL_CHARS));
            $user->setPass(filter_var($_POST['txt_pass'], FILTER_SANITIZE_SPECIAL_CHARS));

            $valid = new AuthenticationValidation();

            if ($valid->validation($user)) 
            {
                $this->redirect('/home');
            } 
            else 
            {
                $message ='Usuario ou Senha incorreta!';

                switch ($valid->getResult()) 
                {
                    case 0:
                        Session::unsetMessage();                        
                        Session::setMessage($message);
                        break;
                        
                    case 1:
                        
                        if (!empty($user->getName())) 
                        {
                            Session::unsetMessage(); 
                            Session::setMessage($message);
                        } 
                        else 
                        {
                            Session::unsetMessage(); 
                            Session::setMessage("");
                        }
                        break;
                }
                
                $this->render('/login/login');
            }
            
        }
    }


?>