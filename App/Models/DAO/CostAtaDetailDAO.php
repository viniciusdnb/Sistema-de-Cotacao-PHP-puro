<?php

    namespace App\Models\DAO;

    use App\Models\DAO\BaseDAO;
    use App\Models\Entity\CostAtaDetail;
    use Exception;
use PDO;
use PDOException;

class CostAtaDetailDAO extends BaseDAO
    {
        public function findId($id)
        {
            $result = $this->select("SELECT cost_ata_detail.id,
                                            cost_ata_detail.id_ata_cost,
                                            cost_ata_detail.pr_ata_cost,
                                            cost_ata_detail.id_client_ata_cost,
                                            cost_ata_detail.item,
                                            cost_ata_detail.desc_comp_product,
                                            cost_ata_detail.id_product,
                                            cost_ata_detail.id_und,
                                            cost_ata_detail.quantity,
                                            cost_ata_detail.id_factory,
                                            cost_ata_detail.cost_unity,
                                            cost_ata_detail.cost_total,
                                            cost_ata_detail.p1,
                                            cost_ata_detail.p1_total,
                                            cost_ata_detail.p2,
                                            cost_ata_detail.p2_total,
                                            cost_ata_detail.p3,
                                            cost_ata_detail.p3_total,
                                            cost_ata_detail.minimum,
                                            cost_ata_detail.minimum_total,                                            
                                            product.name_product,
                                            und.und,
                                            factory.name_factory
                                        FROM cost_ata_detail                                        
                                        INNER JOIN product ON cost_ata_detail.id_product = product.id
                                        INNER JOIN und ON cost_ata_detail.id_und = und.id
                                        INNER JOIN factory ON cost_ata_detail.id_factoy = factory.id
                                        WHERE cost_ata_detail.id = '$id'"
                                     );

            $dataSetCostAtaDetail = $result->fetch();

            if($dataSetCostAtaDetail)
            {
                $costAtaDetail = new CostAtaDetail();
                $costAtaDetail->setId($dataSetCostAtaDetail['id']);
                $costAtaDetail->setIdAtaCost($dataSetCostAtaDetail['id_ata_cost']);
                $costAtaDetail->setPrAtaCost($dataSetCostAtaDetail['pr_ata_cost']);
                $costAtaDetail->setIdClientAta($dataSetCostAtaDetail['id_client_ata_cost']);
                $costAtaDetail->setItem($dataSetCostAtaDetail['item']);
                $costAtaDetail->setDescCompProduct($dataSetCostAtaDetail['desc_comp_product']);
                $costAtaDetail->setIdProduct($dataSetCostAtaDetail['id_product']);
                $costAtaDetail->setNameProduct($dataSetCostAtaDetail['name_product']);
                $costAtaDetail->setIdUnd($dataSetCostAtaDetail['id_und']);
                $costAtaDetail->setNameUnd($dataSetCostAtaDetail['und']);
                $costAtaDetail->setQuantity($dataSetCostAtaDetail['quantity']);
                $costAtaDetail->setIdFactory($dataSetCostAtaDetail['id_factory']);
                $costAtaDetail->setNameFactory($dataSetCostAtaDetail['name_factory']);
                $costAtaDetail->setCostUnity($dataSetCostAtaDetail['cost_unity']);
                $costAtaDetail->setCostTaotal($dataSetCostAtaDetail['cost_total']);
                $costAtaDetail->setP1($dataSetCostAtaDetail['p1']);
                $costAtaDetail->setP1Total($dataSetCostAtaDetail['p1_total']);
                $costAtaDetail->setP2($dataSetCostAtaDetail['p2']);
                $costAtaDetail->setP2Total($dataSetCostAtaDetail['p2_total']);
                $costAtaDetail->setP3($dataSetCostAtaDetail['p3']);
                $costAtaDetail->setP3Total($dataSetCostAtaDetail['p3_total']);
                $costAtaDetail->setMinimum($dataSetCostAtaDetail['minimum']);
                $costAtaDetail->setMinimumTotal($dataSetCostAtaDetail['minimum_total']);              


                //metodo que retorna a entidade costAta gerado atravez do metodo construtor da entidade costAtaDetail
                //e setamos o id do costAta.
                $costAtaDetail->getCostAta()->setId($dataSetCostAtaDetail['id_ata_cost']);

                return $costAtaDetail;

            }
            else
            {
                return FALSE;
            }
        }

        public function findAll($idCostAta)
        {   
            $resultTot = $this->select("SELECT * FROM cost_ata_detail WHERE id_ata_cost = '$idCostAta'");
            $total = $resultTot->rowCount();

            
            
            $result = $this->select("SELECT cost_ata_detail.id,
                                                cost_ata_detail.id_ata_cost,
                                                cost_ata_detail.pr_ata_cost,
                                                cost_ata_detail.id_client_ata_cost,
                                                cost_ata_detail.item,
                                                cost_ata_detail.desc_comp_product,
                                                cost_ata_detail.id_product,
                                                cost_ata_detail.id_und,
                                                cost_ata_detail.quantity,
                                                cost_ata_detail.id_factory,
                                                cost_ata_detail.cost_unity,                                                
                                                cost_ata_detail.p1,                                                 
                                                cost_ata_detail.p2,                                               
                                                cost_ata_detail.p3,                                                
                                                cost_ata_detail.minimum,
                                                product.desc_prod,
                                                und.und,
                                                factory.name_factory
                                            FROM cost_ata_detail                                        
                                            INNER JOIN product ON cost_ata_detail.id_product = product.id
                                            INNER JOIN und ON cost_ata_detail.id_und = und.id
                                            INNER JOIN factory ON cost_ata_detail.id_factory = factory.id
                                            WHERE cost_ata_detail.id_ata_cost = '$idCostAta'"
                                     );

            $dataSetCostAtaDetail = $result->fetchAll();
            
           // var_dump($dataSetCostAtaDetail);
            
           
                                     
            for ($i=0; $i < $total; $i++) 
            { 
                
                $id[]                       = $dataSetCostAtaDetail[$i]['id'];
                $costAtaId[]                = $dataSetCostAtaDetail[$i]['id_ata_cost'];             
                $costAtaPr[]                = $dataSetCostAtaDetail[$i]['pr_ata_cost'];
                $costAtaIdClient[]          = $dataSetCostAtaDetail[$i]['id_client_ata_cost'];
                $numberItem[]               = $dataSetCostAtaDetail[$i]['item'];
                $descriptionComplete[]      = $dataSetCostAtaDetail[$i]['desc_comp_product'];
                $idProduct[]                = $dataSetCostAtaDetail[$i]['id_product'];
                $idUnd[]                    = $dataSetCostAtaDetail[$i]['id_und'];
                $idFactory[]                = $dataSetCostAtaDetail[$i]['quantity'];
                $quantity[]                 = $dataSetCostAtaDetail[$i]['id_factory'];
                $costUnity[]                = $dataSetCostAtaDetail[$i]['cost_unity'];
                $p1[]                       = $dataSetCostAtaDetail[$i]['p1'];
                $p2[]                       = $dataSetCostAtaDetail[$i]['p2'];
                $p3[]                       = $dataSetCostAtaDetail[$i]['p3'];
                $minimum[]                  = $dataSetCostAtaDetail[$i]['minimum'];
                $descProd[]                 = $dataSetCostAtaDetail[$i]['desc_prod'];
                $und[]                      = $dataSetCostAtaDetail[$i]['und'];
                $nameFactory[]              = $dataSetCostAtaDetail[$i]['name_factory'];

            }
            
            

            $costAtaDetail = new CostAtaDetail();
            $costAtaDetail->setId($id);
            $costAtaDetail->setIdAtaCost($costAtaId);
            $costAtaDetail->setPrAtaCost($costAtaPr);
            $costAtaDetail->setIdClientAta($costAtaIdClient);
            $costAtaDetail->setItem($numberItem);
            $costAtaDetail->setDescCompProduct($descriptionComplete);
            $costAtaDetail->setIdProduct($idProduct);
            $costAtaDetail->setNameProduct($descProd);
            $costAtaDetail->setIdUnd($idUnd);
            $costAtaDetail->setNameUnd($und);
            $costAtaDetail->setQuantity($quantity);
            $costAtaDetail->setIdFactory($idFactory);
            $costAtaDetail->setNameFactory($nameFactory);
            $costAtaDetail->setCostUnity($costUnity);
            $costAtaDetail->setP1($p1);
            $costAtaDetail->setP2($p2);
            $costAtaDetail->setP3($p3);
            $costAtaDetail->setMinimum($minimum);
            

            

            var_dump($costAtaDetail);
            

            

            
          
                                
            
            
        }

        public function insertCostAtaDetail(CostAtaDetail $costAtaDetail)
        {

        

       
           try           
            {
                
                $tot = count($costAtaDetail->getItem());
                
                $costAtaId              = $costAtaDetail->getIdAtaCost();
                $costPr                 = $costAtaDetail->getPrAtaCost();
                $costidClient           = $costAtaDetail->getIdClientAta();
                $numberItem             = $costAtaDetail->getItem();
                $descriptionComplete    = $costAtaDetail->getDescCompProduct();
                $idProduct              = $costAtaDetail->getIdProduct();
                $idUnd                  = $costAtaDetail->getIdUnd();
                $idFactory              = $costAtaDetail->getIdFactory();
                $quantity               = $costAtaDetail->getQuantity();
                $costUnity              = $costAtaDetail->getCostUnity();
                $p1                     = $costAtaDetail->getP1();                                       
                $p2                     = $costAtaDetail->getP2();
                $p3                     = $costAtaDetail->getP3();
                $minimum                = $costAtaDetail->getMinimum();

                
                for ($i=0; $i < $tot ; $i++) 
                { 
                    $result = $this->insert('cost_ata_detail',
                    ':id_ata_cost, :pr_ata_cost, :id_client_ata_cost, :item, :desc_comp_product, :id_product, :id_und, :quantity, :id_factory,
                    :cost_unity, :p1, :p2, :p3, :minimum',
                    [
                        ':id_ata_cost'           => $costAtaId,
                        ':pr_ata_cost'           => $costPr,
                        ':id_client_ata_cost'    => $costidClient,
                        ':item'                  => $numberItem[$i],
                        ':desc_comp_product'     => $descriptionComplete[$i],
                        ':id_product'            => $idProduct[$i],
                        ':id_und'                => $idUnd[$i],
                        ':quantity'              => $quantity[$i],
                        ':id_factory'            => $idFactory[$i],
                        ':cost_unity'            => $costUnity[$i],
                        ':p1'                    => $p1[$i],
                        ':p2'                    => $p2[$i],
                        ':p3'                    => $p3[$i],
                        ':minimum'               => $minimum[$i]
                    ]);

                }   
                
                return $result;
                
            } catch (PDOException $ex) 
            {
                throw new Exception("Erro ao cadastrar " . $ex->getMessage(), 500);
            }      
        }
    }

?>