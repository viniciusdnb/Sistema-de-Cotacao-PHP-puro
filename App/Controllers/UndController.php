<?php

    namespace App\Controllers;

    use App\Controllers\Controller;
    use App\Libs\Session;
    use App\Models\Entity\Und;
    use App\Models\DAO\UndDAO;

    class UndController extends Controller
    {
        public function index()
        {
            $undDAO = new UndDAO();
            $this->setViewParam('und', $undDAO->findAll());
            
             $this->render('/und/index');            

           
        }

        public function new()
        {
            $this->render('/und/insert');
        }

        public function edit($params)
        {
            $id = $params[0];
           
            $undDAO = new UndDAO();
            
            $this->setViewParam('und', $undDAO->findId($id));

            $this->render('/und/edit');

        }

        public function insert()
        {
            if($_POST)
            {
                $description    = strtoupper(filter_var($_POST['txt_description'], FILTER_SANITIZE_SPECIAL_CHARS));
                $txtUnd         = strtoupper(filter_var($_POST['txt_und'], FILTER_SANITIZE_SPECIAL_CHARS));

                $und = new Und();
                $und->setDescription($description);
                $und->setUnd($txtUnd);

                $undDAO = new UndDAO();
                $undDAO->insertUnd($und);

                Session::unsetMessage();
                Session::setMessage('Cadastro realizado com sucesso!');
                $this->redirect('/und/index');                
            }
            else 
            {
                Session::unsetErro();
                Session::setErro('Erro ao cadastrar, tente novamente mais tarde');
                $this->redirect('/und/index');    
            }
        }

        public function update()
        {
            if($_POST)
            {
                $id             = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
                $description    = strtoupper(filter_var($_POST['txt_description'], FILTER_SANITIZE_SPECIAL_CHARS));
                $txtUnd         = strtoupper(filter_var($_POST['txt_und'], FILTER_SANITIZE_SPECIAL_CHARS));

                $und = new Und();
                $und->setId($id);
                $und->setDescription($description);
                $und->setUnd($txtUnd);

                $undDAO = new UndDAO();
                $undDAO->updateUnd($und);

                Session::unsetMessage();
                Session::setMessage('Atualização realizada com sucesso!');
                $this->redirect('/und/index');
            }
            else
            {
                Session::unsetErro();
                Session::setErro('Erro ao atualizar tente novamente mais tarde!');
                $this->redirect('/und/index');   
            }
        }

        public function delete($params)
        {
            
            if($params)
            {
                $id = $params[0];

                $und = new Und();
                $und->setId($id);

                $undDAO = new UndDAO();
                if ($undDAO->deleteUnd($und)) {
                    Session::unsetMessage();
                    Session::setMessage('Registro excluido com sucesso');
                    $this->redirect('/und/index');
                } else {
                    Session::unsetErro();
                    Session::setErro('Nao foi possivel excluir, a Unidade de medida esta sendo usado por outro registro!');
                    $this->redirect('/und/index');
                }
            }else
            {
                Session::unsetErro();
                Session::setErro('Erro ao Excluir tente novamente mais tarde!');
                $this->redirect('/und/index');
            }
            
        }
    }

    

?>