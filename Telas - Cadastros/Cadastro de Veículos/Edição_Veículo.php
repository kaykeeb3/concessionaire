<?php

    include_once('Conexão.php');

    if (isset($_POST['submit'])) {

        $modelo = $_POST['modelo'];
        $fabricante = $_POST['fabricante'];
        $cor = $_POST['cor'];
        $ano = $_POST['ano'];
        $preco = $_POST['preco'];
        $chassi = $_POST['chassi'];


        $sql= "INSERT INTO veiculos
            (modelo, fabricante, cor, ano, preco, chassi)
        VALUES 
            ('$modelo', '$fabricante', '$cor', '$ano', '$preco', '$chassi')";

        $resultado = mysqli_query($conexao,$sql);
            if ($resultado) {
                mensagem("O $modelo foi cadastrado com sucesso!", "sucess");
            } else {
                mensagem("Não foi possível cadastrar o veículo $modelo", 'danger'); 
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
    <title>Cadastro do Veículo</title>
</head>

<body>
    <section>
        <form action="Cadastro_Veículo.php" method="post">
            <h1>Cadastro do Veículo</h1>
            <fieldset>
                <div class="container">
                    <div class="col">
                        <label>Modelo do Veículo</label>
                        <br>
                        <input type="text"  placeholder="Informe o modelo do veículo" required name="modelo" id="modelo" autocomplete="off" maxlength="15">
                    </div>

                    <div class="col">
                        <label>Fabricante</label>
                        <br>
                        <input type="text" placeholder="Informe o fabricante do veículo" required name="fabricante" id="fabricante" autocomplete="off" maxlength="20">
                    </div>
                
                    <div class="col">
                        <label>Cor</label>
                        <br>
                        <input type="text" placeholder="Informe a cor do veículo" required name="cor" id="cor" autocomplete="off" maxlength="20">
                    </div>

                    <div class="col">
                        <label>Ano</label>
                        <br>
                        <input type="text" placeholder="Informe o ano do veículo" required name="ano" id="ano" autocomplete="off" maxlength="4">
                    </div>

                    <div class="col">
                        <label>Preço (R$)</label>
                        <br>
                        <input type="text" class="control-form" placeholder="Informe o preço do veículo" required name="preco" id="preco" autocomplete="off">
                    </div>

                    <div class="col">
                        <label>Número do Chassi</label>
                        <br>
                        <input type="text" placeholder="Informe o número do Chassi" required name="chassi" id="chassi" autocomplete="off" maxlength="17">
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