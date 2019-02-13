<?php

namespace Core;


class ConfigView
{
    private $Pagina;
    private $Dados;

    public function __construct($Pagina, array $Dados = null)
    {
        $this->Pagina = (string) $Pagina;
        $this->Dados = $Dados;
    }

    public function render()
    {
        if (file_exists('app/'.$this->Pagina.'.php')) {
            include 'app/'.$this->Pagina.'.php';
        } else {
            echo "Erro ao carregar a view: {$this->Pagina}";
        }
    }
}
