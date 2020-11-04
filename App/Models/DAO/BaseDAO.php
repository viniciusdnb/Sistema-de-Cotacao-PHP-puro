<?php

    namespace App\Models\DAO;

    use App\Libs\Connection;
    use PDOException;

    abstract class BaseDAO
    {
        private $connection;
        private $lastId;

        public function __construct()
        {
            $this->connection = Connection::getConnection();
        }

        public function select($sql)
        {
            //funcao basica de seleção

            if(!empty($sql))
            {
                return $this->connection->query($sql);
            }
            
        }

        public function insert($table, $cols, $values)
        {
            if(!empty($table) && !empty($cols) && !empty($values))
            {
                $parameters = $cols;
                $cols = str_replace(":", "", $cols);

                try 
                {
                    $this->connection->beginTransaction();
                    $stmt = $this->connection->prepare("INSERT INTO $table ($cols) VALUES ($parameters)");
                    $stmt->execute($values);
                    $this->lastId = $this->connection->lastInsertId();
                    $this->connection->commit();
                   
                    return $stmt->rowCount();
                    
                } 
                catch (PDOException $ex) 
                {
                   $this->connection->rollBack();
                   echo "Erro ao inserir " . $ex->getMessage(). " " . $ex->getCode();               
                }
            }
            else 
            {
                return FALSE;    
            }
        }

        public function setLastId($lastId)
        {
            return $this->lastId = $lastId;
        }

        public function getLastId()
        {
            return $this->lastId;
        }

        public function update($table, $cols, $values, $where = NULL)
        {
            if(!empty($table) && !empty($cols) && !empty($values))
            {
                if($where)
                {
                    $where = "WHERE $where";
                }

                try 
                {
                    $this->connection->beginTransaction();
                    $stmt = $this->connection->prepare("UPDATE $table SET $cols $where");
                    $stmt->execute($values);
                    
                    $this->connection->commit();    

                    return $stmt->rowCount();
                } 
                catch (PDOException $ex) 
                {
                    $this->connection->rollBack();
                    echo "Erro ao atualizar " . $ex->getMessage() . " " . $ex->getCode();
                }
            }
            else
            {
                return NULL;
            }
        }

        public function delete($table, $where)
        {
            if(!empty($table) && !empty($where))
            {
                $where = "WHERE $where";

                try 
                {
                    $this->connection->beginTransaction();
                    $stmt = $this->connection->prepare("DELETE FROM $table $where");
                    $stmt->execute();
                    $this->connection->commit();
                    
                    return $stmt->rowCount();

                } 
                catch (PDOException $ex) 
                {
                    $this->connection->rollBack();
                    echo "Não foi possivel deletar " . $ex->getMessage() . " " . $ex->getCode();
                }
            }else {
                return FALSE;
            }
        }
    }

?>