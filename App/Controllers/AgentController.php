<?php

    namespace App\Controllers;

    use App\Models\Entity\Agent;
    use App\Models\DAO\AgentDAO;
    use App\Libs\Session;
    use App\Controllers\Controller;

    class AgentController extends Controller
    {
        public function index()
        {
            $agentDAO = new AgentDAO();

            $this->setViewParam('agent', $agentDAO->findAll());

            $this->render('/agent/index');
        }

        public function new()
        {
            $this->render('/agent/insert');
        }

        public function edit($params)
        {
            if($params[0])
            {
                $id = $params[0];

                $agentDAO = new AgentDAO();
                $this->setViewParam('agent', $agentDAO->findId($id));
                $this->render('/agent/edit');
            }
            else 
            {
                $this->render('/agent/index');
            }
            
        }

        public function insert()
        {
            if($_POST)
            {
                $name   = strtoupper(filter_var($_POST['txt_name'], FILTER_SANITIZE_SPECIAL_CHARS));
                $email  = strtoupper(filter_var($_POST['txt_email'], FILTER_SANITIZE_SPECIAL_CHARS));
                $phone  = filter_var($_POST['txt_phone'], FILTER_SANITIZE_SPECIAL_CHARS);

                $agent = new Agent();
                $agent->setNameAgent($name);
                $agent->setEmailAgent($email);
                $agent->setPhoneAgent($phone);

                $agentDAO = new AgentDAO();
                if($agentDAO->insertAgent($agent))
                {
                    Session::unsetMessage();
                    Session::setMessage('Cadastro realizado com sucesso!');
                    $this->redirect('/agent/index');
                }
                else 
                {
                    Session::unsetErro();
                    Session::setErro('Erro na base de dados tente novamente mais tarde!');
                    $this->redirect('/agent/index');    
                }
            }
            else 
            {
                Session::unsetErro();
                Session::setErro('Não foi possivel Cadastrar, verifique os dados e tente novamente');
                $this->redirect('/agent/index');    
            }
        }

        public function update()
        {
            

            if($_POST)
            {
                $id     = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
                $name   = strtoupper(filter_var($_POST['txt_name'], FILTER_SANITIZE_SPECIAL_CHARS));
                $email  = strtoupper(filter_var($_POST['txt_email'], FILTER_SANITIZE_SPECIAL_CHARS));
                $phone  = filter_var($_POST['txt_phone'], FILTER_SANITIZE_SPECIAL_CHARS);

                $agent = new Agent();
                $agent->setId($id);
                $agent->setNameAgent($name);
                $agent->setEmailAgent($email);
                $agent->setPhoneAgent($phone);

                $agentDAO = new AgentDAO();
               
                $agentDAO->updateAgent($agent);
                
                Session::unsetMessage();
                Session::setMessage('Cadastro Atualizado com sucesso!');
                $this->redirect('/agent/index');
                
               
            }
            else
            {
                Session::unsetErro();
                Session::setErro('Não foi possivel atualizar, verifique os dados e tente novamente');
                $this->redirect('/agent/index');    
            }
        }

        public function delete($params)
        {
            if($params[0])
            {
                $id = $params[0];

                $agent = new Agent();
                $agent->setId($id);

                $agentDAO = new AgentDAO();

                if($agentDAO->deleteAgent($agent))
                {
                    Session::unsetMessage();
                    Session::setMessage('Cadastro excluido com sucesso!');
                    $this->redirect('/agent/index');
                }
                else 
                {
                    Session::unsetErro();
                    Session::setErro('Não foi possivel Excluir, o vendedor estar sendo usado por outros registros');
                    $this->redirect('/agent/index');  
                }
            }
        }
    }

?>