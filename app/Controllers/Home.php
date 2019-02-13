<?php

namespace App\Controllers;


use App\Models\Atividades;
use App\Models\Status;
use Core\ConfigView;

class Home
{

    public function index()
    {
        $filtro = filter_input_array(INPUT_POST, FILTER_DEFAULT);


        $listStatus = new Status();
        $list['status'] = $listStatus->getStatus();

        $listAtividades = new Atividades();
        $list['atividades'] = $listAtividades->getAtividades();
        if (isset($filtro)) {
            $list['atividades'] = $listAtividades->getAtividades('',$filtro);
            $list['filtros'] = $filtro;
        }

        $carregarView = new ConfigView("Views/listarAtividades",$list);
        $carregarView->render();

    }
}
