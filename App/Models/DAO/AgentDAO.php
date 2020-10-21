<?php

    namespace App\Models\DAO;

    use App\Models\Entity\Agent;
    use Exception;

    class AgentDAO extends BaseDAO
    {
        public function findId($id)
        {
            $result = $this->select("SELECT id, name_agent, email_agent, phone_agent FROM agent WHERE id = '$id'");

            $dataSetAgent = $result->fetch();

            if($dataSetAgent)
            {
                $agent = new Agent();
                $agent->setId($dataSetAgent['id']);
                $agent->setNameAgent($dataSetAgent['name_agent']);
                $agent->setEmailAgent($dataSetAgent['email_agent']);
                $agent->setPhoneAgent($dataSetAgent['phone_agent']);

                return $agent;
            }
            else 
            {
                return FALSE;    
            }
        }
        
        public function findAll()
        {
            $result = $this->select("SELECT id, name_agent, email_agent, phone_agent FROM agent");

            $dataSetAgent = $result->fetchAll();
            

            if($dataSetAgent)
            {
                $findAll = [];

                foreach($dataSetAgent as $value)
                {
                    $agent = new Agent();
                    $agent->setId($value['id']);
                    $agent->setNameAgent($value['name_agent']);
                    $agent->setEmailAgent($value['email_agent']);
                    $agent->setPhoneAgent($value['phone_agent']);

                    $findAll[] = $agent;
                }

                return $findAll;
            }
            else
            {
                return FALSE;
            }
        }

        public function insertAgent(Agent $agent)
        {
            try {
                
                $name   = $agent->getNameAgent();
                $email  = $agent->getEmailAgent();
                $phone  = $agent->getPhoneAgent();
                
                return $this->insert('agent', ':name_agent, :email_agent, :phone_agent',
                [
                    ':name_agent'   => $name,
                    ':email_agent'  => $email,
                    ':phone_agent'  => $phone,
                ]);

            } 
            catch (Exception $ex) 
            {
                throw new Exception("Não foi possivel cadastrar " . $ex->getMessage(), 500);
                
            }
        }

        public function updateAgent(Agent $agent)
        {
            try {
                
                $id     = $agent->getId();
                $name   = $agent->getNameAgent();
                $email  = $agent->getEmailAgent();
                $phone  = $agent->getPhoneAgent();
                var_dump($phone);

                
                return $this->update('agent', 'name_agent = :name_agent, email_agent = :email_agent, phone_agent = :phone_agent',
                [
                    ':id'           => $id,
                    ':name_agent'   => $name,
                    ':email_agent'  => $email,
                    ':phone_agent'  => $phone,
                ],
                "id = :id"

                );

               
                
            } 
            catch (Exception $ex) 
            {
                throw new Exception("Não foi possivel Atualizar " . $ex->getMessage(), 500);
            }
        }

        public function deleteAgent(Agent $agent)
        {
            try {
                
                $id = $agent->getId();
                
                return $this->delete('agent', "id = '$id'");

            } 
            catch (Exception $ex) 
            {
                throw new Exception("Não foi possivel Atualizar " . $ex->getMessage(), 500);
            }
        }
    }
?>