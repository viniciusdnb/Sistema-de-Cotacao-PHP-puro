<?php

    namespace App\Controllers;

    use App\Libs\Session;
    use App\Models\DAO\PermissionDAO;
    use App\Models\Entity\Permission;

class PermissionController extends Controller
    {
        public function index()
        {
            
            $perm = new PermissionDAO();
            
            $this->setViewParam('perm', $perm->findAll());
            $this->render('/permission/index');
          
        }

        public function new()
        {
            $this->render('/permission/insert');

        }

        public function insert()
        {
            if($_POST)
            {
                $codType = strtoupper(filter_var($_POST['txt_cod_type'], FILTER_SANITIZE_SPECIAL_CHARS));
                $nameType = strtoupper(filter_var($_POST['txt_name_perm'], FILTER_SANITIZE_SPECIAL_CHARS));
                $codPerm = strtoupper(filter_var($_POST['txt_cod_perm'], FILTER_SANITIZE_SPECIAL_CHARS));
                $namePerm = strtoupper(filter_var($_POST['txt_name_perm'], FILTER_SANITIZE_SPECIAL_CHARS));

                $perm = new Permission();
                $perm->setType($codType);
                $perm->setTypeName($nameType);
                $perm->setPerm($codPerm);
                $perm->setPermName($namePerm);

                $permDAO = new PermissionDAO();
                $permDAO->insertPerm($perm);
                Session::unsetMessage();
                Session::setMessage('Permissão cadastrada com Sucesso!'); 
                $this->redirect('/permission/index');               
            }else {
                Session::unsetErro();
                Session::setErro('Nao foi Possivel Cadastrar, tente novamente mais tarde');
                $this->redirect('/permission/index');
                
            }
        }

       public function edit($params)
       {
            $id = $params[0];

            $permDAO = new PermissionDAO();

            $this->setViewParam('perm', $permDAO->findId($id));
            
            $this->render('/permission/edit');

       }

       public function update()
       {
        if ($_POST) {

            $id = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $codType = strtoupper(filter_var($_POST['txt_cod_type'], FILTER_SANITIZE_SPECIAL_CHARS));
            $nameType = strtoupper(filter_var($_POST['txt_name_perm'], FILTER_SANITIZE_SPECIAL_CHARS));
            $codPerm = strtoupper(filter_var($_POST['txt_cod_perm'], FILTER_SANITIZE_SPECIAL_CHARS));
            $namePerm = strtoupper(filter_var($_POST['txt_name_perm'], FILTER_SANITIZE_SPECIAL_CHARS));

            $perm = new Permission();
            $perm->setId($id);
            $perm->setType($codType);
            $perm->setTypeName($nameType);
            $perm->setPerm($codPerm);
            $perm->setPermName($namePerm);

            $permDAO = new PermissionDAO();
            $permDAO->updatePerm($perm);
            
            Session::unsetMessage();
            Session::setMessage('Permissão atualizada com Sucesso!');
            $this->redirect('/permission/index');
        } else {
            Session::unsetErro();
            Session::setErro('Nao foi Possivel atualizar, tente novamente mais tarde');
            $this->redirect('/permission/index');
        }
       }

       public function delete($params)
       {
           
            $id = $params[0];
            $perm = new Permission();
            $perm->setId($id);

            $permDAO = new PermissionDAO();
            if($permDAO->deletePerm($perm))
            {
                Session::unsetErro();
                Session::setMessage('registro excluido com sucesso');
                
                $this->redirect('/permission/index');
            }else {
                Session::unsetErro();
                Session::setMessage('Não foi possivel excluir, a permissão esta sendo usado por outro registro');
                $this->redirect('/permission/index');
            }
            
            



       }
    }
