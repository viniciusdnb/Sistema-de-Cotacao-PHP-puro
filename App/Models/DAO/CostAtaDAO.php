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
                                            cost_ata.id_agent,
                                            client.name_client,                                            
                                            agent.name_agent
                                        FROM cost_Ata
                                        INNER JOIN client ON cost_Ata.id_client = client.id
                                        INNER JOIN agent ON cost_ata.id_agent = agent.id 
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
                $costAta->setAccreditation($dataSetCostAta['accreditation']);
                $costAta->setRegisterAnvisa($dataSetCostAta['register_anvisa']);
                $costAta->setRegisterDou($dataSetCostAta['register_dou']);
                $costAta->setNameClient($dataSetCostAta['name_client']);
                $costAta->setIdAgent($dataSetCostAta['id_agent']);
                $costAta->setNameAgent($dataSetCostAta['name_agent']);
                
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
                                                cost_ata.id_agent,
                                                client.name_client,                                            
                                                agent.name_agent
                                            FROM cost_Ata
                                            INNER JOIN client ON cost_Ata.id_client = client.id
                                            INNER JOIN agent ON cost_ata.id_agent = agent.id ");

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
                    $costAta->setAccreditation($value['accreditation']);
                    $costAta->setRegisterAnvisa($value['register_anvisa']);
                    $costAta->setRegisterDou($value['register_dou']);
                    $costAta->setNameClient($value['name_client']);
                    $costAta->setIdAgent($dataSetCostAta['id_agent']);
                    $costAta->setNameAgent($dataSetCostAta['name_agent']);

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
                
                $idClient       = $costAta->getIdClient();
                $date           = $costAta->getDate();
                $pr             = $costAta->getPr();
                $process        = $costAta->getProcess();
                $object         = $costAta->getObject();
                $inDay          = $costAta->getInDay();
                $winner         = $costAta->getWinner();
                $daysDeliver    = $costAta->getDaysDeliver();
                $example        = $costAta->getExample();
                $bula           = $costAta->getBula();
                $catalog        = $costAta->getCatalog();
                $cbpf           = $costAta->getCbpf();
                $accreditation  = $costAta->getAccreditation();
                $registerAnvisa = $costAta->getRegisterAnvisa();
                $registerDou    = $costAta->getRegisterDou();                
                $idAgent        = $costAta->getIdAgent();

                return $this->insert('cost_ata', ':id_client, :date, :pr, :process,
                                                :object, :in_day, :winner, :days_deliver,
                                                :example, :bual, :catalog, :cbpf, :accreditation, 
                                                :register_anvisa, :register_dou, :id_agent',
                                                [
                                                    ':id_client'        => $idClient,
                                                    ':date'             => $date,
                                                    ':pr'               => $pr,
                                                    ':process'          => $process,
                                                    ':object'           => $object,
                                                    ':in_day'           => $inDay,
                                                    ':winner'           => $winner,
                                                    ':days_deliver'     => $daysDeliver,
                                                    ':example'          => $example,
                                                    ':bual'             => $bula,
                                                    ':catalog'          => $catalog,
                                                    ':cbpf'             => $cbpf,
                                                    ':accreditation'    => $accreditation,
                                                    ':register_anvisa'  => $registerAnvisa,
                                                    ':register_dou'     => $registerDou,
                                                    ':id_agent'         => $idAgent
                                                ]
                                     );
            } 
            catch (\Exception $ex) 
            {
               throw new Exception("Erro ao cadastrar " . $ex->getMessage(), 500);
               
            }
        }
        public function updateCostAta(CostAta $costAta)
        {
            try {

                $id             = $costAta->getId();
                $idClient       = $costAta->getIdClient();
                $date           = $costAta->getDate();
                $pr             = $costAta->getPr();
                $process        = $costAta->getProcess();
                $object         = $costAta->getObject();
                $inDay          = $costAta->getInDay();
                $winner         = $costAta->getWinner();
                $daysDeliver    = $costAta->getDaysDeliver();
                $example        = $costAta->getExample();
                $bula           = $costAta->getBula();
                $catalog        = $costAta->getCatalog();
                $cbpf           = $costAta->getCbpf();
                $accreditation  = $costAta->getAccreditation();
                $registerAnvisa = $costAta->getRegisterAnvisa();
                $registerDou    = $costAta->getRegisterDou();
                $idAgent        = $costAta->getIdAgent();

                return $this->update('cost_ata', 'id_client = :id_client, date = :date, pr = :pr, 
                                                    process = :process, object = :object, in_day = :in_day, 
                                                    winner = :winner, days_deliver = :days_deliver,
                                                    example = :example, bual = :bual, catalog = :catalog, 
                                                    cbpf = :cbpf, accreditation = :accreditation, 
                                                    register_anvisa = :register_anvisa, register_dou = :register_dou,
                                                    id_agent = :id_agent',
                                                [
                                                    ':id'               => $id,
                                                    ':id_client'        => $idClient,
                                                    ':date'             => $date,
                                                    ':pr'               => $pr,
                                                    ':process'          => $process,
                                                    ':object'           => $object,
                                                    ':in_day'           => $inDay,
                                                    ':winner'           => $winner,
                                                    ':days_deliver'     => $daysDeliver,
                                                    ':example'          => $example,
                                                    ':bual'             => $bula,
                                                    ':catalog'          => $catalog,
                                                    ':cbpf'             => $cbpf,
                                                    ':accreditation'    => $accreditation,
                                                    ':register_anvisa'  => $registerAnvisa,
                                                    ':register_dou'     => $registerDou,
                                                    ':id_agent'         => $idAgent
                                                ],

                                                "id = :id"
                                     );

            } catch (\Exception $ex) 
            {
                throw new Exception("Erro ao atualizar " . $ex->getMessage(), 500);
            }
        }
        public function deleteCostAta(CostAta $costAta)
        {
            try
            {
                $id = $costAta->getId();

                if($this->delete('cost_ata', "id = '$id'"))
                {
                    return TRUE;
                }
                else 
                {
                    return FALSE;    
                }
            }
            catch (\Exception $ex)
            {
                throw new Exception("Erro na Excluir " . $ex->getMessage(), 500);
            }
        }
    }


?>