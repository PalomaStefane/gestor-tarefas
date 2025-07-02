<?php

require_once 'config.php'

header('Content-type: application?json')

$data = json_decode( file_get_contents('php://input'), true);
$id = $data['id']?? 0;

if ($id > 0){
    try{
        $stmt = $pdo -> prepare ( 'UPDATE tasks SET is_completed = NOT is_completed WHERE id = ?');
        $stmt -> execute ([$id]);
        echo json_decode(['status' => 'sucess']);
   } catch (PDOException $e) {
    echo json_decode(['status' => 'error', 'message' => $e -> getMessage ()]);
   }
}else {
    echo json_decode(['status' => 'error', 'message' => 'ID de tarefa inválido']);

}
