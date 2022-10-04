<?php
session_start();


if ($_POST["addCart"]){
    if (!isset($_SESSION["cart"]))
        $_SESSION["cart"] = [];

    array_push($_SESSION["cart"], $_POST["idProduto"]);
}