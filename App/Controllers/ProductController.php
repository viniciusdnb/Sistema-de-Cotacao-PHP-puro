<?php

    namespace App\Controllers;

    use App\Models\Entity\Product;
    use App\Models\DAO\ProductDAO;
    use App\Models\Entity\Und;
    use App\Models\DAO\UndDAO;
    use App\Models\Entity\Factory;
    use App\Models\DAO\FactoryDAO;
    use App\Libs\Session;

    class ProductController extends Controller
    {
        public function index()
        {
            $product = new ProductDAO();
            $this->setViewParam('product', $product->findAll());
            $this->render('/product/index');
        }

        public function new()
        {
            $und = new UndDAO();
            $this->setViewParam('und', $und->findAll());
            
            $factory = new FactoryDAO();
            $this->setViewParam('factory', $factory->findAll());

            $this->render('/product/insert');
        }

        public function edit($params)
        {
            if($params[0])
            {
                $id = $params[0];

                $product = new ProductDAO();
                $this->setViewParam('product', $product->findId($id));

                $und = new UndDAO();
                $this->setViewParam('und', $und->findAll());

                $factory = new FactoryDAO();
                $this->setViewParam('factory', $factory->findAll());

                $this->render('/product/edit');
            }
        }

        public function insert()
        {
            if($_POST)
            {
                $code = filter_var($_POST['txt_code'], FILTER_SANITIZE_SPECIAL_CHARS);
                $descRes = strtoupper(filter_var($_POST['txt_desc_res'], FILTER_SANITIZE_SPECIAL_CHARS));
                $und = filter_var($_POST['txt_und'], FILTER_SANITIZE_SPECIAL_CHARS);
                $factory = filter_var($_POST['txt_factory'], FILTER_SANITIZE_SPECIAL_CHARS);
                $descComp = strtoupper(filter_var($_POST['txt_desc_com'], FILTER_SANITIZE_SPECIAL_CHARS));
                $active = filter_var($_POST['txt_active'], FILTER_SANITIZE_SPECIAL_CHARS);
                $medicament = filter_var($_POST['txt_medicament'], FILTER_SANITIZE_SPECIAL_CHARS);
                $controlled = filter_var($_POST['txt_controlled'], FILTER_SANITIZE_SPECIAL_CHARS);

                $product = new Product();
                $product->setCodProd($code);
                $product->setDescProd($descRes);
                $product->setIdUnd($und);
                $product->setIdFactory($factory);
                $product->setDescCompleteProd($descComp);
                $product->setActiveProd($active);
                $product->setMedciamentProd($medicament);
                $product->setControlledProd($controlled);

                $productDAO = new ProductDAO();
                $productDAO->insertProduct($product);

                Session::unsetMessage();
                Session::setMessage('Cadastro realizado com sucesso');
                $this->redirect('/product/index');  
            }
            else 
            {
                Session::unsetErro();
                Session::setErro('Erro ao tentar cadastrar, tente novamente mais tarde');   
                $this->redirect('/product/index'); 
            }
        }
        
        public function update()
        {
            if ($_POST) {
                $id = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
                $code = filter_var($_POST['txt_code'], FILTER_SANITIZE_SPECIAL_CHARS);
                $descRes = strtoupper(filter_var($_POST['txt_desc_res'], FILTER_SANITIZE_SPECIAL_CHARS));
                $und = filter_var($_POST['txt_und'], FILTER_SANITIZE_SPECIAL_CHARS);
                $factory = filter_var($_POST['txt_factory'], FILTER_SANITIZE_SPECIAL_CHARS);
                $descComp = strtoupper(filter_var($_POST['txt_desc_com'], FILTER_SANITIZE_SPECIAL_CHARS));
                $active = filter_var($_POST['txt_active'], FILTER_SANITIZE_SPECIAL_CHARS);
                $medicament = filter_var($_POST['txt_medicament'], FILTER_SANITIZE_SPECIAL_CHARS);
                $controlled = filter_var($_POST['txt_controlled'], FILTER_SANITIZE_SPECIAL_CHARS);

                $product = new Product();
                $product->setId($id);
                $product->setCodProd($code);
                $product->setDescProd($descRes);
                $product->setIdUnd($und);
                $product->setIdFactory($factory);
                $product->setDescCompleteProd($descComp);
                $product->setActiveProd($active);
                $product->setMedciamentProd($medicament);
                $product->setControlledProd($controlled);

                $productDAO = new ProductDAO();
                $productDAO->updateProduct($product);

                Session::unsetMessage();
                Session::setMessage('Cadastro Atualizado com sucesso');
                $this->redirect('/product/index');
            } 
            else 
            {
                Session::unsetErro();
                Session::setErro('Erro ao tentar Atualizado, tente novamente mais tarde');
                $this->redirect('/product/index');
            }
        }

        public function delete($params)
        {
            if($params[0])
            {
                $id = $params[0];

                $product = new Product();
                $product->setId($id);
                
                $productDAO = new ProductDAO();
                if($productDAO->deleteProduct($product))
                {
                    Session::unsetMessage();
                    Session::setMessage('Cadastro Excluido com sucesso');
                    $this->redirect('/product/index');
                }
                else 
                {
                    Session::unsetErro();
                    Session::setErro('Erro ao tentar Excluir, o produto esta sendo usado por outro registro');
                    $this->redirect('/product/index');
                }
            }
            else 
            {
                Session::unsetErro();
                Session::setErro('Erro ao tentar Excluir, tente novamente mais tarde');
                $this->redirect('/product/index'); 
            }
        }
    }

?>