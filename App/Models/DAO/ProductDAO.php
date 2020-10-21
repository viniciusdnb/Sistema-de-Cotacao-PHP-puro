<?php

    namespace App\Models\DAO;

    use App\Models\Entity\Product;
    use App\Models\DAO\BaseDAO;
    use Exception;

    class ProductDAO extends BaseDAO
    {
        public function findId($id)
        {
            $result = $this->select("SELECT product.id,
                                            product.code_prod,
                                            product.desc_prod,
                                            product.id_und,
                                            und.und,                                            
                                            product.id_factory,
                                            factory.name_factory,                                            
                                            product.active_prod,
                                            product.medicament_prod,
                                            product.controlled_prod,
                                            product.desc_complete_prod
                                    FROM product
                                    INNER JOIN und ON product.id_und = und.id
                                    INNER JOIN factory ON product.id_factory = factory.id
                                    WHERE product.id = '$id'");
            
            $dataSetProduct = $result->fetch();

            if($dataSetProduct)
            {
                $product = new Product();
                $product->setId($dataSetProduct['id']);
                $product->setCodProd($dataSetProduct['code_prod']);
                $product->setDescProd($dataSetProduct['desc_prod']);
                $product->setIdUnd($dataSetProduct['id_und']);
                $product->setDescUnd($dataSetProduct['und']);
                $product->setIdFactory($dataSetProduct['id_factory']);
                $product->setNameFactory($dataSetProduct['name_factory']);
                $product->setActiveProd($dataSetProduct['active_prod']);
                $product->setMedciamentProd($dataSetProduct['medicament_prod']);
                $product->setControlledProd($dataSetProduct['controlled_prod']);
                $product->setDescCompleteProd($dataSetProduct['desc_complete_prod']);

                return $product;
            }
            else 
            {
                return FALSE;    
            }
        }

        public function findAll()
        {
            $result = $this->select("SELECT product.id,
                                                product.code_prod,
                                                product.desc_prod,
                                                product.id_und,
                                                und.und,                                            
                                                product.id_factory,
                                                factory.name_factory,                                            
                                                product.active_prod,
                                                product.medicament_prod,
                                                product.controlled_prod,
                                                product.desc_complete_prod
                                        FROM product
                                        INNER JOIN und ON product.id_und = und.id
                                        INNER JOIN factory ON product.id_factory = factory.id");

            $dataSetProduct = $result->fetchAll();

            if ($dataSetProduct) {
                
                $findAll = [];

                foreach($dataSetProduct as $value)
                {
                    $product = new Product();
                    $product->setId($value['id']);
                    $product->setCodProd($value['code_prod']);
                    $product->setDescProd($value['desc_prod']);
                    $product->setIdUnd($value['id_und']);
                    $product->setDescUnd($value['und']);
                    $product->setIdFactory($value['id_factory']);
                    $product->setNameFactory($value['name_factory']);
                    $product->setActiveProd($value['active_prod']);
                    $product->setMedciamentProd($value['medicament_prod']);
                    $product->setControlledProd($value['controlled_prod']);
                    $product->setDescCompleteProd($value['desc_complete_prod']);

                    $findAll[] = $product;
                }

                return $findAll;
            } 
            else 
            {
                return FALSE;
            }
        }
       // $id                 = $product->getId();
        public function insertProduct(Product $product)
        {
            try
            {            
                $codeProd           = $product->getCodProd();
                $descProd           = $product->getDescProd();
                $idUnd              = $product->getIdUnd();                
                $idFactory          = $product->getIdFactory();                
                $activeProd         = $product->getActiveProd();
                $medciamentProd     = $product->getMedciamentProd();
                $controlledProd     = $product->getControlledProd();
                $descCompleteProd   = $product->getDescCompleteProd();

                return $this->insert('product', ':code_prod, :desc_prod, :id_und, :id_factory,
                                                :active_prod, :medicament_prod, :controlled_prod,
                                                :desc_complete_prod',
                                                [
                                                    ':code_prod'            => $codeProd,
                                                    ':desc_prod'            => $descProd,
                                                    ':id_und'               => $idUnd,
                                                    ':id_factory'           => $idFactory,
                                                    ':active_prod'          => $activeProd,
                                                    ':medicament_prod'      => $medciamentProd,
                                                    ':controlled_prod'      => $controlledProd,
                                                    ':desc_complete_prod'   => $descCompleteProd               
                                                ]
                                     );
            }
            catch(\Exception $ex)
            {
                throw new Exception("Erro ao inserir " . $ex->getMessage(), 500);
                
            }            
        }

        public function updateProduct(Product $product)
        {
            try 
            {
                $id                 = $product->getId();
                $codeProd           = $product->getCodProd();
                $descProd           = $product->getDescProd();
                $idUnd              = $product->getIdUnd();
                $idFactory          = $product->getIdFactory();
                $activeProd         = $product->getActiveProd();
                $medciamentProd     = $product->getMedciamentProd();
                $controlledProd     = $product->getControlledProd();
                $descCompleteProd   = $product->getDescCompleteProd();

                return $this->insert('product', 'code_prod = :code_prod, desc_prod = :desc_prod, id_und = :id_und, 
                                                id_factory = :id_factory, active_prod = :active_prod, medicament_prod = :medicament_prod, 
                                                controlled_prod =:controlled_prod, desc_complete_prod = :desc_complete_prod',
                                                [
                                                    ':id'                   => $id,
                                                    ':code_prod'            => $codeProd,
                                                    ':desc_prod'            => $descProd,
                                                    ':id_und'               => $idUnd,
                                                    ':id_factory'           => $idFactory,
                                                    ':active_prod'          => $activeProd,
                                                    ':medicament_prod'      => $medciamentProd,
                                                    ':controlled_prod'      => $controlledProd,
                                                    ':desc_complete_prod'   => $descCompleteProd
                                                ],
                                                "id = :id"
                                     );
            } 
            catch (\Exception $ex) 
            {
                throw new Exception("Erro ao Atualizar " . $ex->getMessage(), 500);
            }
        }

        public function deleteProduct(Product $product)
        {
            try {
                $id = $product->getId();

                if($this->delete('product', "id = '$id'"))
                {
                    return TRUE;
                }
                else 
                {
                    return FALSE;    
                }
            } catch (\Exception $ex) {
                throw new Exception("Erro ao Atualizar " . $ex->getMessage(), 500);
            }
        }
    }
?>