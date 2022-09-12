<nav class="navbar navbar-expand-lg navbar-dark absolute">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-bag-check-fill"></i>E-Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?">Home</a>
                </li>
            </ul>

        </div>
</nav>

<div class="pageLogin">
    <div data-aos="fade-up" class="shadow-lg center border rounded-lg">
        <form class="d-flex flex-column" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço de Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Insira seu email">
                <small id="emailHelp" class="form-text text-muted">Não compartilharemos o seu email com ninguem.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Insira senha">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirme sua senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Insira senha">
            </div>
            <br>
            <button id="loginBtn" type="submit" class="btn btn-primary">Logar</button>
            <hr>
            <div class="loginFooter">Não possui conta? <a class="text-primary" href="?page=register">Registre-se</a>.
            </div>
        </form>
    </div>
</div>