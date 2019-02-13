<?php

namespace App\Models;


use Config\Conn;
use PDO;


class Status
{

    public function getStatus()
    {

        $conection = new Conn();
        $sql = "Select id_status, txt_status from tbl_status";

        $listStatus = $conection->getConn()->prepare($sql);
        $listStatus->execute();

        $result = $listStatus->fetchAll();

        return $result;
    }
}
