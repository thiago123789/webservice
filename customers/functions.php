<?php
/**
 * Created by PhpStorm.
 * User: Thiago Gomes
 * Date: 25/11/2016
 * Time: 15:13
 */
require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;
/**
 *  Listagem de Clientes
 */
function index() {
    global $customers;
    $customers = find_all('gastronomia');
}


/**
 *  Cadastro de Clientes
 */
function add() {
    if (!empty($_POST['customer'])) {

        $customer = $_POST['customer'];
        
        save('gastronomia', $customer);
        header('location: index.php');
        echo 'ok';
    }
}

/**
 *	Atualizacao/Edicao de Cliente
 */
function edit() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['customer'])) {
            $customer = $_POST['customer'];
            update('gastronomia', $id, $customer);
            header('location: index.php');
        } else {
            global $customer;
            $customer = find('gastronomia', $id);
        }
    } else {
        header('location: index.php');
    }
}

