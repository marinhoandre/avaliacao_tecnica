$(function() {

	$("#bt-submit").click(function () {
		var mensagem_padrao = "Este campo é de preenchimento obrigatório!";
		if ($("#txt_nome").val() == "") {
			$("#txt_nome").focus();
			swal("Preencha o Nome da Atividade", mensagem_padrao, "error");
			return false;
		}

		if ($("#dat_inicial").val() == "") {
			$("#dat_inicial").focus();
			swal("Preencha a Data de Início", mensagem_padrao, "error");
			return false;
		}

		if ($("#txt_descricao").val() == "") {
			$("#txt_descricao").focus();
			swal("Preencha a Descrição da Atividade", mensagem_padrao, "error");
			return false;
		}

		if ($("#id_status").val() == "4" && $("#dat_final").val() == "") {
			$("#dat_final").focus();
			swal("Preencha a Data Final", mensagem_padrao, "error");
			return false;
		}

		data_form = $("#formulario-salvar").serialize();
		url = $("#url").val()+'editar/salvar';

		$.ajax({
			url: url,
			type: 'POST',
			data: data_form,
			dataType: 'json',
			async: true,
			success: function (dataReturn) {
				if (dataReturn.status_code != 1) {
					swal("Problemas", dataReturn.message, "error");
				} else {
					window.location = dataReturn.url;
				}
			}
		});
		return false;

	});

});
