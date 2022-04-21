<?php

require_once 'Framework/modele.php';

class avion_type extends modele
{
    function searchType($term)
    {
        $sql = 'SELECT nomAvion FROM types_avion WHERE nomAvion LIKE :term';
        $stmt = $this->executerRequete($sql, ['term' => '%' . $term . '%']);

        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['nomAvion'];
        }

        return json_encode($return_arr);
    }
}
