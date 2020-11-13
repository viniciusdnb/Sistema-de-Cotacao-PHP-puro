<?php

    namespace App\Controllers;

    use App\Models\DAO\CostAtaDetailDAO;
    use App\Models\DAO\FactoryDAO;
    use App\Libs\Email;
    use App\Libs\Session;
    use App\Models\DAO\ClientDAO;
    use App\Models\DAO\CostAtaDAO;
use App\Models\DAO\CotacaoDAO;
use App\Models\DAO\UndDAO;
    use App\Models\Entity\CostAtaDetail;

class CotacaoController extends Controller
    {
        public function opened()
        {
            
            $userIdFactory = $_SESSION['idFactory'];
            
            $costAtaDetailDAO = new CostAtaDetailDAO();
            $dataSetCost = $costAtaDetailDAO->findAllStatusIdFactory($userIdFactory);

            foreach ($dataSetCost as $value) {
                $id[] = $value->getId();
                $idClient[] = $value->getIdClientAta();
                $desc[] = $value->getDescCompProduct();
                $idUnd[] = $value->getIdUnd();
                $quantity[] = $value->getQuantity();
                
            }

            $costAtaDetail = new CostAtaDetail();
            $costAtaDetail->setId($id);
            $costAtaDetail->setIdClientAta($idClient);
            $costAtaDetail->setDescCompProduct($desc);
            $costAtaDetail->setIdUnd($idUnd);
            $costAtaDetail->setQuantity($quantity);
            

            $this->setViewParam('itens', $costAtaDetail);

            $undDAO = new UndDAO();
            $this->setViewParam('und', $undDAO->findAll());

            $clientDAO = new ClientDAO();
            $this->setViewParam('client', $clientDAO->findAll());


            $this->render('/cotacao/opened');


        }

        public function history()
        {
            $costAtaDetailDAO = new CostAtaDetailDAO();
            $dataSetCost = $costAtaDetailDAO->findAllStatus("",1);

            foreach ($dataSetCost as $value) 
            {
                $id[] = $value->getId();
                $idClient[] = $value->getIdClientAta();
                $desc[] = $value->getDescCompProduct();
                $idUnd[] = $value->getIdUnd();
                $quantity[] = $value->getQuantity();
                $vlrCotado[] = $value->getVlrCotado();
            }

            $costAtaDetail = new CostAtaDetail();
            $costAtaDetail->setId($id);
            $costAtaDetail->setIdClientAta($idClient);
            $costAtaDetail->setDescCompProduct($desc);
            $costAtaDetail->setIdUnd($idUnd);
            $costAtaDetail->setQuantity($quantity);
            $costAtaDetail->setVlrCotado($vlrCotado);

            $this->setViewParam('itens', $costAtaDetail);           

            $undDAO = new UndDAO();
            $this->setViewParam('und', $undDAO->findAll());

            $clientDAO = new ClientDAO();
            $this->setViewParam('client', $clientDAO->findAll());


            $this->render('/cotacao/history');

            
            
        }

        public function submit($parms)
        {         
            $idAta = $parms[0];
                    
            $costAtaDetailDAO = new CostAtaDetailDAO();
            $itens = $costAtaDetailDAO->findAllStatus($idAta);

            foreach ($itens as  $value) 
            {
                $idFactory[] = $value->getIdFactory();
            }                   
                    
            $tot = count($idFactory);                             
                    
            for ($i=0; $i < $tot ; $i++) 
            { 
                $factoryDAO = new FactoryDAO();
                $factory[] = $factoryDAO->findId($idFactory[$i]);                   
            }

            foreach ($factory as $value) 
            {
                $nameFactory[] = $value->getNameFactory();
                $emails[] = $value->getEmailFactory();
            }                   

            $submitEmail = new Email();
            if($submitEmail->submitEmail($emails, $nameFactory))
            {
                Session::unsetMessage();
                        
                Session::setMessage("Email enviado com sucesso");
                        
                $costAtaDAO = new CostAtaDAO();
                $this->setViewParam('costAta', $costAtaDAO->findAll());
                $this->render('/costAta/index');
                        

            }
            else
            {
                Session::unsetErro();

                Session::setErro("Email enviado com sucesso");

                $costAtaDAO = new CostAtaDAO();
                $this->setViewParam('costAta', $costAtaDAO->findAll());
                $this->render('/costAta/index');
            }

        }

        public function insert()
        {
            if($_POST)
            {
                $id     = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
                $vlr    = filter_var($_POST['txt_vlr_cotado'], FILTER_SANITIZE_SPECIAL_CHARS);

                $costAtaDetail = new CostAtaDetail();
                $costAtaDetail->setId($id);
                $costAtaDetail->setVlrCotado($vlr);

                $cotacao = new CotacaoDAO();
                if($cotacao->insertCotacao($costAtaDetail))
                {
                    Session::unsetMessage();
                    Session::getErro('Cotação salva com sucesso');
                    $this->history();
                }else
                {
                    Session::unsetErro();
                    Session::setErro("Erro ao salvar a cotacao");
                    $this->opened();
                }
                
            }
        }
    }

?>