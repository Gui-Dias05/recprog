<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("classes/Autor.class.php");

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $a_idAutor = isset($_GET['a_idAutor']) ? $_GET['a_idAutor'] : 0;
        $autor = new Autor("", "", "");
        $resultado = $autor->excluir($a_idAutor);
            header("location:indexAutor.php");
    }
    

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $a_idAutor = isset($_POST['a_idAutor']) ? $_POST['a_idAutor'] : "";
        if ($a_idAutor == 0){

            $autor = new Autor("", $_POST['a_nome'], $_POST['a_sobrenome']);
            
            $resultado = $autor->inserir();
            header("location:indexAutor.php");
        }
        else
            
            $autor = new Autor($_POST['a_idAutor'], $_POST['a_nome'], $_POST['a_sobrenome']);
            $resultado = $autor->editar($a_idAutor);
            header("location:indexAutor.php");        
    }
    
function buscarDados($a_idAutor){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM Autor WHERE a_idAutor = $a_idAutor");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['a_idAutor'] = $linha['a_idAutor'];
        $dados['a_nome'] = $linha['a_nome'];
        $dados['a_sobrenome'] = $linha['a_sobrenome'];

    }
    return $dados;
}
    
?>