<?php

    namespace App\Models\DAO;

    use App\Models\Entity\Client;
    use App\Models\DAO\BaseDAO;
    use Exception;

    class ClientDAO extends BaseDAO
    {
        public function findId($id)
        {
            $result = $this->select("SELECT client.id,
                                            client.name_client,
                                            client.addres_client,
                                            client.email_client,
                                            client.cnpj_client,
                                            client.phone_client,
                                            clinet.contact_client,
                                            client.id_agent,
                                            agent.name_agent,
                                    FROM client
                                    INNER JOIN agent
                                    ON client.id_agent = agent.id
                                    WHERE client.id = '$id'");
            
            $dataSetClient = $result->fetch();

            if($dataSetClient)
            {
                $client = new Client();
                $client->setId($dataSetClient['id']);
                $client->setNameClient($dataSetClient['name_client']);
                $client->setAddresClient($dataSetClient['addres_client']);
                $client->setEmailClient($dataSetClient['email_client']);
                $client->setPhoneClient($dataSetClient['phone_client']);
                $client->setContactClient($dataSetClient['contact_client']);
                $client->setIdAgent($dataSetClient['id_agent']);
                $client->setNAmeAgent($dataSetClient['name_agent']);

                return $client;
            }
            else 
            {
                return FALSE;
            }
        }

        public function findAll()
        {
            $result = $this->select("SELECT client.id,
                                                client.name_client,
                                                client.addres_client,
                                                client.email_client,
                                                client.cnpj_client,
                                                client.phone_client,
                                                clinet.contact_client,
                                                client.id_agent,
                                                agent.name_agent,
                                        FROM client
                                        INNER JOIN agent
                                        ON client.id_agent = agent.id");

            $dataSetClient = $result->fetchAll();
           
            if ($dataSetClient) {
                
                $findAll = [];

                foreach ($dataSetClient as $value) {
                   
                    $client = new Client();
                    $client->setId($value['id']);
                    $client->setNameClient($value['name_client']);
                    $client->setAddresClient($value['addres_client']);
                    $client->setEmailClient($value['email_client']);
                    $client->setPhoneClient($value['phone_client']);
                    $client->setContactClient($value['contact_client']);
                    $client->setIdAgent($value['id_agent']);
                    $client->setNAmeAgent($value['name_agent']);

                    $findAll[] = $client;
                }                

                return $findAll;
            } 
            else
            {
                return FALSE;
            }
        }

        public function insertClient(Client $client)
        {
            try {

                $nameClient     = $client->getNameClient();
                $addres         = $client->getAddresClient();
                $email          = $client->getEmailClient();
                $cnpj           = $client->getCnpjClient();
                $phone          = $client->getPhoneClient();
                $contact        = $client->getContactClient();
                $idAgent        = $client->getIdAgent();

                return $this->insert('client', ':name_client, :addres_client,
                                                 :email_client, :cnpj_client, 
                                                 :phone_client, :contact_client, 
                                                 :id_agent',
                                                 [
                                                    ':name_client'      => $nameClient,
                                                    ':addres_client'    => $addres,
                                                    ':email_client'     => $email,
                                                    ':cnpj_client'      => $cnpj,
                                                    ':phone_client'     => $phone,
                                                    ':contact_client'   => $contact,
                                                    ':id_agent'         => $idAgent
                                                 ]);

                
                
            } 
            catch (Exception $ex) 
            {
                throw new Exception("Error ao cadastrar", 500);
                
            }
        }

        public function updateClient(Client $client)
        {

            try {

                $id             = $client->getId();
                $nameClient     = $client->getNameClient();
                $addres         = $client->getAddresClient();
                $email          = $client->getEmailClient();
                $cnpj           = $client->getCnpjClient();
                $phone          = $client->getPhoneClient();
                $contact        = $client->getContactClient();
                $idAgent        = $client->getIdAgent();

                return $this->insert('client','name_client = :name_client, addres_client = :addres_client,
                                                email_client = :email_client, cnpj_client = :cnpj_client, 
                                                phone_client = :phone_client, contact_client = :contact_client, 
                                                id_agent = :id_agent',
                    [   
                        ':id'               => $id,
                        ':name_client'      => $nameClient,
                        ':addres_client'    => $addres,
                        ':email_client'     => $email,
                        ':cnpj_client'      => $cnpj,
                        ':phone_client'     => $phone,
                        ':contact_client'   => $contact,
                        ':id_agent'         => $idAgent
                    ],

                    'id = :id'

                );
            } catch (Exception $ex) {
                throw new Exception("Error ao atualizar", 500);
            }
        }
        
        public function deleteClient(Client $client)
        {
            try {
                $id = $client->getId();
                
                if($this->delete('client', "id = '$id'"))
                {
                    return TRUE;
                }
                else 
                {
                    return FALSE;    
                }
            } catch (Exception $ex) 
            {
                throw new Exception("Error ao excluir", 500);
            }
        }
    }

?>