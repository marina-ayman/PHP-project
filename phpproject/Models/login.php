<?php

SESSION_start();

include "db-conn.php";
 

$username=$_POST["username"];
$password=$_POST["password"];

class  loggin{

    public function validation($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);

        return $data;
    }


    private function loggin_valid($username,$password){

        if(isset($username) && isset($password)){

            $uname = $this->validate($username);
            $pass = $this->validate($password);
        
            if (empty($uname)) {
                header("Location: ./index.php?error=User Name is required");
                exit();
        
            }else if(empty($pass)){
        
                header("Location: ./index.php?error=Password is required");
        
                exit();
        
            }else{
        
                $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
        
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) === 1) {
        
                    $row = mysqli_fetch_assoc($result);

                    if ($row['user_name'] === $uname && $row['password'] === $pass) {
        
                        // echo "Logged in!";

                        $_SESSION['username'] = $row['user_name'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['id'] = $row['id'];
        
                        if(!empty($_POST['Remember'])){
                            setcookie('Name',$row['user_name'],time()+3600*24*30);
                            setcookie('Password',$row['password'],time()+3600*24*30);
                        }else{
                            if(isset($_COOKIE['Name'])) {  setcookie('Name','') ;}
                            if(isset($_COOKIE['Password'])) {  setcookie('Password','') ;}
                        }


                        header("Location: ./download.php");
        
                        exit();
        
                    }else{
        
                        header("Location: index.php?error=Incorect User name or password");
        
                        exit();
        
                    }
        
                }else{
        
                    header("Location: index.php?error=Incorect User name or password");
        
                    exit();
        
                }
        
            }
        
        }else{
        
            header("Location: index.php");
        
            exit();
        
        }
 
    }

}













