<html>
    <head>
        <title>Processamento de Exclusao de Administrador</title>
    </head>
    <body>
        <h1>Processamento de Exclusao de Administrador</h1>
        <br>
            Mensagem para o usuario
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
                $id = $_POST["id"];
                
                //Monta o comando de inscrição
                $cmdtext = "DELETE FROM ADMINISTRADOR WHERE ADM_ID=" . $id;
                $cmd = $pdo->prepare($cmdtext);

                //Executa o comando e verifica se teve sucesso
                $status = $cmd->execute();
                if($status) {
                    echo "Exclusão do Administrador com sucesso";
                } 
                else{
                    echo "Ocorreu um erro ao excluir";
                }

            ?>
    </body>
</html>        
