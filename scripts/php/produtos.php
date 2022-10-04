<?php

require "lib/conexao.php";

if (isset($_POST["produtos"])) {

  if (isset($_POST["idCategoria"])){
    $sql = "SELECT *
          FROM produtos
          WHERE categoria_id = :id";
    $consulta = $conn->prepare($sql);
    $consulta->execute(["id" => $_POST["idCategoria"]]);
  }
  else{
    $sql = "SELECT *
    FROM produtos";
    $consulta = $conn->prepare($sql);
    $consulta->execute();
  }

  $data = $consulta->fetchAll();

  foreach ($data as &$value) {
    unset($value[0]);
    unset($value[1]);
    unset($value[2]);
    unset($value[3]);
    unset($value[4]);
    unset($value[5]);
  }

  echo json_encode($data);
}