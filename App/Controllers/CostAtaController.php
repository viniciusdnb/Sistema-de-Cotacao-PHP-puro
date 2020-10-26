<?php

    namespace App\Controllers;

use App\Models\DAO\AgentDAO;
use App\Models\DAO\ClientDAO;
use DateTime;

class CostAtaController extends Controller
    {
        public function index()
        {
           $this->render('/costAta/index');
        }

        public function new()
        {
            $clientDAO = new ClientDAO();
            $this->setViewParam('client', $clientDAO->findAll());

            $agent = new AgentDAO();
            $this->setViewParam('agent', $agent->findAll());


            

            $this->render('/costAta/insert');

        }

        public function edit()
        {

        }

        public function insert()
        {
           if($_POST)
           {
               $idClient        = filter_var($_POST['txt_id_client'], FILTER_SANITIZE_SPECIAL_CHARS);
               $date            = filter_var($_POST['txt_date'], FILTER_SANITIZE_SPECIAL_CHARS);
               $pr              = filter_var($_POST['txt_pr'], )
           }
        }

        public function update()
        {

        }

        public function delete()
        {

        }
    }

?>