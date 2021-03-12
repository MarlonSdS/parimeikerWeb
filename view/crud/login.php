<!DOCTYPE html>
<html>
    <head>
        <?php include'../../util/commonHead.php'; ?>
        <title>Entrar</title>
    </head>
    <body>
        <main>
            <form action="">
            <?php 
            //A idéia aqui é ter apenas uma página de login e mudar seus campos dependendo do que foi passado,
            //para isso será utilizado uma verificção if em php ou javascript
            ?>
            <div class="form-group">
                    <label for="nome">Crie Sua Senha</label>
                    <input type="text" name="nome" class="form-control">
                </div>
            <div class="form-group">
                    <label for="senha">Crie Sua Senha</label>
                    <input type="password" name="senha" class="form-control">
            </div>

            <button type="submit" class="btn btn-secondary" name="login">Entrar</button>
        </form>
        </main>
        
    </body>
</html>