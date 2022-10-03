<?php

require "lib/conexao.php";

if (isset($_POST["produtos"])) {
  $sql = "SELECT *
        FROM produtos";
  $consulta = $conn->prepare($sql);
  $consulta->execute();

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