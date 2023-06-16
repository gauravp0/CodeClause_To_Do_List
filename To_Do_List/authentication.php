<?php
session_start();
class Authentication
{
    private $servername ;  private $userName;
    private $password; private $DBName;
    private $conn;

    public function __construct()
    {
        $this->servername = "localhost:3307";
        $this->userName = "salma";
        $this->password = "salma7";
        $this->DBName = "todolist";
        $this->conn =mysqli_connect($this->servername,$this->userName,$this->password,$this->DBName);
        if(!$this->conn)
        {
           die("connection failed: ".mysqli_connect_error());  
        }
    }

    function signup()
    {
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        if($this->checkUserName())
        {
            $query ='insert into  user values("'.$firstname.'","'.$lastname.'","'.$username.'","'.$password.'")';
           if( mysqli_query($this->conn,$query)) echo "user created successfully";
        }
        else
        {
            echo "Username already exists <br> choose another one";
        }
        
    }

    function checkUserName()
    {
        $username = $_POST["username"];
        $result = mysqli_query($this->conn, "select * from user where username ='".$username."'");
        if(mysqli_num_rows($result) == 0) return true;
        else return false;
    }

    function signin()
    {
        $username=$_POST["username"];
        $password=$_POST["password"];
        $result = mysqli_query($this->conn, "select firstname, lastname from user where username ='".$username."'AND password='".$password."'");
        if(mysqli_num_rows($result) != 0)
        {
            $_SESSION["loggeduser"]=$username;
            $row = mysqli_fetch_row($result);
            header("location: profile.php?firstname=".$row[0]."&lastname=".$row[1]);
        } 
        else
        {
            $message ="username or password is wrong";
            header("location: signin.php?message=".$message);

        }
    }
}

$au = new Authentication();

switch($_REQUEST["submit"])
{
    case "signup":
    {
            $au->signup();
            break;
    }
    case "Sign in":
    {
        $au->signin();

        break;
    }  
    default:
    {
        echo "default";
    }

}

?>