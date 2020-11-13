<?php

    namespace App\Models\DAO;

    use App\Models\Entity\CostAtaDetail;

    class CotacaoDAO extends BaseDAO
    {
        public function insertCotacao(CostAtaDetail $costAtaDetail)
        {
            $tot = count($costAtaDetail->getId());

        }
    }

?>