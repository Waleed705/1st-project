<?php

session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "1st";

    // create conection
    $conn = new mysqli($servername,$username,$password,$dbname);

    // check connection
    if($conn->connect_error    ){
        die("connection fail!" . mysqli_connect_error());
    }


    // create table

    $table = "CREATE TABLE IF NOT EXISTS members(
    id int (8) UNSIGNED auto_increment primary key,
    fname varchar (30) NOT NULL,
    email varchar (30) NOT NULL,
    mpassword varchar (255) NOT NULL,
    gender varchar(10) NOT NULL,
    country varchar(50) NOT NULL)";
    if( !$conn->query($table)){
        echo "table not created!" . mysqli_error($conn);
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if( is_array($data) && isset($data['form']) && $data['form'] == 'login' ){
            $error_meesage = array();
            if ( empty( $data['name'] ) ) {
                $error_meesage[] = "Name is required";
            } else {
                $name1 = $data['name'];
            }
            if ( empty( $data['email'] ) ) {
                $error_meesage[] = "Email is required";
                $email1 = '';   
            } else {
                $email1 = $data['email'];
                if(!filter_var($email1 . FILTER_VALIDATE_EMAIL)){
                    $error_meesage[] = "Please insert a valid Email.";
                    
                }

            }
            if ( empty( $data['password'] ) ) {
                $error_meesage[] = "Password is required";
            } else {
                $password = $data['password'];
                if ( strlen( $password ) != 8 ) {    // 12345667890                 ( 11 < 8 ) 
                    $error_meesage[] = "Password must be at least 8 characters.";
                }
            }
            if(empty($data['gender'])){
                $error_meesage[] = "Gender is required";
            }else{
                $gender = $data['gender'];
                
            }
            if(empty($data['country'])){
                $error_meesage[] = "country is required";
            }else{
                $country = $data['country'];
            }

            $check = "SELECT * FROM members WHERE email = '$email1'";  // 
            $result3 = $conn->query($check);
            if($result3->num_rows > 0) {   //
                $error_meesage[] = "Email is already taken.";
            }
            if(!empty($error_meesage)){
                print_r(json_encode($error_meesage));
                die();
            }
            $sql = "INSERT INTO members(fname,email,mpassword,gender,country)  VALUES ('$name1','$email1','$password','$gender','$country')";
            $user = $conn->query($sql);
            if ( $user ) {
                print_r('ok');
                die();
            }
        }

        if( is_array($data) && isset($data['form']) && $data['form'] == 'update' ){
            $error_meesage = array();
            $user_id = $data['user_id'];
            if ( empty( $data['name'] ) ) {
                $error_meesage[] = "Name is required";
            } else {
                $name1 = ( $data['name'] );
            }
            if ( empty( $data['email'] ) ) {
                $error_meesage[] = "Email is required";
            } else {
                $email1 = $data['email'];
            }
            if ( empty( $data['password'] ) ) {
                $error_meesage[] = "Password is required";
            } else {
                $password = $data['password'];
            }
            if(empty($data['gender'])){
                $error_meesage[] = "Gender is required";
            }else{
                $gender = $data['gender'];
                
            }
              if(empty($data['user_id'])){
                $error_meesage[] = "user_id is required";
            }else{
                $user_id = $data['user_id'];
                
            }
            if(empty($data['country'])){
                $error_meesage[] = "country is required";
            }else{
                $country = $data['country'];
            }
            $check = "SELECT * FROM members WHERE email = '$email1'";  // 
            $result3 = $conn->query($check);
            if($result3->num_rows > 0) {   //
                $error_meesage[] = "Email is already taken.";
            }
            if(!empty($error_meesage)){
                print_r(json_encode($error_meesage));
                die();
            }
            $stmt = $conn->prepare("UPDATE members SET fname = ?, email = ?, mpassword = ?, gender = ?, country = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $name1, $email1, $password, $gender, $country, $user_id);
            if ($stmt->execute()) {
                $_SESSION['user']['fname'] = $name1;
                $_SESSION['user']['email'] = $email1;
                $_SESSION['user']['password'] = $password;
                $_SESSION['user']['gender'] = $gender;
                $_SESSION['user']['country'] = $country;
                $_SESSION['user']['user_id'] = $user_id;
                $error_meesage[] = "Record updated successfully";
            if(!empty($error_meesage)){
                print_r(json_encode($error_meesage));
                die();
            }
            } else {
                echo "Error updating record: " . $stmt->error;
            }
            $conn->close();
        }
    }
    if( is_array($data) && isset($data['form']) && $data['form'] == 'signin'){
        $error_meesage = array();
        if ( empty( $data['email'] ) ) {
            $error_meesage[] = "Email is required";
        } else {
            $email = $data['email'];
        }
        if ( empty( $data['password'] ) ) {
            $error_meesage[] = "Password is required";
        } else {
            $password = $data['password'];
        }
        if(!empty($error_meesage)){
            print_r($error_meesage);
            die();
        }
        $sql1 = "SELECT * FROM members WHERE email = '$email' AND mpassword = '$password' ";
        $result = $conn->query($sql1);
        if($result->num_rows>0){
            $user = $result->fetch_assoc();
            $_SESSION["user"] = $user;
            print_r('success');
            die();
            // header("Location: http://localhost/php/project/1st-services.php");
        }else{
            echo "Invalid email or password!";
            if(!empty($error_meesage)){
                print_r(json_encode($error_meesage));
            }
            die();
        }
    }
   
    ?>