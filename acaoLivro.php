<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("classes/Livro.class.php");

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $l_idLivro = isset($_GET['l_idLivro']) ? $_GET['l_idLivro'] : 0;
        $livro = new Livro("", "", "", "", "");
        $resultado = $livro->excluir($l_idLivro);
            header("location:indexLivro.php");
    }
    

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $l_idLivro = isset($_POST['l_idLivro']) ? $_POST['l_idLivro'] : "";
        if ($l_idLivro == 0){

            $livro = new Livro("", $_POST['l_titulo'], $_POST['l_ano_publicacao'], $_POST['l_isdn'], $_POST['l_preco']);
            
            $resultado = $livro->inserir();
            header("location:indexLivro.php");
        }
        else
            
            $livro = new Livro($_POST['l_idLivro'], $_POST['l_titulo'], $_POST['l_ano_publicacao'], $_POST['l_isdn'], $_POST['l_preco']);
            $resultado = $livro->editar($l_idLivro);
            header("location:indexLivro.php");        
    }

//Consultar dados
function buscarDados($l_idLivro){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM Livro WHERE l_idLivro = $l_idLivro");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['l_idLivro'] = $linha['l_idLivro'];
        $dados['l_titulo'] = $linha['l_titulo'];
        $dados['l_ano_publicacao'] = $linha['l_ano_publicacao'];
        $dados['l_isdn'] = $linha['l_isdn'];
        $dados['l_preco'] = $linha['l_preco'];

    }
    //var_dump($dados);
    return $dados;
}
    
?>