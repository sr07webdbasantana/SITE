<?php

namespace Core;

/**
 * Config: Classe Abstrata de Configuração.
 * Responsável por centralizar as definições globais do sistema, como URLs,
 * controllers padrão e credenciais administrativas.
 * * @author sr07webdba.santana <sr07webdba.santana@gmail.com>
 * @version 2026.1.0
 */
abstract class Config
{
    /**
     * Define as constantes globais do projeto.
     * Este método configura os caminhos base (URL), os controllers de 
     * entrada e erro, além de informações de contato administrativo.
     * * @return void
     */
    protected function config(): void
    {
        /** @var string URL do projeto para o site público */
        define('URL', 'https://localhost/site/');

        /** @var string URL da área administrativa */
        define('URLADM', 'https://localhost/site/adm/');

        /** @var string Controller padrão carregado ao acessar a raiz do site */
        define('CONTROLLER', 'Home');

        /** @var string Controller de erro carregado em caso de rotas inválidas */
        define('CONTROLLERERRO', 'Erro');

        /** @var string E-mail do administrador para notificações do sistema */
        define('EMAILADM', 'sr07webdba.santana@gmail.com');
    }
}