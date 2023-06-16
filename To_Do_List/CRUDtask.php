<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
Class taskhandler
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

    function view()
    {
        $query ="select id, task from task where user='". $_SESSION["loggeduser"]."'";
        $result = mysqli_query($this->conn,$query);
        $num = mysqli_num_rows($result);
        for($i=1; $i<=$num; $i++)
         {
            $row = mysqli_fetch_row($result);
            
            echo "<li id=$row[0]>$row[1]<input type=button value='update' onclick=update($row[0]) /> <input type=button value='delete' onclick=Delete($row[0]) />  </li>";
 
         }
    }  

    function add()
    {
       $query ="insert into task (task , user) values('".$_POST["task"]."','". $_SESSION["loggeduser"]."')";
       if(mysqli_query($this->conn,$query))
       {
        echo "Task Added";
       }
    }

    function update()
    {
        $query ="update task set task ='".$_POST["task"]."' where id='".$_REQUEST["id"]."'";
        mysqli_query($this->conn,$query);
    }

    function delete()
    {
       $query ="delete from task where id=".$_REQUEST["id"];
       if(mysqli_query($this->conn,$query))
       {
        echo "Task Deleted";
       }

    }

}

function logout()
{
    session_unset();
    session_destroy(); 
    header("Location: index.html");
}

$taskH = new taskhandler();
if(isset($_REQUEST["event"]))
{
    switch($_REQUEST["event"])
{
    case "logout":
        logout();
        break;

    case "add":
        $taskH-> add();
         break;

    case "update":
       $taskH-> update();  
        break;

    case "delete":
        $taskH->delete();
        break;

        case "view":
            $taskH->view();
            break;

    default:
        echo "default";    
}
}
?>