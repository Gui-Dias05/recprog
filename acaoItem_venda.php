<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("classes/Venda.class.php");
    require_once ("classes/Livro.class.php");
    require_once ("classes/Item_venda.class.php");

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $iv_v_idVenda = isset($_GET['iv_v_idVenda']) ? $_GET['iv_v_idVenda'] : 0;
        $iv_l_idLivro = isset($_GET['iv_l_idLivro']) ? $_GET['iv_l_idLivro'] : 0;
        $item_venda = new Item_venda("", "", "", "");
        $resultado = $item_venda->excluir($iv_v_idVenda, $iv_l_idLivro);
            header("location:indexItem_venda.php");
    }
    

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $iv_v_idVenda = isset($_POST['iv_v_idVenda']) ? $_POST['iv_v_idVenda'] : "";
        $iv_l_idLivro = isset($_POST['iv_l_idLivro']) ? $_POST['iv_l_idLivro'] : "";
     

            $item_venda = new Item_venda($_POST['iv_v_idVenda'], $_POST['iv_l_idLivro'], $_POST['iv_quantidade'], $_POST['iv_valor_total_item']);
            
            $resultado = $item_venda->inserir();
            header("location:indexItem_venda.php");
        }
   
    //Consultar dados
    function buscarDados($iv_v_idVenda){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM Item_venda WHERE iv_v_idVenda = $iv_v_idVenda");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['iv_v_idVenda'] = $linha['iv_v_idVenda'];
            $dados['iv_l_idLivro'] = $linha['iv_l_idLivro'];
            $dados['iv_quantidade'] = $linha['iv_quantidade'];
            $dados['iv_valor_total_item'] = $linha['iv_valor_total_item'];

        }
        //var_dump($dados);
        return $dados;
    }

  
function exibirVenda($chave, $dados){
    $str = 0;
    foreach($dados as $linha){
        $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
    }
    return $str;
}

function listarVenda($id){
    $venda = new Venda("","","","", "");
    $lista = $venda->buscarVenda($id);
    return exibirVenda(array('v_idVenda', 'v_idVenda'), $lista);

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
?>