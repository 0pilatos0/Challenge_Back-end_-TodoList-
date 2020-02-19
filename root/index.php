<?php   
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'todolist';

  $dsn = 'mysql:host='. $host . ';dbname='. $dbname;

  $pdo = new PDO($dsn, $user, $password); ?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TodoList || Home</title>
  </head>
  <body>
    <section>
      <?php 
        $stmt = $pdo->query('SELECT * FROM tasks');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo $row['task_id'];
          echo $row['task_name'] . "<br />"; 
        }
      ?>
    </section>
    <section>
      <form action="">
        <label for="fname">Item naam: </label><br />
        <input type="text" id="fname" value="John" /><br /><br />
        <input type="submit" value="Submit" />
      </form>
    </section>
  </body>
</html>
