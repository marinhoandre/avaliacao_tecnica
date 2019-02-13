CREATE SCHEMA `duosystem_teste` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE duosystem_teste;

CREATE TABLE `tbl_status` (
  `id_status` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id do Status',
  `txt_status` VARCHAR(45) NULL COMMENT 'Descrição do Status',
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `tbl_atividades` (
	`id_atividades` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id da Atividade',
	`id_status` INTEGER UNSIGNED NOT NULL COMMENT 'Id do Status',	
    `txt_nome` VARCHAR(255) NULL COMMENT 'Nome da Atividade',
    `txt_descricao` VARCHAR(600) NULL COMMENT 'Descrição da Atividade',
	`dat_inicial` DATE NULL COMMENT 'Data Inicial',
	`dat_final` DATE NULL COMMENT 'Data Final',
    `flg_situacao` SMALLINT(2) NOT NULL DEFAULT 1 COMMENT 'Flag de Situação (1=Ativo, 0=Inativo)',
    `dat_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP() COMMENT 'Data de Criação',
    PRIMARY KEY (`id_atividades`),
	CONSTRAINT FK_tbl_atividades_1 FOREIGN KEY FK_tbl_atividades_1 (id_status)
		REFERENCES tbl_status (id_status)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tbl_status` (`txt_status`) VALUES ('Pendente'),('Em Desenvolvimento'), ('Em Teste'), ('Concluído');

