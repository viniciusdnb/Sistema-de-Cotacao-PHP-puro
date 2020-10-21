<?php

    namespace App\Controllers;

    use App\Models\Entity\Agent;
    use App\Models\Entity\Client;
    use App\Models\DAO\AgentDAO;
    use App\Models\DAO\ClientDAO;
    use App\Controllers;
    use App\Libs\Session;

    class ClientController extends Controller
    {
        public function index()
        {
            $client = new ClientDAO();

            $this->setViewParam('client', $client->findAll());           

            $this->render('/client/index');
        }

        public function new()
        {
            $agent = new AgentDAO();

            $this->setViewParam('agent', $agent->findAll());

            $this->render('/client/insert');
        }

        public function edit($parms)
        {
            if($parms[0])
            {
                $id = $parms[0];

                $client = new ClientDAO();

                $this->setViewParam('client', $client->findId($id));
                
                $agent = new AgentDAO();

                $this->setViewParam('agent', $agent->findAll());

                $this->render('/client/edit');

            }
            else 
            {
                $this->render('/client/index');
            }
        }

        public function insert()
        {
            if($_POST)
            {
                $nameClient = strtoupper(filter_var($_POST['txt_name'], FILTER_SANITIZE_SPECIAL_CHARS));
                $addres     = strtoupper(filter_var($_POST['txt_addres'], FILTER_SANITIZE_SPECIAL_CHARS));
                $email      = strtoupper(filter_var($_POST['txt_email'], FILTER_SANITIZE_SPECIAL_CHARS));
                $cnpj       = filter_var($_POST['txt_cnpj'], FILTER_SANITIZE_SPECIAL_CHARS);
                $phone      = filter_var($_POST['txt_phone'], FILTER_SANITIZE_SPECIAL_CHARS);
                $contact    = strtoupper(filter_var($_POST['txt_contact'], FILTER_SANITIZE_SPECIAL_CHARS));
                $idAgent    = filter_var($_POST['txt_agent'], FILTER_SANITIZE_SPECIAL_CHARS);

                $client = new Client();
                $client->setNameClient($nameClient);
                $client->setAddresClient($addres);
                $client->setEmailClient($email);
                $client->setCnpjClient($cnpj);
                $client->setPhoneClient($phone);
                $client->setContactClient($contact);
                $client->setIdAgent($idAgent);

                $clientDAO = new ClientDAO();   
               

                    if ( $clientDAO->insertClient($client)) {
                        Session::unsetMessage();
                        Session::setMessage('Cadastro realizado com sucesso!');
                        $this->redirect('/client/index');
                    } else {
                        Session::unsetErro();
                        Session::setErro('Erro na base de dados tente novamente mais tarde!');
                        $this->redirect('/client/index');
                    }
            } 
            else 
            {
                Session::unsetErro();
                Session::setErro('Não foi possivel Cadastrar, verifique os dados e tente novamente');
                $this->redirect('/client/index');
            }
            
        }
        
        public function update()
        {

            if ($_POST) {
                $id         = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
                $nameClient = strtoupper(filter_var($_POST['txt_name'], FILTER_SANITIZE_SPECIAL_CHARS));
                $addres     = strtoupper(filter_var($_POST['txt_addres'], FILTER_SANITIZE_SPECIAL_CHARS));
                $email      = strtoupper(filter_var($_POST['txt_email'], FILTER_SANITIZE_SPECIAL_CHARS));
                $cnpj       = filter_var($_POST['txt_cnpj'], FILTER_SANITIZE_SPECIAL_CHARS);
                $phone      = filter_var($_POST['txt_phone'], FILTER_SANITIZE_SPECIAL_CHARS);
                $contact    = strtoupper(filter_var($_POST['txt_contact'], FILTER_SANITIZE_SPECIAL_CHARS));
                $idAgent    = filter_var($_POST['txt_agent'], FILTER_SANITIZE_SPECIAL_CHARS);

                $client = new Client();
                $client->setId($id);
                $client->setNameClient($nameClient);
                $client->setAddresClient($addres);
                $client->setEmailClient($email);
                $client->setCnpjClient($cnpj);
                $client->setPhoneClient($phone);
                $client->setContactClient($contact);
                $client->setIdAgent($idAgent);
                
                $clientDAO = new ClientDAO();               

                $clientDAO->updateClient($client);  
                Session::unsetMessage();
                Session::setMessage('Cadastro atualizado com sucesso!');
                $this->redirect('/client/index');
                
            } else {
                Session::unsetErro();
                Session::setErro('Não foi possivel atualizar, verifique os dados e tente novamente');
                $this->redirect('/client/index');
            }
        }
        
        public function delete($parms)
        {
            if($parms[0])
            {
                $id = $parms[0];

                $client = new Client();
                $client->setId($id);

                $clienDAO = new ClientDAO();
                if($clienDAO->deleteClient($client))
                {
                    Session::unsetMessage();
                    Session::setMessage('Cadastro excluido com sucesso!');
                    $this->redirect('/client/index');
                }
                else 
                {
                    Session::unsetErro();
                    Session::setErro('Não foi possivel Excluir, o cliente esta sendo usado por outros registros');
                    $this->redirect('/client/index');
                }
            }
        }
    }

?>