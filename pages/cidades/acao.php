<?php
    require_once "../../conf/Conexao.php";

    // var_dump($_POST);
    //     echo"<br>";
    // var_dump($_GET);
    $acao = "";
    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    switch($acao){
        case 'excluir': excluir(); break;
        case 'salvar': {
            $idCidade = isset($_POST['idCidade']) ? $_POST['idCidade'] : 0;
            if ($idCidade == 0)
                salvar(); 
            else
                editar();
            break;
        }
    }

    function excluir(){    
        $idCidade = isset($_GET['idCidade']) ? $_GET['idCidade']:0;
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("DELETE FROM cidades WHERE idCidade = :idCidade");
        $stmt->bindParam('idCidade', $idCidade, PDO::PARAM_INT);  
        $stmt->execute();
        header("location:index.php");
    }

    function editar(){
        echo "FUNCTION EDITAR";
        $dados = formToArray();

        $conexao = Conexao::getInstance();

        $sql = "UPDATE cidades SET nomeCidade = '".$dados['nomeCidade']."', estado = '".$dados['estado']."' WHERE idCidade = '".$dados['idCidade']."';";

        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function salvar(){
            echo "FUNCTION SALVAR";
        $dados = formToArray();

        var_dump($dados);

        $conexao = Conexao::getInstance();

        $sql = "INSERT INTO cidades (idCidade, nomeCidade, estado) VALUES ('".$dados['idCidade']."','".$dados['nomeCidade']."','".$dados['estado']."')";
        
        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function formToArray(){
        $idCidade = isset($_POST['idCidade']) ? $_POST['idCidade']: 0;
        $nomeCidade = isset($_POST['nomeCidade']) ? $_POST['nomeCidade']: '';
        $estado = isset($_POST['estado']) ? $_POST['estado']: '';


        $dados = array(
            'idCidade' => $idCidade,
            'nomeCidade' => $nomeCidade,
            'estado' => $estado
        );

        return $dados;

    }

    function findById($idCidade){
        $conexao = Conexao::getInstance();
        $conexao = $conexao->query("SELECT*FROM cidades WHERE idCidade = $idCidade;");
        $result = $conexao->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }

?>