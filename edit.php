<?php
    include_once 'config/config.php';
    include_once './classes/Crud.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $Crud = new Crud($db);
        $user = $Crud->readEdit($id)->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            header('Location: index.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];

            $Crud->update($id, $nome, $idade);

            header('Location: index.php');
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-align: center;
            color: #007BFF;
            text-decoration: none;
            border: 1px solid #007BFF;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $user['nome']; ?>" required><br>

        <label for="idade">Idade:</label>
        <input type="text" name="idade" value="<?php echo $user['idade']; ?>" required><br>

        <input type="submit" value="Salvar">
    </form>
    <a href="index.php">Voltar para a tela inicial</a>
</body>
</html>