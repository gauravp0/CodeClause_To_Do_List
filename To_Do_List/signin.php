<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/master.css"/>
        <meta charset="UTF-8"/>
        <title>To Do List </title>
    </head>
    <body>
        <form method="post" action="authentication.php">
            <label for="username"><span>*</span>Username:</label>
            <input type="text" name="username" id="username" required/>
            <br/>
            <label for="password"><span>*</span>Password:</label>
            <input type="password" name="password" id="password" required/>
            <br/>
            <input type="submit" value="Sign in" name="submit"style="display:block;margin:auto;" />
            <?php
            if(isset($_GET['message']))
            {
                echo $_GET['message'];
            }
            ?>
        </form>
    
        <?php include("footer.php") ?>
        <script src="JS/form validation.js"></script>
        
    </body>
</html>