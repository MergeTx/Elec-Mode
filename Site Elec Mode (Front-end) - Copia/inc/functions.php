<?php
include_once "./config.php";

require_once(DBAPI);


$produto = null;
$produtos = null;

/**
*  Listagem de Clientes
*/
function index() {
    global $produtos;
    if (!empty($_POST['users'])){
        $produtos = filter("produtos", "nome like '%" . $_POST['users'] . "%'");
    } else {
        $produtos = find_all('produtos');
    }
}
