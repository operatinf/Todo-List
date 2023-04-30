<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="To-Do List made in PHP and MySQL Database // Lista To-Do stworzona w PHP i bazie danych MySQL">
    <meta name="keywords" content="To-Do List, PHP, MySQL, OOP, CSS, CRUD">
    <link rel="stylesheet" href="todo.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Lista To-Do</title>
    <style>
        .material-symbols-outlined {
            text-decoration: none;
            text-align: center;
            color: white;
            font-size: 1.1rem;
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
</head>

<body>
    <div id="blur"></div>
    <div id="container">
        <a href="create.php" tabindex="-1">
            <button id="add-task">Nowy To-Do</button>
        </a>
        <?php
        include "classes.php";
        $read = new Crud();
        $todos = $read->read_all();

        if (!empty($todos)) {
            foreach ($todos as $task) {
        ?>
                <div class="todo-item">
                    <span class="todo-text">
                        <?php
                        echo $task['todo'];
                        ?>
                    </span>
                    <div class="separate-icons">
                        <p class="todo-date"><?php echo date_format(date_create($task['reg_date']), "d.m.Y \\o H:i"); ?></p>
                        <div>
                            <a class="task-crud material-symbols-outlined" href="read.php?id=<?php echo $task['id']; ?>">read_more</a>
                            <a class="task-crud material-symbols-outlined" href="update.php?id=<?php echo $task['id']; ?>">update</a>
                            <a class="task-crud material-symbols-outlined" href="delete.php?id=<?php echo $task['id']; ?>">delete</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>