
<html>
<head>
    <title>Excluir o Administrador</title>
</head>
<body>
    <h1>Excluir o Administrador</h1>
    <br>
    <?php
        //Dados para conexão ao MySQL
        $mysqlhostname = "144.22.231.213";
        $mysqlport = "3306";
        $mysqlusername = "usuarios";
        $mysqlpassword = "Senac@1976";
        $mysqldatabase = "meubanco";

        //Mostra a string de conexão do mySQL
        $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
        $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

        //Coleta os dados do administrador
        $id = $_GET["id"];

        //Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo usuário
        $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ID=" . $id)->fetch();

        //Se o retorno for vazio (0), então a senha ou email estão incorretos
        $nome = $admin["ADM_NOME"];
        $email = $admin["ADM_EMAIL"];            
    ?>
    <Form Action="excluirprocessamento.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <br>
        Nome : 
        <input type="text" name="nome" value="<?php echo $nome; ?>">
        <br>
        Email : 
        <input type="text" name="email" value="<?php echo $email; ?>">
        <br>
        <input type="submit" value="Enviar"> 
    </Form>
    
</body>
</html> 