<?php
/**
 * Connect to the database
 * @return PDO
 */
function connect(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=php_estruturado;charset=utf8mb4', 'lucas', '123123');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}

/**
 * Add information to the database
 * @param $table
 * @param $fields
 * @return bool
 */
function create($table, $fields): bool
{
    if (!is_array($fields))
    {
        $fields = (array) $fields;
    }
    $sql = "INSERT INTO $table";
    $sql .= "(" . implode(', ', array_keys($fields)) .")";
    $sql .= " VALUES";
    $sql .= "(" . ":" . implode(',:', array_keys($fields)) . ")";

    try {
        $pdo = connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $insert = $pdo->prepare($sql);
        return $insert->execute($fields);

    } catch (PDOException $e) {
        echo "Error on inserting data: " . $e->getMessage();
        return false;
    }
}

/**
 * Return all users information
 * @param $table
 * @return array
 */
function listAll($table): array
{
    $pdo = connect();
    try {
        $sql = "SELECT * FROM $table";
        $list = $pdo->query($sql);

        if ($list === false) {
            return [];
        }

        return $list->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

/**
 * Function updates de user information
 * @param $table
 * @param $fields
 * @param $where
 * @return bool
 */
function update($table, $fields, $where): bool
{
    if (!is_array($fields))
    {
        $fields = (array) $fields;
    }

    $pdo = connect();

    $data = array_map(function ($field) {
        return "$field = :$field";
    }, array_keys($fields));

    $sql = "UPDATE $table SET " . implode(', ', $data) . " WHERE $where[0] = :$where[0]";

    $data = array_merge($fields, [$where[0] => $where[1]]);

    $update = $pdo->prepare($sql);

    $update->execute($data);

    return $update->rowCount();
}

/**
 * Find an information in the database
 * @return void
 */
function find($table, $field, $value): array
{
    $pdo = connect();
    $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

    try {
        $sql = "SELECT * FROM $table WHERE $field = :$field";

        $find = $pdo->prepare($sql);
        $find->bindValue(':' . $field, $value);
        $find->execute();

        return $find->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error on inserting data: " . $e->getMessage();
    }
}

/**
 * Delete information from the database
 * @return void
 */
function delete($table, $field, $value): bool
{
    $pdo = connect();
    $sql = "DELETE FROM $table WHERE $field = :$field";
    $delete = $pdo->prepare($sql);
    $delete->bindValue($field, $value);

    return $delete->execute();
}

/**
 * Disconnect from the database
 * @return void
 */
function disconnect()
{

}