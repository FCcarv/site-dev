<?php
require BASE. '/app/database/connection.php';

$where = [];
$binds = [];
$limit = '';
$order = '';

function create(string $table, array $data)
{
    try {
        $query = "insert into {$table}(";
        $query.= implode(',', array_keys($data)).") VALUES (";
        $query.= ':'.implode(',:',array_keys($data)).")";
        $connnection = getConnection();
        $prepare = $connnection->prepare($query);
        return $prepare->execute($data);
      
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

function where(string $field, string $operator, string $value)
{
    global $where;
    global $binds;
    $where[] = "{$field} {$operator} :{$field}"; 
    $binds[$field] = $value;
}

function limit(int $limitQuery)
{
    global $limit;
    $limit = " limit {$limitQuery}";
}

function order($orderBy)
{
    global $order;
    $order = " limit {$orderBy}";
}

function dump()
{
        global $where;
        global $limit;
        global $order;

        $query = !empty($where) ? "where ".implode('', $where) : '';
        $query .= $limit ?? '';
        $query .= $order ?? '';

        return $query;
}

/**
 * Faz um select e retorna tosos os produtos  repare estra usando fetchAll
 */
function get(string $table, string $fields = '*')
{
    try {
        global $binds;
        $connection = getConnection();
        $query = "select {$fields} from {$table} ".dump();
        $prepare = $connection->prepare($query);
        $prepare->execute($binds ?? []);
        return $prepare->fetchAll();
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }
}

/**
 * Faz um SELECT e retorna apenas um produto repare esta usando fetch
 */
function first(string $table, string $fields = '*')
{
    try {
        global $binds;
        $connection = getConnection();
        $query = "select {$fields} from {$table} ".dump();
        $prepare = $connection->prepare($query);
        $prepare->execute($binds ?? []);
        return $prepare->fetchObject();
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }
}

function update()
{

}

function delete()
{

}