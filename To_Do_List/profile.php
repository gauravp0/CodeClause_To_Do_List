<?php
session_start();
require("CRUDtask.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="CSS/master.css"/>
    </head>
    <body>
        <form method=POST > 
        <?php
        if(isset($_GET["firstname"]) &&isset($_GET["lastname"]))
        {
            echo "<p>Hello ". $_GET["firstname"]." ". $_GET["lastname"].'  <a href="CRUDtask.php?event=logout"><input type=button name=logout value="Log out" style="display:inline-block;" /></a></p>';
        }
        ?>    
        <p></p>
        <textarea name="task" id=task placeholder="Enter the task here" rows=1 cols=95 style="resize: none;" ></textarea>
        <input type="button" value="add" name="add" onclick="insert()" /> 
        <br/><span id=message style="color: #0e81ab">    </span>
        <p>When you want to update a task enter the new task in the following text box and enter the update button next to the old task</p>
        <textarea name="task" id=updatedTask placeholder="Enter the updated task here" rows=1 cols=95 style="resize: none;" ></textarea>
        <ul>
        <?php $task = new taskHandler(); $task->view();?>
        </ul>
        </form>
        <?php include("footer.php") ?>
            <script src="JS/ajax.js"></script>
    </body>
</html>





