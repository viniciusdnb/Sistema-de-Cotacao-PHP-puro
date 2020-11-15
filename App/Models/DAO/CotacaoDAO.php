<?php

    namespace App\Models\DAO;

    use App\Models\Entity\CostAtaDetail;
    use PDOException;
    use Exception;

class CotacaoDAO extends BaseDAO
    {
        public function insertCotacao(CostAtaDetail $costAtaDetail, $tot)
        {
            try 
            {
                $id = $costAtaDetail->getId();
                $vlr = $costAtaDetail->getVlrCotado();

                for ($i = 0; $i < $tot; $i++) {
                    $result[] = $this->update(
                        'cost_ata_detail',
                        'vlr_cotado = :vlr_cotado',
                        [
                            ':id'           => $id[$i],
                            ':vlr_cotado'   => $vlr[$i]
                        ],
                        "id = :id"
                    );
                }

                return $result[0];
            } 
            catch (PDOException $ex) 
            {
                throw new Exception("Erro ao inserir a cotacao " . $ex->getMessage(), 500);
            }

           

        }
    }

?>