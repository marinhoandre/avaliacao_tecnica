<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Duo System - Atividades</title>

    <link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/custom.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo URL; ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>assets/js/bootstrap.min.js"></script>

</head>

<body>
<div class="navbar">
    <a class="logo" href="/"><img src="<?php echo URL; ?>assets/images/logotipo-duosystem.svg"></a>
</div>

<div class="panel-body">
    <div class="col-sm-12">
        <h2>Listagem de Atividades</h2>
        <div class="col-sm-12 div-body">
            <form role="form" idaction="/" method="post">
                <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                        <label>Status</label>
                        <select id="id_status" name="id_status" class="form-control">
                            <option value="">Todos</option>
                            <?php foreach ($this->Dados['status'] as $status) { ?>
                            <option <?php if (isset($this->Dados['filtros']) && $this->Dados['filtros']['id_status'] == $status['id_status']) { echo 'selected'; } ?> value="<?php echo $status['id_status']; ?>"><?php echo $status['txt_status']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-5">
                        <label>Situação</label>
                        <select class="form-control" id="flg_situacao" name="flg_situacao">
                            <option  value="">Todas</option>
                            <option <?php if (isset($this->Dados['filtros']) && $this->Dados['filtros']['flg_situacao'] == "1") { echo 'selected'; } ?> value="1">Ativo</option>
                            <option <?php if (isset($this->Dados['filtros']) && $this->Dados['filtros']['flg_situacao'] == "0") { echo 'selected'; } ?> value="0">Inativo</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-1">
                        <button type="submit" id="btn-filtrar" class="btn btn-purple waves-effect waves-light">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12 table-responsive">
            <table class="table table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th style="width: 80px;" class="text-center">#</th>
                    <th>Nome da Atividade</th>
                    <th>Data de Início</th>
                    <th>Status</th>
                    <th style=" width: 60px; "></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $contar = 0;
                    foreach ($this->Dados['atividades'] as $atividades) {
                        $contar++;
                    ?>
                    <tr>
                        <td class="text-center <?php if ($atividades['id_status'] == 4) { echo "bg-success";} ?>"><?php echo $contar; ?></td>
                        <td <?php if ($atividades['id_status'] == 4) { echo "class='bg-success'";} ?>><?php echo $atividades['txt_nome']; ?></td>
                        <td <?php if ($atividades['id_status'] == 4) { echo "class='bg-success'";} ?>><?php echo date("d/m/Y",strtotime($atividades['dat_inicial'])); ?></td>
                        <td <?php if ($atividades['id_status'] == 4) { echo "class='bg-success'";} ?>><?php echo $atividades['txt_status']; ?></td>
                        <td <?php if ($atividades['id_status'] == 4) { echo "class='bg-success'";} ?>>
                            <a href="<?php echo URL; ?>editar/index/<?php echo $atividades['id_atividades']; ?>" class="btn btn-info" alt="Editar" title="Editar" style="height: 30px; width: 37px; padding-top: 4px!important;"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <div class="col-sm-12 text-right">
                <a href="<?php echo URL; ?>editar/index" class="btn btn-success" alt="Novo Registro" title="Novo Registro" ><i class="fa fa-file"></i> Novo Registro</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>