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

function listAll($table): array()
{

}
/**
 * Update information in the database
 * @return void
 */
function update()
{

}

/**
 * Find an information in the database
 * @return void
 */
function find()
{

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