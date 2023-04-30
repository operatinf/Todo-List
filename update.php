<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" type="text/css" href="crud.css">
    <title>Edytuj To-Do</title>
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
        $update = new Crud();
        $todos = $update->read_single();
        if (!empty($todos)) {
            foreach ($todos as $task) {
        ?>
                <form method="post" id="new-todo">
                    <div class="todo-form">
                        <label for="todo">Do Zrobienia</label>
                        <input type="text" name="todo" maxlength="60" autocomplete="off" value="<?php echo $task['todo']; ?>" id="todo">
                    </div>
                    <div class="todo-form">
                        <label for="comments">Uwagi</label>
                        <textarea name="comments" autocomplete="off" id="comments"><?php echo $task['comments']; ?></textarea>
                    </div>
                </form>
                <?php
            }
        }
        $update->update();
        ?>
    </div>
    <div class="has-submit">
        <a class="task-crud material-symbols-outlined" href="index.php">keyboard_return</a>
        <input form="new-todo" type="submit" name="submit" value="Zapisz" class="submit">
    </div>
    </div>
</body>

</html>