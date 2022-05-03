<!DOCTYPE html>
<?php
    include_once "acaoItem_venda.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $iv_v_idVenda = isset($_GET['iv_v_idVenda']) ? $_GET['iv_v_idVenda'] : 0;
        $iv_l_idLivro = isset($_GET['iv_l_idLivro']) ? $_GET['iv_l_idLivro'] : 0;
    if ($iv_v_idVenda > 0)
        $dados = buscarDados($iv_v_idVenda);
}
    $title = "Cadastro de Itens";
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

<body>
<?php
require_once "index.php";    ?>
    <div >
    <br>
        <h3>Insira os dados</h3>
                <form method="post" action="acaoItem_venda.php">
                <div >
                    
                <p> Id da Venda </p>
                    <select name="iv_v_idVenda"  id="iv_v_idVenda" >>
                        <?php
                        require_once ("acaoItem_venda.php");
                            echo listarVenda(0);
                        ?>
                </select>
                    <br>
                    
                    <p>Título do Livro </p>
                    <select name="iv_l_idLivro"  id="iv_l_idLivro" >>
                        <?php
                        require_once ("acaoItem_venda.php");
                            echo listarLivro(0);
                        ?>
                    </select>

                <p>Quantidade</p>
                    <input name="iv_quantidade" id="iv_quantidade" type="number" required="true" value="<?php if ($acao == "editar") echo $dados['iv_quantidade']; ?>" placeholder="Digite a quantidade"><br>         
                
                <p>Valor total</p>
                    <input name="iv_valor_total_item" id="iv_valor_total_item" type="number" required="true"  value="<?php if ($acao == "editar") echo $dados['iv_valor_total_item']; ?>" placeholder="Digite o valor total"><br>         
                
  
                
                    <button name="acao" value="salvar" id="acao" type="submit" >Salvar</button>
                        </div>
            </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>