<?php 

    $errors = "";
    $db = mysqli_connect('localhost', 'root', '', 'todo');

    if (isset($_POST['submit'])){
        $task = $_POST['task'];
        $duration = $_POST['duration'];

        if (empty($task)){
            $errors = "Er is geen waarde ingevoerd";
        }else if(empty($duration)){
            $errors = "Er is geen waarde ingevoerd";
        }else{
            mysqli_query($db, "INSERT INTO tasks (task, duration) VALUES ('$task', '$duration')");
            header('location: index.php');
        }
    }

    if (isset($_GET['del_task'])){
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: index.php');
    }

    $tasks = mysqli_query($db, "SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TodoLijst</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="heading">
        <h2>
            TodoLijst
        </h2>
    </div>

    <form action="index.php" method="POST">
    <?php  
        if(isset($errors)){ 
    ?>
        <p><?php echo $errors; ?></p>
    <?php   
        }  
    ?>

        <input type="text" name="task" class="task_input">
        <input type="number" name="duration" class="duration_input">
        <button type="submit" class="add_btn" name="submit"> add task</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
                while ($row = mysqli_fetch_array($tasks)){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td class="task"><?php echo $row['task']; ?></td>
                <td class="duration"><?php echo $row['duration']; ?></td>
                <td class="delete"><a href="index.php?del_task=<?php echo $row['id'] ?>">X</a></td>
            </tr>
            <?php
            $i++;
                } 
            ?>
        </tbody>
    </table>
</body>
</html>