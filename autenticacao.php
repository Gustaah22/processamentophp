<html lang="pt-br">
    <head>
        <title>Login - Autenticacao</title>
    </head>
    <body>
        <h1>Login - Autenticacao</h1>
        <br>
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

            //Captura o post do usuário
            $email = $_POST["email"];
            $senha = $_POST["senha"];


            //Realiza uma Query SQL para buscar o administrador que tenha o email e a senha passado pelo usuário
            $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL = '" . $email . "' AND ADM_SENHA = '" . $senha . "'")->fetchAll();
            
            //Se o retorno for vazio (0), então a senha ou email estão incorretos
            if(count($admin) == 0){
                echo "Usuário ou senha inválidos";
            }
            else{
                echo "Usuário autenticado";
            }
        ?>
    </body>
</html>