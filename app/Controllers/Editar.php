<?php

namespace App\Controllers;

use App\Models\Atividades;
use App\Models\Status;
use Core\ConfigView;


class Editar
{

    public function index($id = null)
    {

        $id_atividades = (int) $id;

        $detalhes['titulo'] = "Nova Atividade";

        $listStatus = new Status();
        $detalhes['status'] = $listStatus->getStatus();
        $detalhes['permitir_salvar'] = 0;

        if ($id_atividades != "") {
            $detalhes['titulo'] = "Editar Atividade";
            $listDetalhes = new Atividades();
            $detalhes['atividade'] = $listDetalhes->getAtividades($id_atividades);
            if ($detalhes['atividade'][0]['id_status'] == 4) {
                $detalhes['permitir_salvar'] = 1;
            }
        }

        $carregarView = new ConfigView("Views/editarAtividades",$detalhes);
        $carregarView->render();

    }

    public function salvar()
    {

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $id_atividades = $dados['id_atividades'];
        $salvarDados = new Atividades();

        unset($dados["id_atividades"]);
        unset($dados["url"]);

        if ($id_atividades == 0) {
            $campos_obrigatorios = ['txt_nome'=>'Nome da Atividade',
                'txt_descricao'=>'Descrição da Atividade',
                'dat_inicial'=>'Data Início'];

            $return = $salvarDados->setAtividades($dados, $campos_obrigatorios);
        } else {
            $campos_obrigatorios = ['txt_nome'=>'Nome da Atividade',
                'txt_descricao'=>'Descrição da Atividade',
                'dat_inicial'=>'Data Início'];
            if ($dados['id_status'] == 4) {
                $campos_obrigatorios = ['txt_nome'=>'Nome da Atividade',
                    'txt_descricao'=>'Descrição da Atividade',
                    'dat_inicial'=>'Data Início', 'dat_final'=>'Data Final'];
            }

            $return = $salvarDados->updateAtividades($dados, $campos_obrigatorios, $id_atividades);
        }

        echo json_encode($return);
        exit();
    }
}
