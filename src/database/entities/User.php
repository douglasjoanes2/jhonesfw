<?php

namespace Source\Database\Entities;

use Exception;
use Source\Database\DataLayer;

class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("user", ["name", "email", "password"]);
    }

    public function findByEmail()
    {
        $res = $this->read("SELECT * FROM {$this->entity()} WHERE email=? LIMIT 1", [$this->email], false);
        if (!$res) {
            return "";
        }
        return $res;
    }

    public function save()
    {
        if (!$this->validateEmail() || !$this->validatePassword() || !parent::save()) {
            return false;
        }
        return true;
    }

    private function validateEmail()
    {
        if (empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->error = new Exception("informe um email válido.");
            return false;
        }

        $userByEmail = null;
        if (!$this->id) {
            $userByEmail = $this->read(
                "SELECT * FROM {$this->entity} WHERE email=? LIMIT 1",
                [$this->email],
                false
            );
        } else {
            $userByEmail = $this->read(
                "SELECT * FROM {$this->entity} WHERE email=? AND id=? LIMIT 1",
                [$this->email, $this->id],
                false
            );
        }

        if ($userByEmail) {
            $this->error = new Exception("O email informado já está em uso.");
            return false;
        }
        return true;
    }

    private function validatePassword()
    {
        if (empty($this->passwd) || strlen($this->passwd) < 6) {
            $this->error = new Exception("A senha deverá conter ao menos 6 caracteres.");
            return false;
        }

        if (password_get_info($this->passwd)["algo"]) {
            return true;
        }

        $this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT);
        return true;
    }
}
