<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
    <?php 
        include('conexao_cadastro.php');
        print("<h1> Listagem de Usuários</h1>");
        $sql = 'select * from usuario';
        $res = $conn->query($sql);

        $qtde = $res ->num_rows;
        if($qtde >0){
            print("<table border='5'>");
            print("<tr>");
            print("<th> Código</th>");
            print("<th> Nome</th>");
            print("<th> Data</th>");
            print("<th> Sexo</th>");
            print("<th> Telefone</th>");
            print("<th> Endereço</th>");
            print("<th> CPF</th>");
            print("<th> Email</th>");
            print("</tr>");
        while($row = $res-> fetch_object()){
            print("<tr>");
            print("<td>".$row->codigo."</td>");
            print("<td>".$row->nome."</td>");
            print("<td>".$row->data."</td>");
            print("<td>".$row->sexo."</td>");
            print("<td>" .$row->telefone."</td>");
            print("<td>" .$row->endereco."</td>");
            print("<td>".$row->cpf."</td>");
            print("<td>".$row->email."</td>");
            print("</tr>");
    }
    print("</table>");
    }else{
        print("<p> Não foram encontrados registros!</p>");
    }
    ?>
</body>
</html>