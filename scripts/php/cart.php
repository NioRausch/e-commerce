<?php

require "lib/conexao.php";

session_start();

if (isset($_POST["cart"])){
    if (!isset($_SESSION["cart"]))
        $_SESSION["cart"] = [];

    $data = [];

    if (count($_SESSION["cart"]) > 0)
        foreach ($_SESSION["cart"] as &$prod) {
            $sql = "SELECT *
            FROM produtos
            WHERE id = :id";

            $consulta = $conn->prepare($sql);
            $consulta->execute(["id" => $prod]);

            $consult = $consulta->fetchAll();

            foreach ($consult as &$value) {
                unset($value[0]);
                unset($value[1]);
                unset($value[2]);
                unset($value[3]);
                unset($value[4]);
                unset($value[5]);
                unset($value[6]);
                unset($value["descricao"]);
              }

            array_push($data, $consult[0]);
        }

    echo json_encode($data);
}