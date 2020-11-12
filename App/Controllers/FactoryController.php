<?php

    namespace App\Controllers;

    use App\Models\Entity\Factory;
    use App\Models\DAO\FactoryDAO;
    use App\Libs\Session;
   ;

    class FactoryController extends Controller
    {
        public function index()
        {
            $factory = new FactoryDAO();
            $this->setViewParam('factory', $factory->findAll());           
            
            $this->render('/factory/index');
        }

        public function new()
        {
            $this->render('/factory/insert');
        }
        public function edit($params)
        {
            $id = $params[0];
            $factory = new FactoryDAO();
            $this->setViewParam('factory', $factory->findId($id));
            $this->render('/factory/edit');
        }

        public function insert()
        {
            if($_POST)
            {
                $name       = strtoupper(filter_var($_POST['txt_name'], FILTER_SANITIZE_SPECIAL_CHARS));
                $addres     = strtoupper(filter_var($_POST['txt_addres'], FILTER_SANITIZE_SPECIAL_CHARS));
                $email      = filter_var($_POST['txt_email'], FILTER_SANITIZE_SPECIAL_CHARS);
                $cnpj       = strtoupper(filter_var($_POST['txt_cnpj'], FILTER_SANITIZE_SPECIAL_CHARS));
                $phone      = strtoupper(filter_var($_POST['txt_phone'], FILTER_SANITIZE_SPECIAL_CHARS));
                $contact    = strtoupper(filter_var($_POST['txt_contact'],FILTER_SANITIZE_SPECIAL_CHARS));

                $factory = new Factory();
                $factory->setNameFactory($name);
                $factory->setAddresFactory($addres);
                $factory->setEmailFactory($email);
                $factory->setCnpjFactory($cnpj);
                $factory->setPhoneFactory($phone);
                $factory->setContactFactory($contact);

                $factoryDAO= new FactoryDAO();
                if($factoryDAO->insertFactory($factory))
                {
                    Session::unsetMessage();
                    Session::setMessage('Cadastro inserido com sucesso!');
                    $this->redirect('/factory/index');
                }
                else 
                {
                    Session::unsetErro();
                    Session::setErro('Nao foi possivel inserir tente novamente mais tarde!');
                    $this->redirect('/factory/index');    
                }
            }
        }

        public function update()
        {
            if ($_POST) {
                $id         = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS); 
                $name       = strtoupper(filter_var($_POST['txt_name'], FILTER_SANITIZE_SPECIAL_CHARS));
                $addres     = strtoupper(filter_var($_POST['txt_addres'], FILTER_SANITIZE_SPECIAL_CHARS));
                $email      = filter_var($_POST['txt_email'], FILTER_SANITIZE_SPECIAL_CHARS);
                $cnpj       = strtoupper(filter_var($_POST['txt_cnpj'], FILTER_SANITIZE_SPECIAL_CHARS));
                $phone      = strtoupper(filter_var($_POST['txt_phone'], FILTER_SANITIZE_SPECIAL_CHARS));
                $contact    = strtoupper(filter_var($_POST['txt_contact'], FILTER_SANITIZE_SPECIAL_CHARS));

                $factory = new Factory();
                $factory->setId($id);
                $factory->setNameFactory($name);
                $factory->setAddresFactory($addres);
                $factory->setEmailFactory($email);
                $factory->setCnpjFactory($cnpj);
                $factory->setPhoneFactory($phone);
                $factory->setContactFactory($contact);

                

                $factoryDAO = new FactoryDAO();
                
                $factoryDAO->updateFactory($factory);
                Session::unsetMessage();
                Session::setMessage('Cadastro Atualizado com sucesso!');
                $this->redirect('/factory/index');
                
            }
            else
            {
                Session::unsetErro();
                Session::setErro('Nao foi possivel Atualizar tente novamente mais tarde!');
                $this->redirect('/factory/index');
            }
        }

        public function delete($params)
        {
            if($params) 
            {
                $id = $params[0];
                
                $factory = new Factory();
                $factory->setId($id);

                var_dump($factory);

                $factoryDAO = new FactoryDAO();
                
                if($factoryDAO->deleteFactory($factory))
                {
                    Session::unsetMessage();
                    Session::setMessage('Cadastro Excluido com sucesso!');
                    $this->redirect('/factory/index');
                }
                else 
                {
                    Session::unsetErro();
                    Session::setErro('Nao foi possivel Excluir, o Fornecedor esta sendo usado por outro registro!');
                    $this->redirect('/factory/index');    
                }
            }
            else 
            {
                Session::unsetErro();
                Session::setErro('Nao foi possivel Excluir tente novamente mais tarde!');
                $this->redirect('/factory/index');
            }
        }
    }
   

?>