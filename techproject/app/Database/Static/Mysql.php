<?php

namespace App\Database\Static;

use App\Pattern\Singleton;
use PDO;

class Mysql extends Singleton implements DriverInterface
{
   protected PDO $pdo;

   public function init(string $host, string $user, string $pass, string $dbname){
       $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
   }

   public function all($table): array{
       return $this->pdo->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
   }

    public function find(string $table, mixed $id): mixed
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = $id");
        $stmt-> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(string $table, mixed $id): bool{
        return $this->pdo->prepare("DELETE FROM $table WHERE id=$id")->execute();
    }
    public function deleteByField(string $table, string $fieldname, mixed $fieldValue): bool{
        return $this->pdo->prepare("DELETE FROM $table WHERE $fieldname=$fieldValue")->execute();
    }

    public function findByField(string $table, string $fieldName, mixed $fieldValue): bool|array
    {
        $sql = "SELECT * FROM $table WHERE $fieldName = '$fieldValue'";
        $stmt = $this->pdo->prepare($sql);
        $stmt-> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findByFieldAndColumns(string $table, string $fieldName, mixed $fieldValue, array $columns): bool|array
    {
        $sql = "SELECT ";
        foreach ($columns as $column){
            $sql .= "$column,";
        }
        $sql  = rtrim($sql, ",");
        $sql .= " FROM $table WHERE $fieldName = '$fieldValue'";
        $stmt = $this->pdo->prepare($sql);
        $stmt-> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(string $table, array $values): bool
    {
        $sql = "INSERT INTO $table (";

        foreach($values as $value){
            foreach ($value as $key => $val){
                $sql .= $key. ", ";
            }
        }

        $sql = rtrim($sql, " , ");
        $sql .= ") ";
        $sql .= "VALUES (";

        foreach($values as $value) {
            foreach ($value as $val){
                $sql .= "'". $val . "'". ",";
            }
        }

        $sql = rtrim($sql," , ");
        $sql .= ")";

        $stmt = $this->pdo->prepare($sql);
        return $stmt-> execute();
    }
    public function update(string $table, mixed $id, array $values): bool
    {


        $sql = "UPDATE $table SET ";

        foreach($values as $value){
            foreach ($value as $key => $val){
                if(is_string($val)){
                    $sql .= $key . " = " . "'" . $val . "'" . ", ";
                }else{
                    $sql .= $key . " = " . $val . ", ";
                }
            }
        }

        $sql = rtrim($sql, " , ");
        $sql .= " WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();

    }
    public function updateByField(string $table, string $fieldName, mixed $fieldId, array $values): bool
    {
        $sql = "UPDATE $table SET ";

        foreach($values as $value){
            foreach ($value as $key => $val){
                if(is_string($val)){
                    $sql .= $key . " = " . "'" . $val . "'" . ", ";
                }elseif (is_bool($val)){
                    if($val == 0){
                        $sql .= $key . " = " . 0 . ", ";
                    }else{
                        $sql .= $key . " = " . $val . ", ";
                    }
                } else{
                    $sql .= $key . " = " . $val . ", ";
                }
            }
        }

        $sql = rtrim($sql, " , ");
        $sql .= " WHERE $fieldName = $fieldId";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();

    }
    public function updateByFields(string $table, array $fieldNames, array $fieldValues, array $values): bool
    {
        $sql = "UPDATE $table SET ";

        foreach($values as $value){
            foreach ($value as $key => $val){
                if(is_string($val)){
                    $sql .= $key . " = " . "'" . $val . "'" . ", ";
                }elseif (is_bool($val)){
                    if($val == 0){
                        $sql .= $key . " = " . 0 . ", ";
                    }else{
                        $sql .= $key . " = " . $val . ", ";
                    }
                } else{
                    $sql .= $key . " = " . $val . ", ";
                }
            }
        }

        $sql = rtrim($sql, " , ");
        $sql .= " WHERE ";

        $arr_count = count($fieldNames);
        $i = 0;

        foreach ($fieldNames as $fieldName){
            $sql .= "$fieldName = $fieldValues[$i] AND ";
            $i++;
        }
        $sql = rtrim($sql,"AND ");
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();

    }

    public function lastInsertedId(): int|string{
        return $this->pdo->lastInsertId();
    }
    public function startTransaction(){
       $this->pdo->beginTransaction();
    }
    public function commitTransaction(){
       $this->pdo->commit();
    }
    public function rollbackTransaction(){
       $this->pdo->rollBack();
    }

}