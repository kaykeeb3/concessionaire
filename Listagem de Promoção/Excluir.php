!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Exclusão</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
                include_once "../Telas - Cadastros/Cadastro de Promoções/Conexão.php"

                $codigo = $_POST['codigo'];
                $modelo = $_POST['modelo'];

                $sql = "DELETE FROM promocoes WHERE codigo = $codigo";

                if(mysqli_query( $conexao, $sql ) ){
                    mensagem("O $modelo foi excluído com sucesso!", "sucess")
                }else{
                    mensagem("O $modelo não foi excluído!", "danger")
                }
            ?>
        </div>
    </div>
</body>