<?php

    namespace App\Models\DAO;

    use App\Models\Entity\CostAta;
    use App\Models\DAO\BaseDAO;
    use Exception;

    class CostAtaDAO extends BaseDAO
    {
        public function findId($id)
        {
            $result = $this->select("SELECT cost_Ata.id,
                                            cost_Ata.id_Client,
                                            cost_Ata.date,
                                            cost_Ata.pr,
                                            cost_Ata.process
                                            cost_Ata.object,
                                            cost_Ata.in_day,
                                            cost_Ata.winner,
                                            cost_Ata.days_deliver,
                                            cost_Ata.example,
                                            cost_Ata.bula,
                                            cost_Ata.catalog,
                                            cost_Ata.cbpf,
                                            cost_Ata.accreditation,
                                            cost_Ata.register_anvisa,
                                            cost_Ata.register_dou,
                                            client.name_client
                                        FROM cost_Ata
                                        INNER JOIN client
                                        ON cost_Ata.id = client.id
                                        WHERE cost_Ata.id = '$id'");
            
            $dataSetCostAta = $result->fetch();

            if($dataSetCostAta)
            {
                $costAta = new CostAta();
                $costAta->setId($dataSetCostAta['id']);
                $costAta->setIdClient($dataSetCostAta['id_Client']);
                $costAta->setDate($dataSetCostAta['date']);
                $costAta->setPr($dataSetCostAta['pr']);
                $costAta->setProcess($dataSetCostAta['process']);
                $costAta->setObject($dataSetCostAta['object']);
                $costAta->setInDay($dataSetCostAta['in_day']);
                $costAta->setWinner($dataSetCostAta['winner']);
                $costAta->setDaysDeliver($dataSetCostAta['days_deliver']);
                $costAta->setExample($dataSetCostAta['example']);
                $costAta->setBula($dataSetCostAta['bula']);
                $costAta->setCatalog($dataSetCostAta['catalog']);
                $costAta->setCbpf($dataSetCostAta['cbpf']);
                $costAta->setAcreditation($dataSetCostAta['accreditation']);
                $costAta->setRegisterAnvisa($dataSetCostAta['register_anvisa']);
                $costAta->setRegisterDou($dataSetCostAta['register_dou']);
                $costAta->setNameClient($dataSetCostAta['name_client']);
                
                return $costAta;

            }
            else 
            {
                return FALSE;    
            }
        }

        public function findAll()
        {
            $result = $this->select("SELECT cost_Ata.id,
                                                cost_Ata.id_Client,
                                                cost_Ata.date,
                                                cost_Ata.pr,
                                                cost_Ata.process
                                                cost_Ata.object,
                                                cost_Ata.in_day,
                                                cost_Ata.winner,
                                                cost_Ata.days_deliver,
                                                cost_Ata.example,
                                                cost_Ata.bula,
                                                cost_Ata.catalog,
                                                cost_Ata.cbpf,
                                                cost_Ata.accreditation,
                                                cost_Ata.register_anvisa,
                                                cost_Ata.register_dou,
                                                client.name_client
                                            FROM cost_Ata
                                            INNER JOIN client
                                            ON cost_Ata.id = client.id");

            $dataSetCostAta = $result->fetchAll();

            if($dataSetCostAta)
            {
                $findAll = [];

                foreach ($dataSetCostAta as $value) 
                {
                    $costAta = new CostAta();
                    $costAta->setId($value['id']);
                    $costAta->setIdClient($value['id_Client']);
                    $costAta->setDate($value['date']);
                    $costAta->setPr($value['pr']);
                    $costAta->setProcess($value['process']);
                    $costAta->setObject($value['object']);
                    $costAta->setInDay($value['in_day']);
                    $costAta->setWinner($value['winner']);
                    $costAta->setDaysDeliver($value['days_deliver']);
                    $costAta->setExample($value['example']);
                    $costAta->setBula($value['bula']);
                    $costAta->setCatalog($value['catalog']);
                    $costAta->setCbpf($value['cbpf']);
                    $costAta->setAcreditation($value['accreditation']);
                    $costAta->setRegisterAnvisa($value['register_anvisa']);
                    $costAta->setRegisterDou($value['register_dou']);
                    $costAta->setNameClient($value['name_client']);

                    $findAll[] = $costAta;
                }

                return $findAll;
            }
            else 
            {
                return FALSE;    
            }

        }

        public function inserCostAta(CostAta $costAta)
        {
            try 
            {
                $idClient = $costAta->getIdClient();
                
            } 
            catch (\Exception $ex) 
            {
               
            }
        }
        public function updateCostAta(CostAta $costAta)
        {
        
        }
        public function deleteCostAta(CostAta $costAta)
        {
        
        }
    }


?>