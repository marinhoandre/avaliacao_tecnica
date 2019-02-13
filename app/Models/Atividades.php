<?php

namespace App\Models;


use Config\Conn;
use PDO;


class Atividades
{

    public function getAtividades($id_atividades = null, array $filter = null)
    {
        $where = " where 1=1";
        if ($id_atividades != "") {
            $where .= " and atividade.id_atividades = ".$id_atividades;
        }

        if ($filter != '') {
            if ($filter['id_status'] != '') {
                $where .= " and atividade.id_status = ".$filter['id_status'];
            }

            if ($filter['flg_situacao'] != '') {
                $where .= " and atividade.flg_situacao = ".$filter['flg_situacao'];
            }
        }

        $order = " order by atividade.id_atividades";

        $conection = new Conn();
        $sql = "Select 
                  atividade.id_atividades, 
                  status.id_status,
                  status.txt_status,
                  atividade.txt_nome,
                  atividade.txt_descricao,
                  atividade.dat_inicial,
                  atividade.dat_final,
                  atividade.flg_situacao 
                from 
                  tbl_atividades as atividade
                inner join 
                  tbl_status as status on status.id_status = atividade.id_status";
        $sql = $sql.$where.$order;

        $listAtividades = $conection->getConn()->prepare($sql);
        $listAtividades->execute();

        $result = $listAtividades->fetchAll();

        return $result;
    }

    public function setAtividades(array $params, array $params_obrigatorios)
    {
        $return = array('status_code'=>0,'message'=>'Não foi possível salvar esta atividade');
        $return_required = array();

        if (count($params) > 0  ) {
            foreach ($params as $key => $value) {

                if (array_key_exists($key, $params_obrigatorios) && $value == '') {
                    $return_required[] = $params_obrigatorios[$key];
                } else {
                    if ($value != '') {
                        $column[] = $key;
                        if (is_numeric($value)) {
                            $values[] = $value;
                        } else {
                            if($key == "dat_inicial" || $key == "dat_final") {
                                $value = date('Y-m-d', strtotime($value));
                            }
                            $values[] = "'".$value."'";
                        }
                    }
                }
            }

            if (count($return_required) > 0) {
                $return = array('status_code'=>2,'message'=>'Preenchimento  obrigatório dos campos: '. implode(', ',$return_required));
            } else {
                $column = implode(',', $column);
                $values = implode(',', $values);

                $conection = new Conn();

                try {
                    $sql = "Insert into tbl_atividades (" . $column . ") values (" . $values . ")";
                    $saveAtividades = $conection->getConn()->prepare($sql);
                    $success = $saveAtividades->execute();

                    if ($success) {
                        $return = array('status_code'=>1,'url'=>'/');
                    }
                } catch ( Exception $e ) {

                }
            }
        }

        return $return;
        exit;
    }

    public function updateAtividades(array $params, array $params_obrigatorios, $id)
    {
        $return = array('status_code'=>0,'message'=>'Não foi possível salvar esta atividade');
        $return_required = array();

        if (count($params) > 0  ) {
            foreach ($params as $key => $value) {
                if (array_key_exists($key, $params_obrigatorios) && $value == '') {
                    $return_required[] = $params_obrigatorios[$key];
                } else {
                    if ($value != '') {
                        if (is_numeric($value)) {
                            $column[] = $key ."=".$value;
                        } else {
                            if($key == "dat_inicial" || $key == "dat_final") {
                                $value = date('Y-m-d', strtotime($value));
                            }
                            $column[] = $key ."='".$value."'";
                        }
                    }
                }
            }

            if (count($return_required) > 0) {
                $return = array('status_code'=>2,'message'=>'Preenchimento  obrigatório dos campos: '. implode(', ',$return_required));
            } else {
                $column = implode(',', $column);

                $conection = new Conn();

                try {
                    $sql = "Update tbl_atividades set ".$column." where id_atividades = ".$id;
                    $saveAtividades = $conection->getConn()->prepare($sql);
                    $success = $saveAtividades->execute();

                    if ($success) {
                        $return = array('status_code'=>1,'url'=>'/');
                    }

                } catch ( Exception $e ) {

                }
            }
        }

        return $return;
        exit;
    }
}
