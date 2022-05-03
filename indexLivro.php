<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    $title = "Consulta de Livros";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $busca = isset($_POST['busca']) ? $_POST['busca'] : 1;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script>
        function excluir(url){
            if (confirm("Deseja excluir o item?"))
                location.href = url;
        }
    </script>
</head>
<body >
    <?php
        include_once "index.php";
    ?>
    <div >
        <div >
            <form method="post">
                <div >
                    <h3>Procurar Livro</h3>
                        <input type="text" name="procurar"  size="50"
                        placeholder="Insira a consulta" value="<?php echo $procurar;?>">
                    <br>
                
                    <p>Ordenar e pesquisar por:</p>
                        <input type="radio" name="busca" value="1" <?php if ($busca == "1") echo "checked" ?>> Id<br>
                        <input type="radio" name="busca" value="2" <?php if ($busca == "2") echo "checked" ?>> Titulo<br>
                        <input type="radio" name="busca" value="3" <?php if ($busca == "3") echo "checked" ?>> ISBN<br>
                    <br>
                        <button type="submit" name="acao" id="acao" >Buscar</button>
                    
                </div>
                <hr>
            </form>

            <table class="table table-hover">
            <tr><td><b>ID</b></td>
                <td><b>Título</b></td>
                <td><b>Ano de Publicação</b></td>
                <td><b>ISBN</b></td>
                <td><b>Preço</b></td>
                <td><b>Editar</b></td>
                <td><b>Excluir</b></td>
            </tr> 

        <?php
            $pdo = Conexao::getInstance();

            if($busca == 1){
                $consulta = $pdo->query("SELECT * FROM Livro
                                        WHERE l_idLivro LIKE '$procurar%' 
                                        ORDER BY l_idLivro");}

            else if($busca == 2){
                $consulta = $pdo->query("SELECT * FROM Livro
                                        WHERE l_titulo LIKE '$procurar%' 
                                        ORDER BY l_titulo");}

            else if($busca == 3){
                $consulta = $pdo->query("SELECT * FROM Livro 
                                        WHERE l_isdn LIKE '$procurar%'
                                        ORDER BY l_isdn");}
        
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        ?>
        <tr><td><?php echo $linha['l_idLivro'];?></td>
            <td><?php echo $linha['l_titulo'];?></td>
            <td><?php echo $linha['l_ano_publicacao'];?></td>
            <td><?php echo $linha['l_isdn'];?></td>
            <td><?php echo number_format ($linha['l_preco'], 2, ',', '.');?></td>
            <td><a href='cadLivro.php?acao=editar&l_idLivro=<?php echo $linha['l_idLivro'];?>'> <img src="img/edit.svg" style="width: 1.8vw;"></a></td>
            <td><?php echo " <a href=javascript:excluir('acaoLivro.php?acao=excluir&l_idLivro={$linha['l_idLivro']}')>";?><img src="img/delete.svg" style="width: 1.5vw;"></a></td>
        </tr>

        <?php } ?>
            
            </table>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>