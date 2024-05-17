

<!DOCTYPE html>
<html lang="pt-br">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="cadastro.css">
</head>

<body>
<div class="container">
        <div class="header"></div>
    <div class="main">

    <?php
if(isset($_POST['submit'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o email já existe
    $check = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email='$email'");
    if(mysqli_num_rows($check) > 0) {
        echo "<span style='color:red;'>Usuário já cadastrado</span>";
    } else {
        // Inserir novo usuário
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome','$email','$senha')");
        if($result) {
            echo "<span style='color:green;'>Usuário cadastrado com sucesso</span>";
            // Redirecionar para a tela de login
            header("Location: login.php");
        } else {
            echo "<span style='color:red;'>Erro ao cadastrar usuário</span>";
        }
    }
}
?>


        <h1>Cadastro</h1>
        <form action="cadastro.php" method="POST" id="cadastroForm">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>
        <input class="button" type="submit" name="submit" value="Cadastrar">
        </form>
    </div>
        <div class="footer">
           
            <button class="button" style="background-color: #fff; color: #000;">Home</button>
            
            <button class="button"  style="background-color:black; color:white;">Sobre nós</button>
        </div>
    
</div>
</body>
</html>

