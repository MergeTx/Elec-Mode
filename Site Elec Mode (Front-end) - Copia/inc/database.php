<?php

date_default_timezone_set("America/Sao_Paulo");

// Função para abrir conexão com o banco de dados
function open_database() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $conn->set_charset("utf8");
        return $conn;
    } catch (Exception $e) {
        // Em caso de erro, imprime a mensagem de erro
        echo "<h3>Ocorreu um erro:\n<br>" . $e->getMessage() . "</h3>";
        return null;
    }
}

// Função para fechar conexão com o banco de dados
function close_database($conn) {
    try {
        mysqli_close($conn);
    } catch (Exception $e) {
        // Em caso de erro, imprime a mensagem de erro
        echo "<h3>Ocorreu um erro:\n<br>" . $e->getMessage() . "</h3>";
    }
}

// Função para pesquisar um registro pelo ID em uma tabela
function find($table = null, $id = null) {
    $database = open_database();
    $found = null;

    try {
        if ($id) {
            $sql = "SELECT * FROM " . $table . " WHERE id = ?";
            $stmt = $database->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $found = $result->fetch_assoc();
            }
        } else {
            $sql = "SELECT * FROM " . $table;
            $result = $database->query($sql);
            if ($result->num_rows > 0) {
                $found = array();
                while ($row = $result->fetch_assoc()) {
                    array_push($found, $row);
                }
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
    return $found;
}

// Função para pesquisar todos os registros de uma tabela
function find_all($table) {
    return find($table);
}

// Função para inserir um novo registro em uma tabela
function save($table = null, $data = null) {
    $database = open_database();
    $columns = null;
    $values = null;

    foreach ($data as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "?,";
    }

    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');

    $sql = "INSERT INTO " . $table . " ($columns) VALUES ($values)";

    try {
        $stmt = $database->prepare($sql);
        $stmt->bind_param(str_repeat("s", count($data)), ...array_values($data));
        $stmt->execute();

        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Não foi possível realizar a operação.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}

// Função para atualizar um registro em uma tabela
function update($table = null, $id = 0, $data = null) {
    $database = open_database();
    $items = null;

    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . " = ?,";
    }

    $items = rtrim($items, ',');

    $sql = "UPDATE " . $table . " SET " . $items . " WHERE id = ?";

    try {
        $data['id'] = $id;
        $stmt = $database->prepare($sql);
        $stmt->bind_param(str_repeat("s", count($data)), ...array_values($data));
        $stmt->execute();

        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Não foi possível realizar a operação.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}

// Função para remover um registro de uma tabela
function remove($table = null, $id = null) {
    $database = open_database();

    try {
        $sql = "DELETE FROM " . $table . " WHERE id = ?";
        $stmt = $database->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $_SESSION['message'] = 'Registro removido com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Não foi possível realizar a operação.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}

// Função para filtrar registros de uma tabela
function filter($table = null, $p = null) {
    $database = open_database();
    $found = null;

    try {
        if ($p) {
            $sql = "SELECT * FROM " . $table . " WHERE " . $p;
            $stmt = $database->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $found = array();
                while ($row = $result->fetch_assoc()) {
                    array_push($found, $row);
                }
            } else {
                throw new Exception("Não foram encontrados registros de dados!");
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
    return $found;
}
