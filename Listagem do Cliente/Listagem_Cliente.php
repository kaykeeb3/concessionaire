<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="Style.css">
        <title>Listagem do Cliente</title>
    </head>

    <body>
        <div class="container">

            <?php
                if ( isset( $_POST['cliente'] ) ) {
                    $cliente = $_POST['cliente'];
                } else {
                    $cliente = '';
                }

                include "../Telas - Cadastros/Cadastro de Cliente/Conexão.php";

                $sql = "SELECT * FROM cliente WHERE nome LIKE '%$cliente%' ";
                
                $dados = mysqli_query( $conexao, $sql );
                
            ?>

            <h1>Listagem do Cliente</h1>

            <nav class="navbar navbar-light">
                <div class="container-fluid">
                  <form class="d-flex" role="search" action="Listagem_Cliente.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name="promocoes">
                    <button class="btn btn-success" type="submit">Buscar</button>
                  </form>
                </div>
            </nav>
            
            <table class="table table table-hover">
                <thead class="table-primary">
                    <tr> 
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>CNH</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                        while ( $linha = mysqli_fetch_assoc($dados) ) {

                            $nome = $linha['nome'];
                            $email = $linha['email'];
                            $rg = $linha['rg'];
                            $cpf =  $linha['cpf'];
                            $telefone = $linha['telefone'];
                            $cnh = $linha['cnh'];
                            $cidade = $linha['cidade'];
                            $estados= $linha['estado'];

                            echo "<tr>
                                    <td>$nome</td>
                                    <td>$email</td>
                                    <td>$rg</td>
                                    <td>$cpf</td>
                                    <td>$telefone</td>
                                    <td>$cnh</td>
                                    <td>$cidade</td>
                                    <td>$estados</td>
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