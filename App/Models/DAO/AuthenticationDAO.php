<?php

    namespace App\Models\DAO;

    use App\Models\Entity\Authentication;

    class AuthenticationDAO extends BaseDAO
    {
        public function verify($name)
        {
            $sql = "SELECT name, pass, active, id_perm, id_factory FROM user WHERE name = '$name'";
            $result = $this->select($sql);

            return $result->fetchObject(Authentication::class);
        }
    }

?>