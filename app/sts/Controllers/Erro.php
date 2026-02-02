<?php

namespace Sts\Controllers;

/**
 * Controller Erro: Responsável por gerenciar as visualizações de falha.
 * É chamado pelo roteador quando o usuário tenta acessar um endereço inexistente.
 * * @author sr07webdba.santana <sr07webdba.santana@gmail.com>
 * @version 2026.1.0
 */
class Erro
{
    /**
     * Renderiza a mensagem padrão de erro do sistema.
     * @return void
     */
    public function index(): void
    {
        echo "Página de erro<br>";
    }
}