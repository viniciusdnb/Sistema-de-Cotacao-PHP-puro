<?php

    namespace App\Controllers;

use App\Models\DAO\AgentDAO;
use App\Models\DAO\ClientDAO;
use App\Models\DAO\CostAtaDAO;
use App\Models\Entity\CostAta;
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
                $idClient        = filter_var($_POST['txt_client'], FILTER_SANITIZE_SPECIAL_CHARS);
                $date            = filter_var($_POST['txt_date'], FILTER_SANITIZE_SPECIAL_CHARS);
                $pr              = filter_var($_POST['txt_pr'], FILTER_SANITIZE_SPECIAL_CHARS);
                $process         = filter_var($_POST['txt_process'], FILTER_SANITIZE_SPECIAL_CHARS);
                $object          = strtoupper(filter_var($_POST['txt_object'], FILTER_SANITIZE_SPECIAL_CHARS));
                $inDay           = filter_var($_POST['txt_inday'], FILTER_SANITIZE_SPECIAL_CHARS);
                $winner          = filter_var($_POST['txt_winner'], FILTER_SANITIZE_SPECIAL_CHARS);
                $daysDaliver     = filter_var($_POST['txt_days_deliver'], FILTER_SANITIZE_SPECIAL_CHARS);
                $example         = filter_var($_POST['txt_example'], FILTER_SANITIZE_SPECIAL_CHARS);
                $bula            = filter_var($_POST['txt_bula'], FILTER_SANITIZE_SPECIAL_CHARS);
                $catalog         = filter_var($_POST['txt_catalog'], FILTER_SANITIZE_SPECIAL_CHARS);
                $cbpf            = filter_var($_POST['txt_cbpf'], FILTER_SANITIZE_SPECIAL_CHARS);
                $accreditation   = filter_var($_POST['txt_accreditation'], FILTER_SANITIZE_SPECIAL_CHARS);
                $registerAnvisa  = filter_var($_POST['txt_register_anvisa'], FILTER_SANITIZE_SPECIAL_CHARS);
                $registerDou     = filter_var($_POST['txt_register_dou'], FILTER_SANITIZE_SPECIAL_CHARS);


                $costAta = new CostAta();
                $costAta->setIdClient($idClient);
                $costAta->setDate($date);
                $costAta->setPr($pr);
                $costAta->setProcess($process);
                $costAta->setObject($object);
                $costAta->setInDay($inDay);
                $costAta->setWinner($winner);
                $costAta->setDaysDeliver($daysDaliver);
                $costAta->setExample($example);
                $costAta->setBula($bula);
                $costAta->setCatalog($catalog);
                $costAta->setCbpf($cbpf);
                $costAta->setAccreditation($accreditation);
                $costAta->setRegisterAnvisa($registerAnvisa);
                $costAta->setRegisterDou($registerDou);
                
               $costAtaDAO = new CostAtaDAO();
               var_dump($costAtaDAO->inserCostAta($costAta));
               




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