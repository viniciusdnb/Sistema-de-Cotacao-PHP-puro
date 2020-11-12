<?php

    namespace App\Controllers;

    use App\Models\DAO\CostAtaDetailDAO;
    use App\Models\DAO\FactoryDAO;
    use App\Libs\Email;
    use App\Libs\Session;
    use App\Models\DAO\CostAtaDAO;


class CotacaoController extends Controller
            {
                public function submit($parms)
                {
                    
                    
                    $idAta = $parms[0];
                    
                    $costAtaDetailDAO = new CostAtaDetailDAO();
                    $itens = $costAtaDetailDAO->findAllStatus($idAta);

                    foreach ($itens as  $value) {
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
        }

?>