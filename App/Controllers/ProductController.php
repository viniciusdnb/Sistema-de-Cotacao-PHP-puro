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

        }

        public function insert()
        {
            if($_POST)
            {
                $code = filter_var($_POST['txt_code'], FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        
        public function update()
        {

        }

        public function delete($params)
        {
            
        }
    }

?>