<?php

require_once "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = $_POST["action"];

    if($action == "register"){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        //check email alredy exits
        $sql = "SELECT id FROM users WHERE email ='$email' ";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            //echo "Email alredy exits";
            header("Location: signup.php?error=Email already exists");
            exit();
        }else{

            $username_check = "SELECT id FROM users WHERE username = '$username' ";
            $result2 = $conn->query($username_check);

            if(!$result2->num_rows > 0){

                if(!empty($password)){
                    if($password == $repassword){

                    //password hash
                    $hash_password = password_hash($password, PASSWORD_DEFAULT);

                    $sql2 = "INSERT INTO users (username,email,password,name) VALUES(?,?,?,?)";

                    $save_data = $conn->prepare($sql2);
                    $save_data->bind_param("ssss",$username,$email,$hash_password,$name);

                    if($save_data->execute()){
                    // echo "user add successfull";
                    header("Location: ../index.php");
                        exit();
                    }else{
                        echo "Fail to create account";
                    }
                

                    }else{
                    //echo "not same";
                    header("Location: signup.php?error=Password not equal! Try agan.");
                    exit();
                }
                }else{
                    //echo "password not";
                    header("Location: signup.php?error=Password is empty! Try agan");
                    exit();
                }
            }else{
               // echo "username alredy exits.";
               header("Location: signup.php?error=Username alredy exits.Try another username.");
               exit();
            }
        }
        
    }
}















?>