<?php

namespace Source\Database;

use Exception;

class DataLayer
{
    use DatabaseCrud;

    /**
     * @var PDO
     */
    protected $conn;

    /**
     * @var string
     */
    protected $entity;

    /**
     * @var array
     */
    protected $required;

    /**
     * @var string
     */
    protected $primaryKey;

    /**
     * @var bool
     */
    protected $timestamp;

    /**
     * @var object
     */
    protected $data;

    /**
     * @var PDOException
     */
    protected $error;

    /**
     * __construct
     *
     * @param  string $entity
     * @param  array $required
     * @param  string $primaryKey
     * @param  bool $timestamp
     * @return void
     */
    public function __construct(string $entity = "", array $required = [], string $primaryKey = "id", bool $timestamp = true)
    {
        $this->conn       = DatabaseFactory::getInstance();
        $this->entity     = $entity;
        $this->required   = $required;
        $this->primaryKey = $primaryKey;
        $this->timestamp  = $timestamp;
    }

    /**
     * __set
     *
     * @param  string $name
     * @param  mixed $value
     * @return void
     */
    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }
        $this->data->$name = $value;
    }

    /**
     * __isset
     *
     * @param  string $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * __get
     *
     * @param  string $name
     * @return mixed
     */
    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    /**
     * Dados da tabela.
     *
     * @return object|null
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Retorna todos os registros da tabela.
     *
     * @return object|null
     */
    public function findAll()
    {
        $res = $this->read("SELECT * FROM {$this->getEntity}");
        if (!$res) {
            return null;
        }
        return $res;
    }

    /**
     * Retorna um registro da tabela, comparando pela chave primaria.
     *
     * @param  mixed $primaryKey
     * @return object|null
     */
    public function findByPrimaryKey($primaryKey)
    {
        $res = $this->read("SELECT * FROM {$this->getEntity} WHERE {$this->primaryKey}=? LIMIT 1", [$primaryKey], false);
        if (!$res) {
            return null;
        }
        return $res;
    }

    /**
     * Insere ou atualiza um registro da tabela.
     *
     * @return bool
     */
    public function save()
    {
        $primary   = $this->primaryKey;
        $id        = null;
        $dateNow   = (new \DateTime())->format("Y-m-d H:i:s");

        try {
            if (!$this->required()) {
                throw new Exception("Por favor, preencha os campos necessários.");
            }

            if (empty($this->data->$primary)) {

                // Insere uma nova linha na tabela.
                if ($this->timestamp) {
                    $this->data->created_at = $dateNow;
                    $this->data->updated_at = $dateNow;
                }
                $id = $this->create($this->safe());
            } else {

                // Atualiza uma linha da tabela.
                if ($this->timestamp) {
                    $this->data->updated_at = $dateNow;
                }
                $id = $this->data->$primary;
                $this->update($this->safe(), ["{$this->primaryKey}=" => $id]);
            }

            if (!$id) {
                return false;
            }

            $this->data = $this->findByPrimaryKey($id);
            return true;
        } catch (Exception $ex) {
            $this->error = $ex;
            return false;
        }
    }

    /**
     * Exclui um registro da tabela, comparando pelo id.
     *
     * @return bool
     */
    public function destroy()
    {
        $primary = $this->primaryKey;
        $id      = $this->data->$primary;

        if (empty($id)) {
            return false;
        }
        return $this->delete(["{$this->primaryKey}=" => $id]);
    }

    /**
     * Prepara os dados para serem gravados.
     *
     * @return array
     */
    private function safe()
    {
        $safe = (array)$this->data;
        unset($safe[$this->primaryKey]);
        return $safe;
    }

    /**
     * Valida os campos obrigatórios.
     *
     * @return bool
     */
    private function required()
    {
        $data = (array)$this->data;
        foreach ($this->required as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }
    
    /**
     * Retorna uma mensagem de erro.
     *
     * @return mixed
     */
    public function error()
    {
        return $this->error;
    }
}
