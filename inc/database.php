<?php
mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;
    } catch (Exception $e) {
        echo $e->getMessage();
        return null;
    }
}

function close_database($conn) {
    try {
        mysqli_close($conn);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find($table = null, $id = null ) {

    $database = open_database();
    $found = null;
    try {
        if ($id) {
            $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                $found = $result->fetch_assoc();
            }

        } else {

            $sql = "SELECT * FROM " . $table;
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                $found = $result->fetch_all(MYSQLI_ASSOC);

                /* Metodo alternativo
                $found = array();
                while ($row = $result->fetch_assoc()) {
                  array_push($found, $row);
                } */
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
    return $found;
}


function Execute($table){
    // Db  Connectivity
    // query
    $database = open_database();
    $sql = "SELECT * FROM " . $table;
    $result = mysqli_query($database, $sql);

    if( mysqli_num_rows($result) > 0 ){
        $response = ProcessDbData($result);
    }else{
        $response = array();
    }
    mysqli_free_result($result);
    return $response;
}

function ProcessDbData($obj){
    $result = array();
    if(!empty($obj)){
        while($row = mysqli_fetch_assoc($obj)){
            $result[] = $row;
        }
        return $result;
    }
    return $result;
}

function find_all_clientes($table){
    $database = open_database();
    try {
        $sql = "SELECT * FROM " . $table;
        $resource = $database->prepare($sql);
        $resource->execute();
        $encode = array();
        print 'before foreach';
        foreach($resource as $row) {
            $encode[] = $row;
            print $row;
        }
        print 'after foreach';
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    return $encode;
}

function findR($table = null, $id = null ) {

    $resultSet = null;
    $database = open_database();
    $found = null;
    try {
        if ($id) {
            $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
            $result = $database->query($sql);
            $resultSet = $result;

            if ($result->num_rows > 0) {
                $found = $result->fetch_assoc();
            }

        } else {

            $sql = "SELECT * FROM " . $table;
            $result = $database->query($sql);
            $resultSet = $result;

            if ($result->num_rows > 0) {
                $found = $result->fetch_all(MYSQLI_ASSOC);

                /* Metodo alternativo
                $found = array();
                while ($row = $result->fetch_assoc()) {
                  array_push($found, $row);
                } */
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
    return $resultSet;
}


/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all( $table ) {
    return find($table);
}

function find_allR($table) {
    return findR($table);
}


/**
 *  Insere um registro no BD
 */
function save($table = null, $data = null) {
    $database = open_database();
    $columns = null;
    $values = null;
    //print_r($data);
    foreach ($data as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "'$value',";
    }
    // remove a ultima virgula
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');

    $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
    try {
        $database->query($sql);
        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';

    } catch (Exception $e) {

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}

function update($table = null, $id = 0, $data = null) {
    $database = open_database();
    $items = null;
    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }
    // remove a ultima virgula
    $items = rtrim($items, ',');
    $sql  = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id=" . $id . ";";
    try {
        $database->query($sql);
        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}



