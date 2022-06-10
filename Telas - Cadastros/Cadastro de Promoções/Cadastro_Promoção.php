<?php

    include_once('Conexão.php');

    if ( isset($_POST['submit']) ) {
        
        $modelo = $_POST['modelo'];
        $percentual = $_POST['percentual'];
        $data_limite = $_POST['data_limite'];
    
        
        $sql = "INSERT INTO promocoes 
                    (modelo, percentual, data_limite)
                VALUES 
                    ('$modelo', '$percentual', '$data_limite')";

        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            mensagem("O modelo de veículo $modelo foi cadastrado com sucesso!", "success");
        } else {
            mensagem("Não foi possível cadastrar o modelo $nome", 'danger');
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" href="Fonte - Noto Sans/NotoSans-Regular.ttf">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Cadastro de Promoções</title>
</head>

<body>
    <section>
        <form action="Cadastro_Promoção.php" method="post">
            <h1>Cadastro de Promoções</h1>
            <fieldset>
                <div class="container">
                    <div class="col">
                        <label>Modelo do Veículo</label>
                        <br>
                        <input type="text"  placeholder="Informe o modelo do veículo" required name="modelo" id="modelo" autocomplete="off" maxlength="15">
                    </div>

                    <div class="col">
                        <label>Taxa percentual de desconto (%)</label>
                        <br>
                        <input type="text" placeholder="Informe a taxa percentual" required name="percentual" id="percentual" autocomplete="off" maxlength="4">
                    </div>
                
                    <div class="col">
                        <label>Data limite da promoção</label>
                        <br>
                        <input type="datetime-local" placeholder="Informe a data limite" required name="data_limite" id="data_limite" autocomplete="off" maxlength="6">
                    </div>

                    <div class="col">
                        <input type="submit" class="btn btn-dark" value="Cadastrar" name="submit">
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
    <script src="js/bootstrap.min.js"></script>
    <script src="Jquery/jquery-3.6.0.min.js"></script>
    <script src="Jquery/jquery.mask.min.js"></script>
    <script src="Jquery/jquery.mask.js"></script>
    <script src="Javascript.js"></script>
</body>

</html>