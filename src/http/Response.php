<?php

namespace Source\Http;

class Response
{    
    /**
     * Código do status http.
     *
     * @var int
     */
    private $httpCode = 200;
    
    /**
     * Cabeçalho do response.
     *
     * @var array
     */
    private $headers = [];
    
    /**
     * Tipo de conteúdo retornado.
     *
     * @var string
     */
    private $contentType = "text/html";
    
    /**
     * Conteúdo do response.
     *
     * @var mixed
     */
    private $content;
    
    /**
     * __construct
     *
     * @param  mixed $httpCode
     * @param  mixed $content
     * @param  mixed $contentType
     * @return void
     */
    public function __construct( int $httpCode, $content, string $contentType = "text/html" )
    {
        $this->httpCode = $httpCode;
        $this->content  = $content;
        $this->setContentType($contentType);
    }
    
    /**
     * Altera o contentType do response.
     *
     * @param  string $contentType
     * @return string
     */
    public function setContentType( string $contentType )
    {
        $this->contentType  = $contentType;
        $this->addHeader("Content-Type", $contentType);
    }
    
    /**
     * Adiciona um registro no cabeçalho do response.
     *
     * @param  mixed $key
     * @param  mixed $value
     * @return void
     */
    public function addHeader( $key, $value )
    {
        $this->headers[$key] = $value;
    }
    
    /**
     * Envia os headers para o navegador.
     *
     * @return void
     */
    private function sendHeaders()
    {
        http_response_code($this->httpCode);
        foreach($this->headers as $k => $v) {
            header("{$k}: {$v}");
        }
    }
    
    /**
     * Envia a resposta para o usuário.
     *
     * @return void
     */
    public function sendResponse()
    {
        // Envia os headers.
        $this->sendHeaders();

        // Imprime o conteúdo.
        switch($this->contentType) {
            case "text/html": 
                echo $this->content;
                exit;
            break;
        }
    }
}
