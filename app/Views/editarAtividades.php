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

    <script type="text/javascript" src="<?php echo URL; ?>assets/js/atividades.js"></script>


</head>

<body>
<div class="navbar">
    <a class="logo" href="/"><img src="<?php echo URL; ?>assets/images/logotipo-duosystem.svg"></a>
</div>

<div class="panel-body">
    <div class="col-sm-12">
        <h2><?php echo $this->Dados['titulo']; ?></h2>

        <div class="col-sm-12">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <form class="form-horizontal" id="formulario-salvar">
                        <input type="hidden" id="url" name="url" value="<?php echo URL; ?>">
                        <input type="hidden" id="id_atividades" name="id_atividades" value="<?php if (isset($this->Dados['atividade'][0])) { echo $this->Dados['atividade'][0]['id_atividades']; } ?>">
                        <fieldset class="content-group">
                            <div class="col-sm-12 form-group-sm">
                                <label class="control-label">Nome da Atividade</label>
                                <input <?php if ($this->Dados['permitir_salvar'] == "1") { echo 'disabled'; } ?> type="text" class="form-control" name="txt_nome" id="txt_nome" maxlength="255" value="<?php if (isset($this->Dados['atividade'][0])) { echo $this->Dados['atividade'][0]['txt_nome']; } ?>">
                            </div>

                            <div class="col-sm-3 form-group-sm">
                                <label class="control-label">Status</label>
                                <select <?php if ($this->Dados['permitir_salvar'] == "1") { echo 'disabled'; } ?> class="form-control" name="id_status" id="id_status">
                                    <?php foreach ($this->Dados['status'] as $status) { ?>
                                    <option <?php if (isset($this->Dados['atividade'][0]) && $this->Dados['atividade'][0]['id_status'] == $status['id_status']) { echo 'selected'; }?> value="<?php echo $status['id_status']; ?>"><?php echo $status['txt_status']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-sm-3 form-group-sm">
                                <label class="control-label">Situação</label>
                                <select <?php if ($this->Dados['permitir_salvar'] == "1") { echo 'disabled'; } ?> class="form-control" name="flg_situacao" id="flg_situacao">
                                    <option <?php if (isset($this->Dados['atividade'][0]) && $this->Dados['atividade'][0]['flg_situacao'] == '1') { echo 'selected'; }?> value="1">Ativo</option>
                                    <option <?php if (isset($this->Dados['atividade'][0]) && $this->Dados['atividade'][0]['flg_situacao'] == '0') { echo 'selected'; }?> value="0">Inativo</option>
                                </select>
                            </div>

                            <div class="col-sm-3 form-group-sm">
                                <label class="control-label">Data Inicial</label>
                                <input <?php if ($this->Dados['permitir_salvar'] == "1") { echo 'disabled'; } ?> type="date" class="form-control" name="dat_inicial" id="dat_inicial" value="<?php if (isset($this->Dados['atividade'][0])) { echo $this->Dados['atividade'][0]['dat_inicial']; } ?>">
                            </div>

                            <div class="col-sm-3 form-group-sm">
                                <label class="control-label">Data Final</label>
                                <input <?php if ($this->Dados['permitir_salvar'] == "1") { echo 'disabled'; } ?> type="date" class="form-control" name="dat_final" id="dat_final" value="<?php if (isset($this->Dados['atividade'][0]) && $this->Dados['atividade'][0]['dat_final'] != '') { echo $this->Dados['atividade'][0]['dat_final']; } ?>">
                            </div>

                            <div class="col-sm-12 form-group-sm">
                                <label class="control-label">Descrição da Atividade</label>
                                <textarea <?php if ($this->Dados['permitir_salvar'] == "1") { echo 'disabled'; } ?> style="resize: none; height: 80px;" class="form-control" name="txt_descricao" id="txt_descricao" maxlength="600"><?php if (isset($this->Dados['atividade'][0])) { echo $this->Dados['atividade'][0]['txt_descricao']; } ?></textarea>
                            </div>

                            <div id="bt-form" class=" form-group-sm col-sm-12 text-right">
                                <a href="/" class="btn btn-primary">Cancelar</a>
                                <?php if ($this->Dados['permitir_salvar'] == "0") { ?>
                                <button type="submit" id="bt-submit" class="btn btn-success">Salvar</button>
                                <?php } ?>

                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SWEET ALERT -->
<script src="<?php echo URL; ?>assets/sweetalert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="<?php echo URL; ?>assets/sweetalert/sweetalert.css">
</body>
</html>