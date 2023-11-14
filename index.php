<?php
include_once 'config/config.php';
include_once 'classes/Crud.php';
$crud = new Crud($db);
$data = $crud->read();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Exemplo de CRUD</title>
</head>

<body>
    <h1>Exemplo de CRUD</h1>
    <a href="add.php">Adicionar Usuário</a>
    <table>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
        <?php

        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $row["nome"]; ?></td>
                <td><?php echo $row["idade"]; ?></td>
                <td> <a href="edit.php?id=<?php echo $row['ID']; ?>" >Editar</a> 
                    <a href="delete.php?id=<?php echo $row['ID']; ?>">Excluir</a> 
                </td>
            </tr> 
        <?php } ?>

    </table>
</body>

</html>