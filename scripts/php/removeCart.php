<?php

session_start();

if (isset($_POST["removeCart"])){
    if (($key = array_search($_POST["idProduto"], $_SESSION["cart"])) !== false) {
        unset($_SESSION["cart"][$key]);
    }
}