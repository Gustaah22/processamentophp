<html lang= "pt-br">
        <head>
            <title>Processamento de Criacao de Administrador</title>
        </head>
        <body>
            <h1>Processamento de Criacao de Administrador</h1>
            <br>
                Mensagem para o Usuario
            <br>
            <a href="listaradmins.php">Voltar para a Pagina de Lista</a>
            <?php
                $mysqlhostname = "144.22.231.213";
                $mysqlport = "3306";
                $mysqlusername = "usuarios";
                $mysqlpassword = "Senac@1976";
                $mysqldatabase = "meubanco";

                //Mostra a string de conexão do mySQL
                $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
                $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

                //Captura o post do usuário
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                
                //Monta o comando de inscrição
                $cmdtext = "INSERT INTO ADMINISTRADOR(ADM_NOME, ADM_EMAIL, ADM_SENHA) VALUES('" . $nome . "','" . $email . "','" . $senha . "')";
                $cmd = $pdo->prepare($cmdtext);

                //Executa o comando e verifica se teve sucesso
                $status = $cmd->execute();
                if($status) {
                    echo "Criação do Administrador com sucesso";
                } 
                else{
                    echo "Ocorreu um erro ao inserir";
                }

            ?>
        <br>
        <a href="listaradmins.php">Voltar pra a Pagina</a>
    </body>
</html>  