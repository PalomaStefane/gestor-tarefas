<?php 
    require_once 'config.php';

    $stmt = $pdo->query('SELECT * FROM `tasks` ORDER BY created_at DESC;');
    $tasks = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestor de Tarefas</h1>
        
        
        <ul class="task-list">
            <?php if(count($tasks) > 0): ?>
                <?php foreach($tasks as $task): ?>
                    <li 
                    class="task-item <?= $task['is_completed'] ? 'completed' : '' ?>"
                    data-task-id="<?= $task['id']?>"
                    >
                    <span class="task-description">
                        <?= htmlspecialchars($task['description']) ?>
                    </span>
                    <div class="task-actions">
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="task_id" value="<?= $task['id']?>">
                            <button type="submit" class="btn-icon btn-delete" title="Excluir Tarefa">×</button>
                        </form>
                    </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="no-tasks">Nenhuma tarefa foi encontrada. Adicione uma nova tarefa!</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>