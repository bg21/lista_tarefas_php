<?php

if (isset($_POST['id'])) {
    require(__DIR__ . "\..\config.php");

    $id = $_POST['id'];

    if (empty($id)) {
        echo 'error';
    } else {
        $pdo = conectar();
        $todos = $pdo->prepare("SELECT id, checked FROM todos WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $editar = $pdo->prepare("UPDATE todos SET checked=? WHERE id = ?");
        $editar->execute([$uChecked, $uId]);
        if ($editar) {
            echo $checked;
        } else {
            echo "error";
        }
        $pdo = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
}
