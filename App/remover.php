<?php

if(isset($_POST['id'])){
    require(__DIR__ . "\..\config.php");

    $id = $_POST['id'];

    if(empty($id)){
       echo 0;
    }else {
        $pdo = conectar();
        $del = $pdo->prepare("DELETE FROM todos WHERE id=?");
        $res = $del->execute([$id]);

        if($res){
            echo 1;
        }else {
            echo 0;
        }
        $pdo = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}