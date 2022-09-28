<?php
include "lib/conexao.php";

if (
  isset($_POST["registrar"]) &&
  isset($_POST["email"]) &&
  isset($_POST["nome"]) &&
  isset($_POST["token"])
) {
  $sql = "INSERT into usuarios(nome, email,token)
                    VALUES (:nome, :email, :token)";

  $consulta = $conn->prepare($sql);
  try {
    $consulta->execute([
      "nome" => $_POST["nome"],
      "email" => $_POST["email"],
      "token" => $_POST["token"],
    ]);
    echo "DONE_SQL";
  } catch (Exception $e) {
    echo "ERRO: " . $consulta->errorCode();
  }
} ?>