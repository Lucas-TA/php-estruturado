<?php
/**
 * Connect to the database
 * @return PDO
 */
function connect(): PDO
{
    $pdo = new \PDO('mysql:host=localhost;dbname=php_estruturado;charset=utf8mb4', 'lucas', '123123');
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
    $sql = "INSERT INTO {$table}";
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
        echo "Erro ao inserir dados: " . $e->getMessage();
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
        $sql = "SELECT * FROM {$table}";
        $list = $pdo->query($sql);

        if ($list === false) {
            return [];
        }

        return $list->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an associative array
    } catch (PDOException $e) {
        // Handle any database errors
        return [];
    }
}
/**
 * Update information in the database
 * @return void
 */
function update($table, $field, $value)
{
    $pdo = connect();

    try {
        $sql = "UPDATE {$table} SET {$field} = :{$value} WHERE {$field} = :{$field}";
    } catch (PDOException $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
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
        $sql = "SELECT * FROM {$table} WHERE {$field} = :{$field}";

        $find = $pdo->prepare($sql);
        $find->bindValue(':' . $field, $value);
        $find->execute();

        return $find->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}

/**
 * Delete information from the database
 * @return void
 */
function delete()
{

}

/**
 * Disconnect from the database
 * @return void
 */
function disconnect()
{

}