<?php
    $alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">'.$alertaLogin.'</div>' : '';
    $alertaCadastro  = strlen($alertaCadastro ) ? '<div class="alert alert-danger">'.$alertaCadastro .'</div>' : '';
?>
<div class="bg-secondary text-light mt-5 p-4">
    <div class="row">
        <div class="col">
            <form method="POST" >
                <h2>Login</h2>
                <?= $alertaLogin;?>
                <div class="form-group">
                    <label >E-mail:</label>
                    <input type="email" name="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label >Senha:</label>
                    <input type="password" name="senha" class="form-control" required />
                </div>
                <br/>
                <button type="submit" name="acao" value="logar" class="btn btn-primary" >Entrar</button>
            </form>
        </div>

        <div class="col">

            <form method="POST" >
                <h2>Cadastre-se</h2>
                <?= $alertaCadastro;?>
                <div class="form-group">
                    <label >Nome:</label>
                    <input type="text" name="nome" class="form-control" required />
                </div>
                <div class="form-group">
                    <label >E-mail:</label>
                    <input type="email" name="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label >Data de nascimento:</label>
                    <input type="text" name="dt_create" class="form-control" required />
                </div>
                <div class="form-group">
                    <label >Senha:</label>
                    <input type="password" name="senha" class="form-control" required />
                </div>
                <br/>
                <button type="submit" name="acao" value="cadastrar" class="btn btn-primary" >Cadastrar</button>
            </form>

        </div>
    </div>
</div>