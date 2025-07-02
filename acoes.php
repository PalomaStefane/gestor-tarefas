<?php

require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'] ??'';

    if($action === 'create'){
        $description = $_POST['description'] ??'';
        if(!empty($description)){
            $stmt = $pdo->prepare('INSERT INTO tasks(description) VALUES (?)');
            $stmt->execute([$description]);
        }
    }

    elseif($action === 'delete'){
        $id = $_POST['task_id'] ?? 0;
        if($id > 0){
            $stmt = $pdo->prepare('DELETE FROM tasks WHERE id=?');
            $stmt -> execute([$id]);
        }
    }
}
header('Location: index.php');
exit();