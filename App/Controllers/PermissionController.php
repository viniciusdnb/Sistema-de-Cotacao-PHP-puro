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
                $codType = filter_var($_POST['txt_cod_type'], FILTER_SANITIZE_SPECIAL_CHARS);
                $nameType = filter_var($_POST['txt_name_perm'], FILTER_SANITIZE_SPECIAL_CHARS);
                $codPerm = filter_var($_POST['txt_cod_perm'], FILTER_SANITIZE_SPECIAL_CHARS);
                $namePerm = filter_var($_POST['txt_name_perm'], FILTER_SANITIZE_SPECIAL_CHARS);

                $perm = new Permission();
                $perm->setType($codType);
                $perm->setTypeName($nameType);
                $perm->setPerm($codPerm);
                $perm->setPermName($namePerm);

                $permInsert = new PermissionDAO();
                $permInsert->insertPerm($perm);
                Session::unsetMessage();
                Session::setMessage('Permissão cadastrada com Sucesso!'); 
                $this->redirect('/permission/index');               
            }else {
                Session::unsetErro();
                Session::setErro('Nao foi Possivel Cadastrar, tente novamente mais tarde');
                $this->redirect('/permission/index');
                
            }
        }
    }
