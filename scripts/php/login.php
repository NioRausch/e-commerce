<?php
include "lib/conexao.php";

if (
  isset($_POST["login"]) &&
  isset($_POST["email"]) &&
  isset($_POST["token"])
) {
  $sql = "SELECT *
        FROM usuarios
        WHERE email = :email
        AND token = :token";

  $consulta = $conn->prepare($sql);
  $consulta->execute([
    "email" => $_POST["email"],
    "token" => $_POST["token"],
  ]);

  $data = $consulta->fetchAll();

  if (count($data) > 0) {
    session_start();
    $_SESSION["token"] = $_POST["token"];
    $_SESSION["nome"] = $data[0]["nome"];

    echo json_encode(["nome" => $data[0]["nome"], "status" => "SUCCESS"]);
  } else {
    echo json_encode(["status" => "ERROR: NO_USER"]);
  }
} ?>
