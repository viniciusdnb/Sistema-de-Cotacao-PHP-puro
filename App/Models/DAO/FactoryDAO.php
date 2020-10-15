<?php

namespace App\Models\DAO;

use App\Models\Entity\Factory;
use Exception;

class FactoryDAO extends BaseDAO
    {
        public function findId($id)
        {
            $result = $this->select("SELECT id, name_factory, addres_factory, email_factory,
            cnpj_factory, phone_factory, contact_factory FROM factory WHERE id = '$id'");

            if($result)
            {
                $dataSetFac = $result->fetch();

                foreach($dataSetFac as $value)
                {
                    $factory = new Factory();
                    $factory->setId($value['id']);
                    $factory->setNameFactory($value['name_factory']);
                    $factory->setAddresFactory($value['addres_factory']);
                    $factory->setEmailFactory($value['email_factory']);
                    $factory->setCnpjFactory($value['cnpj_factory']);
                    $factory->setPhoneFactory($value['phone_factory']);
                    $factory->setContactFactory($value['contact_factory']);
                    
                }

                return $factory;
            }
            else
            {
                return FALSE;
            }
        }

        public function findAll()
        {
            $result = $this->select("SELECT * FROM factory");

            if($result)
            {
                $dataSetFac = $result->fetchAll();
                $findAll = [];

                foreach ($dataSetFac as $value) {
                    $factory = new Factory();
                    $factory->setId($value['id']);
                    $factory->setNameFactory($value['name_factory']);
                    $factory->setAddresFactory($value['addres_factory']);
                    $factory->setEmailFactory($value['email_factory']);
                    $factory->setCnpjFactory($value['cnpj_factory']);
                    $factory->setPhoneFactory($value['phone_factory']);
                    $factory->setContactFactory($value['contact_factory']);

                    $findAll[] = $factory;
                }

                return $findAll;
            }
            else 
            {
                return FALSE;    
            }
        }

        public function insertFactory(Factory $factory)
        {

            try {
                $name       = $factory->getNameFactory();
                $addres     = $factory->getAddresFactory();
                $email      = $factory->getEmailFactory();
                $cnpj       = $factory->getCnpjFactory();
                $phone      = $factory->getPhoneFactory();
                $contact    = $factory->getContactFactory();

                return $this->insert('factory', 
                            ':name_factory, :addres_factory, 
                            :email_factory, :cnpj_factory,
                            :phone_factory, :contact_factory',
                            [
                                ':name_factory'     => $name,
                                ':addres_factory'   => $addres,
                                ':email_factory'    => $email,
                                ':cnpj_factory'     => $cnpj,
                                ':phone_factory'    => $phone,
                                ':contact_factory'  => $contact
                            ]
                );
                
            } 
            catch (\Exception $ex) 
            {
                throw new Exception("Erro na gravação " . $ex->getMessage(), 500);
            }
            

          
        }

        public function updateFactory(Factory $factory)
        {

            try {
                $id         = $factory->getId();
                $name       = $factory->getNameFactory();
                $addres     = $factory->getAddresFactory();
                $email      = $factory->getEmailFactory();
                $cnpj       = $factory->getCnpjFactory();
                $phone      = $factory->getPhoneFactory();
                $contact    = $factory->getContactFactory();

                return $this->update('factory',
                            ':name_factory, :addres_factory, 
                            :email_factory, :cnpj_factory,
                            :phone_factory, :contact_factory',
                            [
                                ':id'               => $id,
                                ':name_factory'     => $name,
                                ':addres_factory'   => $addres,
                                ':email_factory'    => $email,
                                ':cnpj_factory'     => $cnpj,
                                ':phone_factory'    => $phone,
                                ':contact_factory'  => $contact
                            ],
                            'id = :id'
                );

            } 
            catch (\Exception $ex) 
            {
                throw new Exception("Erro na atualização " . $ex->getMessage(), 500);
            }
        }
        
        public function deleteFactory(Factory $factory)
        {
            try {
                $id = $factory->getId();

                if($this->delete("factory", "WHERE id = '$id'"))
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
                throw new Exception("Erro ao deletar " . $ex->getMessage(), 500);
            }
        }

        
    }

?>