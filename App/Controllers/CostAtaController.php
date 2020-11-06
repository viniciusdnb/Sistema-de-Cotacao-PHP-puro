<?php

    namespace App\Controllers;

use App\Libs\Session;
use App\Models\DAO\AgentDAO;
use App\Models\DAO\ClientDAO;
use App\Models\DAO\CostAtaDAO;
use App\Models\DAO\CostAtaDetailDAO;
use App\Models\DAO\FactoryDAO;
use App\Models\DAO\ProductDAO;
use App\Models\DAO\UndDAO;
use App\Models\Entity\CostAta;
use App\Models\Entity\CostAtaDetail;
use DateTime;

class CostAtaController extends Controller
    {
        public function index()
        {
           $costAtaDAO = new CostAtaDAO();
           $this->setViewParam('costAta', $costAtaDAO->findAll()); 
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

        public function edit($params)
        {
            if($params[0])
            {
                $id = $params[0];

                $costAtaDAO = new CostAtaDAO();
                $this->setViewParam('headerCostAta', $costAtaDAO->findId($id));
                $this->render('/costAta/editHeader');
            }
        }

        public function editItens($params)
        {
            if ($params[0]) {
                $id = $params[0];

                $costAtaDAO = new CostAtaDAO();
                $this->setViewParam('headerCostAta', $costAtaDAO->findId($id));

                $costAtaDetailDAO = new CostAtaDetailDAO();
                $this->setViewParam('itens', $costAtaDetailDAO->findAll($id));
                //$this->render('/costAta/editItens');
            }
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

               if($costAtaDAO->inserCostAta($costAta))
               {    
                    $lasId = $costAtaDAO->getLastId();
                    Session::unsetLastId();
                    Session::setLastId($lasId);                    
                   
                    $this->setViewParam('headerCostAta', $costAtaDAO->findId($lasId));

                    $productDAO = new ProductDAO();
                    $this->setViewParam('product', $productDAO->findAll());

                    $undDAO = new UndDAO();
                    $this->setViewParam('und', $undDAO->findAll());

                    $factoryDAO = new FactoryDAO();
                    $this->setViewParam('factory', $factoryDAO->findAll());

                    Session::unsetMessage();
                    Session::setMessage('Ata Cadastrada com sucesso');
                    $this->render('/costAta/itens');
               }
               else 
               {
                    Session::unsetErro();
                    Session::setErro('Nao foi possivel inserir tente novamente mais tarde!');
                    $this->redirect('/costAta/index');
               }
           }
           else 
           {
                Session::unsetErro();
                Session::setErro('Nao foi possivel inserir verifique os dados e tente novamente');
                $this->redirect('/costAta/index'); 
           }
        }

        public function insertDetail()
        {
            

            if($_POST)
            {
                $costAtaId              = Session::getLastId();//filter_var($_POST['cost_ata_id'], FILTER_SANITIZE_SPECIAL_CHARS);
                $costAtaPr              = filter_var($_POST['cost_ata_pr'], FILTER_SANITIZE_SPECIAL_CHARS);
                $costAtaIdClient        = filter_var($_POST['cost_ata_id_client'], FILTER_SANITIZE_SPECIAL_CHARS);

                $numberItem             = $_POST['txt_number_item'];                
                $descriptionComplete    = $_POST['txt_desc_complete'];
                $idProduct              = $_POST['txt_id_product'];
                $idUnd                  = $_POST['txt_id_und'];
                $idFactory              = $_POST['txt_id_factory'];
                $quantity               = $_POST['txt_quantity'];
                $costUnity              = $_POST['txt_cost_unity']; 
                $p1                     = $_POST['txt_p1'];                                        
                $p2                     = $_POST['txt_p2'];                                        
                $p3                     = $_POST['txt_p3'];                                       
                $minimum                = $_POST['txt_minimum'];

                $costAtaDetail = new CostAtaDetail();
                $costAtaDetail->setIdAtaCost($costAtaId);
                $costAtaDetail->setPrAtaCost($costAtaPr);
                $costAtaDetail->setIdClientAta($costAtaIdClient);
                $costAtaDetail->setItem($numberItem);
                $costAtaDetail->setDescCompProduct($descriptionComplete);
                $costAtaDetail->setIdProduct($idProduct);
                $costAtaDetail->setIdUnd($idUnd);
                $costAtaDetail->setIdFactory($idFactory);
                $costAtaDetail->setQuantity($quantity);
                $costAtaDetail->setCostUnity($costUnity);
                $costAtaDetail->setP1($p1);
                $costAtaDetail->setP2($p2);
                $costAtaDetail->setP3($p3);
                $costAtaDetail->setMinimum($minimum);

                $costAtaDetailDAO = new CostAtaDetailDAO();
               
                if($costAtaDetailDAO->insertCostAtaDetail($costAtaDetail))
                {
                    Session::unsetMessage();
                    Session::setMessage('itens Cadastrada com sucesso');
                    $this->index();
                }
                else 
                {
                    Session::unsetErro();
                    Session::setErro('Nao foi possivel inserir tente novamente mais tarde!');
                    $this->redirect('/costAta/index');
                }
            }
            else
            {
                Session::unsetErro();
                Session::setErro('Nao foi possivel inserir verifique os dados e tente novamente');
                $this->redirect('/costAta/index'); 
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