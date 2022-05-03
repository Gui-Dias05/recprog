<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("classes/Livro_Autor.class.php");
    require_once ("classes/Livro.class.php");
    require_once ("classes/Autor.class.php");

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $la_l_idLivro = isset($_GET['la_l_idLivro']) ? $_GET['la_l_idLivro'] : 0;
        $la_a_idAutor = isset($_GET['la_a_idAutor']) ? $_GET['la_a_idAutor'] : 0;
        $livro_autor = new Livro_Autor("", "");
        $resultado = $livro_autor->excluir($la_l_idLivro, $la_a_idAutor);
            header("location:indexLivro_Autor.php");
    }
    

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $la_l_idLivro = isset($_POST['la_l_idLivro']) ? $_POST['la_l_idLivro'] : "";


            $livro_autor = new Livro_Autor($_POST['la_l_idLivro'], $_POST['la_a_idAutor']);
            
            $resultado = $livro_autor->inserir();
            header("location:indexLivro_Autor.php");
        }

    function buscarDados($la_l_idLivro){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM Livro_Autor WHERE la_l_idLivro = $la_l_idLivro");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['la_l_idLivro'] = $linha['la_l_idLivro'];
            $dados['la_a_idAutor'] = $linha['la_a_idAutor'];

        }
        return $dados;
    }

    function exibirLivro($chave, $dados){
        $str = 0;
        foreach($dados as $linha){
            $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
        }
        return $str;
    }

    function listarLivro($id){
        $livro = new Livro("","","","", "");
        $lista = $livro->buscarLivro($id);
        return exibirLivro(array('l_idLivro', 'l_titulo'), $lista);

    }
    
    function exibirAutor($chave, $dados){
        $str = 0;
        foreach($dados as $linha){
            $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
        }
        return $str;
    }

    function listarAutor($id){
        $autor = new Autor("","","");
        $lista = $autor->buscarAutor($id);
        return exibirAutor(array('a_idAutor', 'a_nome'), $lista);

    }
?>