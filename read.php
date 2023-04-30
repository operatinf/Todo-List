<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" type="text/css" href="crud.css">
    <title>Opis To-Do</title>
    <style>
        .material-symbols-outlined {
            text-decoration: none;
            text-align: center;
            color: white;
            font-size: 2rem;
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
    <div>
        <div id="container">
            <?php
            include "classes.php";
            $read = new Crud();
            $todos = $read->read_single();
            if (!empty($todos)) {
                foreach ($todos as $task) {
            ?>
                    <div class="todo-text">

                        <span>Do zrobienia</span>
                        <p>
                            <?php echo $task['todo']; ?>
                        </p>
                    </div>
                    <div class="todo-comments">
                        <span>Uwagi</span>
                        <p>
                            <?php echo $task['comments']; ?>
                        </p>
                    </div>
                    <div class="todo-date">
                        <span>Utworzone</span>
                        <p>
                            <?php echo date_format(date_create($task['reg_date']), "\\D\\n\\i\\a d.m.Y \\o \\g\\o\\d\\z\\i\\n\\i\\e H:i:s"); ?>
                        </p>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div>
            <a class="task-crud material-symbols-outlined" href="index.php">keyboard_return</a>
        </div>
    </div>
</body>

</html>