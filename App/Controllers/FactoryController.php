<?php

    namespace App\Controllers;

    use App\Models\Entity\Factory;
    use App\Models\DAO\FactoryDAO;
    use App\Libs\Session;

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

        }
        public function edit()
        {
            $this->render('/factory/edit');
        }

        public function insert()
        {

        }

        public function update()
        {

        }

        public function delete()
        {

        }
    }
   

?>