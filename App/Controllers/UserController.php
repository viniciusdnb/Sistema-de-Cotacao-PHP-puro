<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Libs\Session;
use App\Models\DAO\PermissionDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entity\User;

class UserController extends Controller
{

    public function index()
    {
        $userDAO = new UserDAO();
        
        $this->setViewParam('findAll', $userDAO->findAll());

        $this->render('/user/index');

    }    

    public function new()
    {
        $permDAO = new PermissionDAO();
        $this->setViewParam('findAll', $permDAO->findAll());
        
        //instaciar o objeto de permissao para que possa ser passada as opçoes para cadastro
        $this->render('/user/insert');

    }

    public function insert()
    {
        if(isset($_POST))
        {
            
            $name = filter_var($_POST['txt_name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $pass = filter_var($_POST['txt_pass'], FILTER_SANITIZE_SPECIAL_CHARS);
            $passHash = password_hash($pass, PASSWORD_DEFAULT);
            $active = filter_var($_POST['txt_active'], FILTER_SANITIZE_SPECIAL_CHARS);
            $perm = filter_var($_POST['txt_perm'], FILTER_SANITIZE_SPECIAL_CHARS);

            $user = new User();
            $user->setName($name);
            $user->setPass($passHash);
            $user->setActive($active);
            $user->setIdPerm($perm);

            $userDAO = new UserDAO();
            $userDAO->insertUser($user);
            Session::unsetMessage();
            Session::setMessage('Usuarioa cadastrado com sucesso!');
            $this->redirect('/user/index'); 
        }
        else
        {
            Session::unsetMessage();
            Session::setErro('nao foi posivel cadastrar por gentileza tente novamente');
            $this->redirect('/user/index'); 
        }
    }

    public function edit($params)
    {
        
        $id = $params[0];

        $userDAO = new UserDAO();
        $this->setViewParam('findIdUser', $userDAO->findId($id));
        
        $perm = new PermissionDAO();
        $this->setViewParam('findAllPerm', $perm->findAll());

        $this->render('/user/edit');
        
    }

    public function update()
    {               
        
        
       if (isset($_POST)) 
       {  
            

            $name = filter_var($_POST['txt_name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $id = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);           
            $active = filter_var($_POST['txt_active'], FILTER_SANITIZE_SPECIAL_CHARS);
            $perm = filter_var($_POST['txt_perm'], FILTER_SANITIZE_SPECIAL_CHARS);

            $user = new User();
            $user->setId($id);
            $user->setName($name);            
            $user->setActive($active);
            $user->setIdPerm($perm);

            $userDAO = new UserDAO();
            $userDAO->updateUser($user);

            Session::unsetMessage();
            Session::setMessage("Atualizado com sucesso!"); 

            $this->redirect('/user/index');

        }
        else 
        {
            Session::unsetMessage();
            Session::setErro('nao foi posivel atualizar por gentileza tente novamente');
            $this->redirect('/user/index'); 
        }

    }

    public function delete($params)
    {
        
        if($params)
        {
            $id = $params[0];
            
            $user = new User();
            $user->setId($id);

            $userDAO = new UserDAO();
            if($userDAO->deleteUser($user))
            {
                Session::unsetMessage();
                Session::setMessage("Deletado com sucesso!");

                $this->redirect('/user/index'); 
            }
            else 
            {
                Session::unsetErro();
                Session::setMessage('Não foi possivel excluir, o usuario esta sendo usado por outro registro');
                $this->redirect('/user/index');
            }

        }
        else
        {
            Session::unsetMessage();
            Session::setErro('nao foi posivel deletar por gentileza tente novamente');
            $this->redirect('/user/index');             
        }      

        
    }

    
    
}
