<!DOCTYPE html>
<html>
    <head>
        <?php include('../../util/commonHead.php'); ?>
        <link rel="stylesheet" href="../../assets/styles/crud.css">
        <title>Cadastro</title>
    </head>
    <body>
        <header>
            <?php include('../../util/header.php'); ?>
        </header>
        <div id="vazio"></div>
        <main>
        <?php //verificar se usuário já existe 
        $erro ="";
                if(isset($_GET["erro"])){
                        $erro = $_GET["erro"];
                }
                if($erro == "exis"):
        ?>
        <div class="alert alert-warning" role="alert">
                <p>Usuário já cadastrado</p>
        </div>

        <?php //cadastro de cliente
        elseif($_GET["tipo"] == "cliente"): ?>

            

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">
            
            
            <div class="form-group">
                    <label for="nome"></label>
                    <input type="text" name="nome" placeholder="Seu Nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" name="email" placeholder="Seu e-mail" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel"></label>
                    <input type="number" name="tel" placeholder="Seu telefone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha"></label>
                    <input type="password" name="senha" placeholder="Crie Sua Senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" placeholder="" class="form-control">

                </div>
            <button type="submit" class="btn-cadastrar" name="cadastro">Cadastrar</button>
            -->
                
            </form>
        </div>

        <?php endif; ?>
            <?php //cadastro de autonomo
            if ($_GET["tipo"] == "auto") :
        ?>

            <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center-cadastro">      

            <h1 class="fill">Crie sua Conta</h1>

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">
            
            <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>Nome</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>Email</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>Telefone</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>CNPJ</label>      
                </div>

                <div class="campo-texto">
                  <input type="password" required>
                  <span></span>
                  <label>Senha</label>      
                </div>
                
                <input type="submit" value="CADASTRO">
                <div class="link-conta">
                        Já tem uma conta? <a href="">Login</a>
        </div>
            <!--
            <div class="form-group">
                    <label for="nome"></label>
                    <input type="text" name="nome" placeholder="Seu Nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" name="email" placeholder="E-mail de contato" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel"></label>
                    <input type="number" name="tel" placeholder="Telefone de Contato" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cpf"></label>
                    <input type="text" name="cpf" placeholder="Seu CPF" class="form-control" maxlength="14">
                </div>
                <div class="form-group">
                    <label for="senha"></label>
                    <input type="password" name="senha" placeholder="Crie Sua Senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" placeholder="" class="form-control">
                </div>
                <button type="submit" class="btn-cadastrar" name="cadastro">Cadastrar</button>
            -->
            </form>
            </div>

        <?php //cadastro de empresa
        elseif($_GET["tipo"] == "empresa"): ?>

            <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center-cadastro">      

            <h1 class="fill">Crie sua Conta</h1>

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>Nome</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>Email</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>Telefone</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>CNPJ</label>      
                </div>

                <div class="campo-texto">
                  <input type="password" required>
                  <span></span>
                  <label>Senha</label>      
                </div>
            
                <input type="submit" value="CADASTRO">
                <div class="link-conta">
                        Já tem uma conta? <a href="">Login</a>
        </div>

            <!--
            <div class="form-group">
                    <label for="nome"></label>
                    <input type="text" name="nome" placeholder="Nome da Empresa" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" name="email" placeholder="E-mail de contato" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel"></label>
                    <input type="number" name="tel" placeholder="Telefone de Contato" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cnpj"></label>
                    <input type="text" name="cnpj" placeholder="CNPJ da Empresa" class="form-control" maxlength="14">
                </div>
                <div class="form-group">
                    <label for="senha"></label>
                    <input type="password" name="senha" placeholder="Crie Sua Senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" placeholder="" class="form-control">
                </div>
            <button type="submit" class="btn-cadastrar" name="cadastro">Cadastrar</button>
       
            -->
                
            </form> 
        </div> 
        <?php endif; ?>
        </main>
        
            <!-- Footer -->

            <?php include('../../util/footer.php'); ?>  

    </body>
</html>