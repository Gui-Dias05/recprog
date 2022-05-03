<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once "classes/Cliente.class.php";
    require_once "classes/Venda.class.php";


    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $v_idVenda = isset($_GET['v_idVenda']) ? $_GET['v_idVenda'] : 0;
        $venda = new Venda("", "", "", "", "");
        $resultado = $venda->excluir($v_idVenda);
            header("location:indexVenda.php");
    }
    

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $v_idVenda = isset($_POST['v_idVenda']) ? $_POST['v_idVenda'] : "";
        if ($v_idVenda == 0){

            $venda = new Venda("", $_POST['v_valor_total_venda'], $_POST['v_desconto'], $_POST['v_c_idCliente'], $_POST['iv_data_venda']);
            
            $resultado = $venda->inserir();
            header("location:indexVenda.php");
        }
        else
            
            $venda = new Venda($_POST['v_idVenda'], $_POST['v_valor_total_venda'], $_POST['v_desconto'], $_POST['v_c_idCliente'], $_POST['iv_data_venda']);
            $resultado = $venda->editar($v_idVenda);
            header("location:indexVenda.php");        
    }

//Consultar dados
function buscarDados($v_idVenda){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM Venda WHERE v_idVenda = $v_idVenda");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['v_idVenda'] = $linha['v_idVenda'];
        $dados['v_valor_total_venda'] = $linha['v_valor_total_venda'];
        $dados['v_desconto'] = $linha['v_desconto'];
        $dados['v_c_idCliente'] = $linha['v_c_idCliente'];
        $dados['iv_data_venda'] = $linha['iv_data_venda'];

    }
    //var_dump($dados);
    return $dados;
}

function exibir($chave, $dados){
    $str = 0;
    foreach($dados as $linha){
        $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
    }
    return $str;
}

function lista_pessoa($id){
    $cliente = new Cliente("","","","");
    $lista = $cliente->buscar($id);
    return exibir(array('c_idCliente', 'c_nome'), $lista);

}

function listarVenda($v_idVenda, $oi){
    echo "$oi";
}

    
?>