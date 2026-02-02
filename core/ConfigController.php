<?php

namespace Core;

/**
 * ConfigController: O "Cérebro" de Roteamento.
 * Responsável por capturar a URL amigável, higienizar os dados e identificar
 * qual classe (Controller) e qual ação (Método) devem ser executados.
 *
 * @author sr07webdba.santana <sr07webdba.santana@gmail.com>
 * @version 2026.1.0
 */
class ConfigController
{
    /** @var string Armazena a URL bruta obtida do parâmetro 'url' via GET. */
    private string $url;

    /** @var array Armazena a URL fragmentada em partes após a explosão por barras (/). */
    private array $urlArray = [];

    /** @var string Armazena o nome da classe Controller a ser instanciada (Padrão: Home). */
    private string $urlController = "Home";

    /** @var string Armazena o valor do parâmetro adicional enviado na URL. */
    private string $urlParameter = "";
    
    /** @var string Armazena o slug do controller para uso em aulas futuras. */
    private string $urlSlugController;
    
    /** @var array Armazena caracteres de substituição para limpeza da URL. */
    private array $format = [];

    /**
     * Inicializa a captura da URL e gerencia o processamento inicial.
     */
    public function __construct()
    {
        $urlInput = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

        if (!empty($urlInput)) {
            $this->url = $urlInput;
            $this->handleUrl();
        } else {
            echo "Acessa a página inicial<br>";
        }

        echo "Controller: {$this->urlController}<br>";
        echo "Parâmetro: {$this->urlParameter}<br>";
    }

    /**
     * Orquestra a limpeza da URL e a distribuição das partes no array.
     * @return void
     */
    private function handleUrl(): void
    {
        $this->clearUrl();
        $this->urlArray = explode("/", $this->url);

        // Define o Controller (índice 0) e o Parâmetro (índice 1)
        $this->urlController = isset($this->urlArray[0]) 
            ? $this->slugController($this->urlArray[0]) 
            : "Home";

        $this->urlParameter = $this->urlArray[1] ?? "";
    }

    /**
     * Realiza a higienização da URL.
     * REMOVIDO "Rr" do mapa de substituição para evitar corrupção de nomes de controllers (ex: Erro -> EO).
     * @return void
     */
    private function clearUrl(): void
    {
        $this->url = strip_tags(trim(rtrim($this->url, "/")));

        // Mapa de caracteres especiais: removido 'Rr' para permitir nomes como 'Erro'
        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby-------------------------------------------------------------------------------------------------';

        // Realiza a tradução de caracteres especiais
        $this->url = strtr($this->url, $this->format['a'], $this->format['b']);
        
        // Garante que espaços restantes sejam transformados em hifens
        $this->url = str_replace(" ", "-", $this->url);
    }

    /**
     * Converte o slug da URL para PascalCase e armazena no atributo da classe.
     * @param string $slug Nome bruto vindo da URL.
     * @return string Nome do Controller formatado.
     */
    private function slugController(string $slug): string
    {
        // Converte para minúsculo, troca hifens por espaços, capitaliza palavras e remove espaços
        $this->urlSlugController = str_replace(" ", "", ucwords(str_replace("-", " ", strtolower($slug))));

        return $this->urlSlugController;
    } 
    
    /**
     * Instancia a classe do controller e carrega o método index.
     * * Este método realiza a montagem dinâmica do namespace da classe,
     * cria o objeto (instancia) e executa a ação padrão (index).
     * * @return void
     */
    public function loadPage(): void
    {
        // Monta o caminho completo da classe com o Namespace
        // Exemplo: \Sts\Controllers\Home
        $classLoad = "\\Sts\\Controllers\\" . $this->urlController;

        // Instancia a classe dinamicamente
        $classPage = new $classLoad();

        // Chama o método padrão para renderizar a página
        $classPage->index();
    }
}