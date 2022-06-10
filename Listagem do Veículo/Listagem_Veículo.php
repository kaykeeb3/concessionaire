<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="Style.css">
        <title>Listagem do Veículo</title>
    </head>

    <body>
        <div class="container">

            <?php
                if ( isset( $_POST['veiculos'] ) ) {
                    $veiculos = $_POST['veiculos'];
                } else {
                    $veiculos = '';
                }

                include "../Telas - Cadastros/Cadastro de Veículos/Conexão.php";

                $sql = "SELECT * FROM veiculos WHERE modelo LIKE '%$veiculos%' ";
                
                $dados = mysqli_query( $conexao, $sql );
                
            ?>

            <h1>Listagem do Veículo</h1>

            <nav class="navbar navbar-light">
                <div class="container-fluid">
                  <form class="d-flex" role="search" action="Listagem_Veículo.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name="veiculos">
                    <button class="btn btn-success" type="submit">Buscar</button>
                  </form>
                </div>
            </nav>

            <table class="table table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Modelo do Veículo</th>
                        <th>Fabricante</th>
                        <th>Cor</th>
                        <th>Ano</th>
                        <th>Preço</th>
                        <th>Número do Chassi</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                        while ($linha = mysqli_fetch_assoc($dados)) {
                           $modelo = $linha['modelo'];
                           $fabricante = $linha['fabricante'];
                           $cor = $linha['cor'];
                           $ano = $linha['ano'];
                           $preco = $linha['preco'];
                           $chassi = $linha['chassi'];
                            echo "<tr>
                                  <td>$modelo</td>
                                  <td>$fabricante</td>
                                  <td>$cor</td>
                                  <td>$ano</td>
                                  <td> R$ $preco</td>
                                  <td>$chassi</td>
                                  <td>
                                        <a type='button'>
                                            <img src='Ícones/Editar.svg' title='Editar'>
                                        </a>

                                        <a type='button' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                            <img src='Ícones/Lixeira.svg' title='Excluir'>
                                        </a>
                                    </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role = "dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class='modal-header'>
                        <h5 class='modal-title' id="exampleModalLabel">Confirmação de exclusão</h5>
                        <button type='button' class="close" data-bs-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

                    <div class="modal-body">
                        Deseja realmente excluir @?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sim</button>
                        <button type="button" class="btn btn-primary">Não</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/bootstrap.min.js"></script>
    </body>

</html>