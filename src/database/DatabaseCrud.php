<?php

namespace Source\Database;

use PDOException;

trait DatabaseCrud
{
    /**
     * Insere uma nova linha na tabela e retorna seu id.
     *
     * @param  array $arrayData
     * @return int|null
     */
    public function create(array $arrayData)
    {
        try {
            foreach ($arrayData as $k => $v) {
                $fields[] = $k;
                $bindValues[] = "?";
            }

            $count = 1;
            $fields = implode(", ", $fields);
            $bindValues = implode(", ", $bindValues);

            $stm = $this->conn->prepare("INSERT INTO {$this->entity} ({$fields}) VALUES ({$bindValues})");
            foreach ($arrayData as $v) {
                $stm->bindValue($count, $v);
                $count++;
            }

            $stm->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $ex) {
            $this->error = $ex;
            return null;
        }
    }

    /**
     * Retorna uma ou mais linhas da tabela.
     *
     * @param  string $sql
     * @param  array $arrayParams
     * @param  bool $fetchAll
     * @return object|null
     */
    public function read($sql, $arrayParams = null, $fetchAll = true)
    {
        try {
            $stm = $this->conn->prepare($sql);

            if (!empty($arrayParams)) {
                $count = 1;
                foreach ($arrayParams as $v) {
                    $stm->bindValue($count, $v);
                    $count++;
                }
            }

            $stm->execute();
            return (!$fetchAll ? $stm->fetchObject(static::class) : $stm->fetchAll(\PDO::FETCH_CLASS, static::class));
        } catch (PDOException $ex) {
            $this->error = $ex;
            return null;
        }
    }

    /**
     * Aualiza uma linha da tabela.
     *
     * @param  array $arrayData
     * @param  array $arrayCondition
     * @return int|null
     */
    public function update($arrayData, $arrayCondition)
    {
        try {
            foreach ($arrayData as $k => $v) {
                $news[] = $k;
            }

            foreach ($arrayCondition as $k => $v) {
                $conds[] = $k;
            }

            $count = 1;
            $news = implode("=?, ", $news) . "=?";
            $conds = implode("? AND ", $conds) . "?";

            $stm = $this->conn->prepare("UPDATE {$this->entity} SET {$news} WHERE {$conds}");

            foreach ($arrayData as $v) {
                $stm->bindValue($count, $v);
                $count++;
            }

            foreach ($arrayCondition as $v) {
                $stm->bindValue($count, $v);
                $count++;
            }

            $stm->execute();
            return ($stm->rowCount() ?? 1);
        } catch (PDOException $ex) {
            $this->error = $ex;
            return null;
        }
    }

    /**
     * Exclui uma ou mais linhas da tabela.
     *
     * @param  array $arrayCondition
     * @return bool
     */
    public function delete($arrayCondition)
    {
        try {
            foreach ($arrayCondition as $k => $v) {
                $conds[] = $k;
            }

            $count = 1;
            $conds = implode("? AND ", $conds) . "?";

            $stm = $this->conn->prepare("DELETE FROM {$this->entity} WHERE {$conds}");
            foreach ($arrayCondition as $v) {
                $stm->bindValue($count, $v);
                $count++;
            }

            $stm->execute();
            return true;
        } catch (PDOException $ex) {
            $this->error = $ex;
            return false;
        }
    }
}
