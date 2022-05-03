<!DOCTYPE html>
<?php
    include_once "acaoLivro_Autor.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $la_l_idLivro = isset($_GET['la_l_idLivro']) ? $_GET['la_l_idLivro'] : "";
        $la_a_idAutor = isset($_GET['la_a_idAutor']) ? $_GET['la_a_idAutor'] : "";
    if ($la_l_idLivro > 0)
        $dados = buscarDados($la_l_idLivro);
}
    $title = "Cadastro de Livros e Autores";
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
require_once "index.php";?>
        <h3>Insira os dados</h3><hr>
                <form method="post" action="acaoLivro_Autor.php">
                <div >
                    
                <p> Escolha o livro </p>
                    <select name="la_l_idLivro"  id="la_l_idLivro" >
                        <?php
                        require_once ("acaoLivro_Autor.php");
                            echo listarLivro(0);
                        ?>
        </select>
                    <br>
                    <p> Escolha o autor </p>
                    <select name="la_a_idAutor"  id="la_a_idAutor" >
                        <?php
                        require_once ("acaoLivro_Autor.php");
                            echo listarAutor(0);
                        ?>
        </select>
                
                    <button name="acao" value="salvar" id="acao" type="submit" >Salvar</button>
                        </div>
            </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>