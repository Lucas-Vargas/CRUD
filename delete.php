<?php
    include_once("./Config/Config.php");
    include_once("./Classes/Crud.php");

    if(isset($_GET['id'])){
        $ID=$_GET['id'];
        $CRUD= new Crud($db);
        $CRUD->delete($ID); 
        echo'Regitro excluido c/ sucesso';
        header("refresh:2, index.php");
    exit();
    }
?>