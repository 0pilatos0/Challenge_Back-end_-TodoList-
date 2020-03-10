<?php
    include_once 'connection.php';
    try
    {
        $database = new Connection();
        $db = $database->openConnection();
        // inserting data into create table using prepare statement to prevent from sql injections
        $stm = $db->prepare("INSERT INTO student (ID,name,last_name,email) VALUES ( :id, :name, :lastname, :email)") ;
        // inserting a record
        $stm->execute(array(':id' => 0 , ':name' => 'Saquib' , ':lastname' => 'Rizwan' , ':email' => 'saquib.rizwan@cloudways.com'));
        echo "New record created successfully";
    }
    catch (PDOException $e)
    {
        echo "There is some problem in connection: " . $e->getMessage();
    }
    ?>