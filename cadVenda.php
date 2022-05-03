<!DOCTYPE html>
<?php
    include_once "acaoVenda.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $v_idVenda = isset($_GET['v_idVenda']) ? $_GET['v_idVenda'] : "";
    if ($v_idVenda > 0)
        $dados = buscarDados($v_idVenda);
}
    $title = "Cadastro de Vendas";
    
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body >
<?php
require_once "index.php";    ?>
    <div>
    <br>
        <h3>Insira os dados</h3><hr>
                <form method="post" action="acaoVenda.php">
                <div >

                <p>ID</p>
                    <input readonly  type="text" name="v_idVenda" id="v_idVenda"  value="<?php if ($acao == "editar") echo $dados['v_idVenda']; else echo 0; ?>"><br>

                <p>Valor total</p>
                    <input name="v_valor_total_venda" id="v_valor_total_venda" type="numer" required="true"  value="<?php if ($acao == "editar") echo $dados['v_valor_total_venda']; ?>" placeholder="Digite o valor total da venda"><br>         
                
                <p>Valor do desconto</p>
                    <input name="v_desconto" id="v_desconto" type="number" required="true"  value="<?php if ($acao == "editar") echo $dados['v_desconto']; ?>" placeholder="Digite o desconto"><br>
                    
                <p> Escolha o cliente </p>
                    <select name="v_c_idCliente"  id="v_c_idCliente" >>
                        <?php
                        require_once ("acaoVenda.php");
                            echo lista_pessoa(0);
                        ?>
        </select>
                    <br>

                <p>Data da Venda </p>
                    <input name="iv_data_venda" id="iv_data_venda" type="text" required="true"  value="<?php if ($acao == "editar") echo $dados['iv_data_venda']; ?>" placeholder="Digite a data da venda"><br>
        
                    <button name="acao" value="salvar" id="acao" type="submit" class="btn btn-outline-secondary">Salvar</button>
                        </div>
            </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>