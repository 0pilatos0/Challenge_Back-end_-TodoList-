<?php
    include_once 'connection.php';
    try
    {
         $database = new Connection();
         $db = $database->openConnection();
         $sql = "DELETE FROM student WHERE `id` = 8" ;
         $affectedrows  = $db->exec($sql);
       if(isset($affectedrows))
        {
           echo "Record has been successfully deleted";
        }          
    }
    catch (PDOException $e)
    {
       echo "There is some problem in connection: " . $e->getMessage();
    }
    ?>