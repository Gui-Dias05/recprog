<!DOCTYPE html>
<?php
    include_once "acaoLivro.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $l_idLivro = isset($_GET['l_idLivro']) ? $_GET['l_idLivro'] : "";
    if ($l_idLivro > 0)
        $dados = buscarDados($l_idLivro);
}
    $title = "Cadastro de Livro";
    // var_dump($dados);
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
        require_once "index.php";
    ?>
    <div >
    <br>
        <h3>Insira os dados</h3><hr>
                <form method="post" action="acaoLivro.php">
                <div >

                <p>ID</p>
                    <input readonly  type="text" name="l_idLivro" id="l_idLivro"  value="<?php if ($acao == "editar") echo $dados['l_idLivro']; else echo 0; ?>"><br>

                <p>Título</p>
                    <input name="l_titulo" id="l_titulo" type="text" required="true"  value="<?php if ($acao == "editar") echo $dados['l_titulo']; ?>" placeholder="Digite o titulo"><br>         
                
                <p>Ano de publicação</p>
                    <input name="l_ano_publicacao" id="l_ano_publicacao" type="number" required="true"  value="<?php if ($acao == "editar") echo $dados['l_ano_publicacao']; ?>" placeholder="Digite o ano de publicação"><br>
                    
                <p>ISBN</p>
                    <input name="l_isdn" id="l_isdn" type="text" required="true"  value="<?php if ($acao == "editar") echo $dados['l_isdn']; ?>" placeholder="Digite o ISBN"><br>         
                    
                <p>Preço</p>
                    <input name="l_preco" id="l_preco" type="text" required="true"  value="<?php if ($acao == "editar") echo $dados['l_preco']; ?>" placeholder="Digite o preço"><br>         
                    
                    
                    <button name="acao" value="salvar" id="acao" type="submit" >Salvar</button>
                        </div>
            </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>