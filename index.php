<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-commerce</title>
        <!-- CSS only -->
        <link href="index.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- <link href="https://bootswatch.com/5/sketchy/bootstrap.css" rel="stylesheet">-->
        <link href="https://bootswatch.com/5/lux/bootstrap.css" rel="stylesheet">


        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel=" stylesheet">

        <!-- Animation library -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

        <!-- Animated alerts -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <body class="bg-light">
        <?php
        session_start();

        $no_login_allowed = ["login", "register"];

        $is_logged = false;

        if (isset($_SESSION["token"])) {
          $is_logged = true;
        }

        function go_home($is_logged)
        {
          if (!$is_logged) {
            include "pages/home.html";
          } else {
            include "pages/homeLogged.html";
          }
        }

        function logout()
        {
          unset($_SESSION["token"]);
          unset($_SESSION["nome"]);
          header("Location: ?page=home");
        }

        if (isset($_GET["page"])) {
          if ($is_logged && in_array($_GET["page"], $no_login_allowed)) {
            header("location: ?page=home");
          }

          if ($_GET["page"] == "cart" && $is_logged) {
            include "pages/cart.html";
          } elseif ($_GET["page"] == "login" && !$is_logged) {
            include "pages/login.html";
          } elseif ($_GET["page"] == "register" && !$is_logged) {
            include "pages/register.html";
          } elseif ($_GET["page"] == "logout" && $is_logged) {
            logout();
          } else {
            go_home($is_logged);
          }
        } else {
          go_home($is_logged);
        }
        ?>

        <script>
        AOS.init();
        </script>
    </body>



</html>