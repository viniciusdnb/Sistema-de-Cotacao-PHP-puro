<?php

    namespace App\Models\DAO;

    use App\Models\DAO\BaseDAO;
    use App\Models\Entity\CostAtaDetail;
    use Exception;

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
            $resultTot = $this("SELECT COUNT id_ata_cost FROM cost_ata_detail WHERE id_ata_cost = '$idCostAta'");

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
                                            WHERE cost_ata_detail.id_ata_cost = '$idCostAta'"
                                     );

            $dataSetCostAtaDetail = $result->fetchAll();

            if($dataSetCostAtaDetail)
            {
                $findAll = [];

                foreach ($dataSetCostAtaDetail as $value) 
                {
                    $costAtaDetail = new CostAtaDetail();

                    for ($i=0; $i <$resultTot ; $i++) 
                    {
                        $costAtaDetail->setId($value['id'])[$i];
                        $costAtaDetail->setIdAtaCost($value['id_ata_cost'])[$i];
                        $costAtaDetail->setPrAtaCost($value['pr_ata_cost'])[$i];
                        $costAtaDetail->setIdClientAta($value['id_client_ata_cost'])[$i];
                        $costAtaDetail->setItem($value['item'])[$i];
                        $costAtaDetail->setDescCompProduct($value['desc_comp_product'])[$i];
                        $costAtaDetail->setIdProduct($value['id_product'])[$i];
                        $costAtaDetail->setNameProduct($value['name_product'])[$i];
                        $costAtaDetail->setIdUnd($value['id_und'])[$i];
                        $costAtaDetail->setNameUnd($value['und'])[$i];
                        $costAtaDetail->setQuantity($value['quantity'])[$i];
                        $costAtaDetail->setIdFactory($value['id_factory'])[$i];
                        $costAtaDetail->setNameFactory($value['name_factory'])[$i];
                        $costAtaDetail->setCostUnity($value['cost_unity'])[$i];
                        $costAtaDetail->setCostTaotal($value['cost_total'])[$i];
                        $costAtaDetail->setP1($value['p1'])[$i];
                        $costAtaDetail->setP1Total($value['p1_total'])[$i];
                        $costAtaDetail->setP2($value['p2'])[$i];
                        $costAtaDetail->setP2Total($value['p2_total'])[$i];
                        $costAtaDetail->setP3($value['p3'])[$i];
                        $costAtaDetail->setP3Total($value['p3_total'])[$i];
                        $costAtaDetail->setMinimum($value['minimum'])[$i];
                        $costAtaDetail->setMinimumTotal($value['minimum_total'])[$i];

                        $i++;
                    }
                    


                    //metodo que retorna a entidade costAta gerado atravez do metodo construtor da entidade costAtaDetail
                    //e setamos o id do costAta.
                    $costAtaDetail->getCostAta()->setId($value['id_ata_cost']);

                    $findAll[] = $costAtaDetail;
                }

                return $findAll;
            }
            else 
            {
                return FALSE;    
            }
        }

        public function insertCostAtaDetail(CostAtaDetail $costAtaDetail)
        {
            try 
            {
                $id                 = $costAtaDetail->getId();
                $totId              = count($id);
                
                $idAtaCost          = [];
                $prAtaCost          = [];
                $idClientAta        = [];
                $item               = [];
                $descCompProduct    = [];
                $idProduct          = [];
                $idUnd              = [];
                $quantity           = [];
                $idFactory          = [];
                $costUnity          = [];
                $costTaotal         = [];
                $p1                 = [];
                $p1Total            = [];
                $p2                 = [];
                $p2Total            = [];
                $p3                 = [];
                $p3Total            = [];
                $minimum            = [];
                $minimumTotal       = [];
                
                for ($i=0; $i <$totId ; $i++) 
                {
                    $idAtaCost[$i]            = $costAtaDetail->getCostAta()->getId();
                    $prAtaCost[$i]            = $costAtaDetail->getCostAta()->getPr();
                    $idClientAta[$i]          = $costAtaDetail->getCostAta()->getIdClient();
                    $item[$i]                 = $costAtaDetail->getItem()[$i];
                    $descCompProduct[$i]      = $costAtaDetail->getDescCompProduct()[$i];
                    $idProduct[$i]            = $costAtaDetail->getIdProduct()[$i];
                    $idUnd[$i]                = $costAtaDetail->getIdUnd()[$i];
                    $quantity[$i]             = $costAtaDetail->getQuantity()[$i];
                    $idFactory[$i]            = $costAtaDetail->getIdFactory()[$i];
                    $costUnity[$i]            = $costAtaDetail->getCostUnity()[$i];
                    $costTaotal[$i]           = $costAtaDetail->getCostTaotal()[$i];
                    $p1[$i]                   = $costAtaDetail->getP1()[$i];
                    $p1Total[$i]              = $costAtaDetail->getP1Total()[$i];
                    $p2[$i]                   = $costAtaDetail->getP2()[$i];
                    $p2Total[$i]              = $costAtaDetail->getP2Total()[$i];
                    $p3[$i]                   = $costAtaDetail->getP3()[$i];
                    $p3Total[$i]              = $costAtaDetail->getP3Total()[$i];
                    $minimum[$i]              = $costAtaDetail->getMinimum()[$i];
                    $minimumTotal[$i]         = $costAtaDetail->getMinimumTotal()[$i];

                    $i++;
                }
                    
                    
                
                
                
                
                $result = [];

                /*for ($i=0; $i < $totId ; $i++) { 
                    $result[] = $this->insert('cost_ata_detail',
                    ':id_ata_cost, :pr_ata_cost, :id_client_ata_cost, :item, :desc_comp_product, :id_product, :id_und, :quantity, :id_factory,
                    :cost_unity, :cost_total, :p1, :p1_total, :p2, :p2_total, :p3, :p3_total, :minimum, :minimum_total', 
                    [
                        ':id_ata_cost'          => $idAtaCost[$i],
                        ':pr_ata_cost'          =>
                        ':id_client_ata_cost'   =>
                        ':item'                 =>
                        ':desc_comp_product'    =>
                        ':id_product'           =>
                        ':id_und'               =>
                        ':quantity'             =>
                        ':id_factory'           =>
                        ':cost_unity'           =>
                        ':cost_total'           =>
                        ':p1'                   =>
                        ':p1_total'             =>
                        ':p2'                   =>
                        ':p2_total'             =>
                        ':p3'                   =>
                        ':p3_total'             =>
                        ':minimum'              =>
                        ':minimum_total'        =>

                    ]);
                }*/

                if($result > 0)
                {
                    return TRUE;
                }
                else 
                {
                    return FALSE;    
                }

            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

?>