<?php

    namespace App\Controllers;

    use App\Models\DAO\ClientDAO;
    use App\Models\DAO\CostAtaDetailDAO;
use App\Models\DAO\FactoryDAO;
use App\Models\DAO\ProductDAO;
use App\Models\DAO\UndDAO;

class ItensCotacaoController extends Controller
        {
            public function index()
            {
                $costAtaDetailDAO = new CostAtaDetailDAO;
                $this->setViewParam('itens', $costAtaDetailDAO->findAllStatus());
                
                $clientDAO = new ClientDAO();
                $this->setViewParam('client', $clientDAO->findAll());

                $productDAO = new ProductDAO();
                $this->setViewParam('product', $productDAO->findAll());

                $undDAO = new UndDAO();
                $this->setViewParam('und', $undDAO->findAll());

                $factoryDAO = new FactoryDAO();
                $this->setViewParam('factory', $factoryDAO->findAll());

                $this->render('/itensCotacao/index');
            }
        }

?>