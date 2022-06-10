<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="Style.css">
        <title>Listagem de Promoções</title>
    </head>

    <body>
        <div class="container">

        <?php
                if ( isset( $_POST['promocoes'] ) ) {
                    $promocoes = $_POST['promocoes'];
                } else {
                    $promocoes = '';
                }

                include_once("../Telas - Cadastros/Cadastro de Promoções/Conexão.php");

                $sql = "SELECT * FROM promocoes WHERE modelo LIKE '%$promocoes%' ";
                
                $dados = mysqli_query( $conexao, $sql );
                
            ?>

            <h1>Listagem de Promoções</h1>

            <nav class="navbar navbar-light">
                <div class="container-fluid">
                  <form class="d-flex" role="search" action="Listagem_Promoções.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name="promocoes">
                    <button class="btn btn-success" type="submit">Buscar</button>
                  </form>
                </div>
            </nav>

            <table class="table table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Modelo do Veículo</th>
                        <th>Taxa percentual de desconto</th>
                        <th>Data limite da promoção</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                        while ( $linha = mysqli_fetch_assoc($dados) ) {

                            $codigo = $codigo['codigo'];
                            $modelo = $linha['modelo'];
                            $percentual = $linha['percentual'];
                            $data_limite = $linha['data_limite'];

                            echo "<tr>
                                    <td>$modelo</td>
                                    <td>$percentual</td>
                                    <td>$data_limite</td>
                                    <td>
                                        <a type='button>
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
                    <form action ="Exluir.php" method = "POST">   
                        <div class="modal-body">
                        Deseja realmente excluir @?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sim</button>
                            <button type="button" class="btn btn-primary">Não</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>

        <script src="js/bootstrap.min.js"></script>
        <script>
            function obterDados(codigo, modelo){
                document.getElementById(codigo_modelo).value = codigo;
            }
        </script>
    </body>

</html>