<?php
    $x = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <h1>Tela de Cadastro</h1>

    <form  method="POST">
        <input type="text" name="nome" placeholder="Insira o nome" required>
        <input type="number" name="idade" placeholder="Insira a idade" required>
        <input type="submit" value="salvar" name="salvar">
    </form>
    <?php
    include_once("config/config.php");
    include_once("classes/Crud.php");
   
    if (isset($_POST['salvar'])) {
        $crud = new Crud($db);
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $crud->create($nome, $idade);
        header('refresh:3,index.php');
        exit();
    } ?>

</body>
 
</html>