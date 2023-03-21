<?php
    require_once "../../conf/Conexao.php";

    include 'acao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    $dados = array();
    if ($acao == 'editar'){
        $idCidade = isset($_GET['idCidade']) ? $_GET['idCidade'] : '';
        $dados = findById($idCidade);
        //var_dump($dados);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Cidade</title>
        <link rel="stylesheet" href="/curriculo/assets/css/estilo.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .teste{
                margin: 1vh;
            }
        </style>
    </head>
    <body class="teste1">
    <a href="../../index.php"><img src="/curriculo/assets/img/transferir (2).png" alt="" class="foto2"></a>
        <center><h1>Cadastro de Cidade</h1></center>
        
        <div class='row teste'>
            <div class='col-12 '>
                <form action="acao.php" method="post">
                    <div class='row'>
                        <div class='col-4'>
                            <label for="idCidade">ID:</label>
                        
                            <input type="text" class="form-control" idCidade='idCidade' name='idCidade' value="<?php if ($acao == 'editar') echo $dados['idCidade']; else echo '0'; ?>" readonly>
                        </div>
                    
                        <div class='col-4'>
                            <label for="nomeCidade">Nome:</label>
                        
                            <input type="text" class="form-control" idCidade='nomeCidade' name='nomeCidade' value="<?php if ($acao == 'editar') echo $dados['nomeCidade'];?>">
                        </div>
                    
                        <div class='col-4'>
                            <label for="estado">Estado:</label>
                        
                            <input type="text" class="form-control" estado='estado' name='estado' value="<?php if ($acao == 'editar') echo $dados['estado'];?>">
                        </div>
                    </div>  
                        <br>
                    <div class='row'>
                        <div class='col-12'>
                            <center><button type='submit' name='acao' class="btn btn-success" idCidade='acao' value='salvar'>Salvar</button></center>
                        </div>
                    </div>       
                </form>
            </div>
        </div> 
        <div class='row'>
            <?php

            ?>
            <div>
                <table class="table table-danger">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Estado</th>
                            <th>Destalhes</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                                $conexao = Conexao::getInstance();
                                $consulta=$conexao->query("SELECT *FROM cidades;");
                                while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                    echo "
                                        <td>{$linha['idCidade']}</td>
                                        <td>{$linha['nomeCidade']}</td>
                                        <td>{$linha['estado']}</td>
                                        <td><a class='btn btn-info' href='show.php?idCidade={$linha['idCidade']}'>Detalhes</a></td>
                                        <td><a class='btn btn-warning' href='index.php?acao=editar&idCidade={$linha['idCidade']}'>Editar</a></td>
                                        <td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&idCidade={$linha['idCidade']}'.>Excluir</a></td>
                                        </tr>\n
                                    ";
                                
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>