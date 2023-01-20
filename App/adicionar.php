<?php

if(isset($_POST['title'])){
   require(__DIR__."\..\config.php");

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $pdo = conectar();
        $data = date("Y-m-d H:i:s");
        $add = $pdo->prepare("INSERT INTO todos VALUES(null, ?, ?, ?)");
        $res = $add->execute([$title, $data, ""]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $pdo = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}