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

            


        }
    }

?>