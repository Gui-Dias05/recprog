<!DOCTYPE html>
<?php
    include_once "acaoAutor.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $a_idAutor = isset($_GET['a_idAutor']) ? $_GET['a_idAutor'] : "";
    if ($a_idAutor > 0)
        $dados = buscarDados($a_idAutor);
}
    $title = "Cadastro de Autor";
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
    <div>
    <br>
        <h3>Insira os dados</h3><hr>
                <form method="post" action="acaoAutor.php">
                <div >

                <p>ID</p>
                    <input readonly  type="text" name="a_idAutor" id="a_idAutor"  value="<?php if ($acao == "editar") echo $dados['a_idAutor']; else echo 0; ?>"><br>

                <p>Nome</p>
                    <input name="a_nome" id="a_nome" type="text" required="true"  value="<?php if ($acao == "editar") echo $dados['a_nome']; ?>" placeholder="Digite o nome"><br>         
                
                <p>Sobrenome</p>
                    <input name="a_sobrenome" id="a_sobrenome" type="text" required="true"  value="<?php if ($acao == "editar") echo $dados['a_sobrenome']; ?>" placeholder="Digite o sobrenome"><br>
               
                    <button name="acao" value="salvar" id="acao" type="submit" >Salvar</button>
                        </div>
            </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>