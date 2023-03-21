<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
    <script src="assets/js/script.js"></script>  
    <?php
        $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : ""; 

        switch ($aviso) {
            case 'sucesso':
                $msg = "Proposta Enviada com Sucesso!";
                alert($msg);
                break;
            default:
                # code...
                break;
        }
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    ?>
</head>
    <body>
        <nav class="menu">
            <ul>
                <li id="item">home</li>
                <li><a href='pages/contatos/index.php'>Contatos</a></li>
                <li><a href='pages/cidades/index.php'>Cidades</a></li>
                <li><a href='pages/hobbies/index.php'>Hobbies</a></li>
                <li><a href='pages/contatoHobbies/index.php'>Contato_has_Hobbies</a></li>
                <li><a href='pages/proposta/index.php'>Trampo</a></li>
            </ul>
        </nav>
        <section>
            <div class="row">
                <div class="col-6">
                    <h1 style="color:#800080">Currículo: Gustavo Preilipper</h1>
                    <p>eu mi divirto</p>
                    <h2>Meus Conhecimentos</h2>
                    <ul>
                        <li>HTML</li>
                        <li>JavaScript</li>
                        <li>PHP</li>
                        <li>SQL</li>                    
                    </ul>
                    <h2>Experiências Profissionais</h2>
                    <ol>
                        <li><a href="http://ifc.edu.br">Aluno IFC 2021 - atual</a></li>
                    </ol>
                    <table class="dados">
                        <tr>
                            <th>Nome</th>
                            <th>Relação</th>
                            <th>Contato</th>
                        </tr>
                        <tr>
                            <td>Maria</td>
                            <td>Chefe</td>
                            <td>maria@mail.com</td>
                        </tr>
                        <tr>
                            <td>João</td>
                            <td>Colega</td>
                            <td>joão@mail.com</td>
                        </tr>
                        <tr>
                            <td>Pedro</td>
                            <td>Colega</td>
                            <td>joão@mail.com</td>
                        </tr>
                    </table>
                </div>
                <div class="col-2" id="colfoto">
                    <img class='foto' src="assets/img/7007313_55a5b.gif" alt="Foto">
                </div>
                <div class="col-4" id="formcontato">
                    <h2>Entre em contato...</h2>
                    <form action="pages/proposta/acao.php" method="POST">
                        <input type="hidden" name="loc" value="home">
                        <div class="row">
                            <div class="col-4">
                                <label for="nome">Nome:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id='nome' name='nome'>
                            </div>
                        </div>
                        <div class="row erro" id="erronome"><div class="col-12">O nome deve possuir pelo menos três letras</div></div>
                        <div class="row">
                            <div class="col-4">
                                <label for="email">E-Mail</label>
                            </div>
                            <div class="col-8">
                                <input type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="row erro" id="erroemail"><div class="col-12">E-mail informado incorreto</div></div>
                        <div class="row">
                            <div class="col-4">
                                <label for="salario">Proposta de Salário:</label>
                            </div>
                            <div class="col-8">
                                <input type="number" name="salario">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="obs">Observações:</label>
                            </div>
                            <div class="col-8">
                                <textarea name="observacoes" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" name='acao' id='acao' value='salvar'>Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    
        <footer>
            <div class="row">
                <div class="col-12">
                    <p>Feito por webdesign gustavo@nha</p>
                </div>
            </div>
        </footer>
    </body>
</html>