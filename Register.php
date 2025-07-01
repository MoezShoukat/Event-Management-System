<?php

include 'connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        
        $stmt = $conn->prepare("SELECT COUNT(*) FROM info WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close(); 

        if ($count > 0) {
            header("location: same.html");
        } else {
           
            $stmt = $conn->prepare("INSERT INTO info (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) {
                header("location: lands.php");
            } else {
                echo "Error: " . $stmt->error; 
            }

            $stmt->close(); 
        }
    } elseif (isset($_POST['login'])) {
        // Login logic
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT password FROM info WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result(); 
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header("location: event.php");
             
        } 
        else {
            header("location: Error.html");
        }

        $stmt->close(); 
    }
}

$conn->close();
?>