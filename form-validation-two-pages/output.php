<?php
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);    
    $sex_at_birth = $_POST["sex_at_birth"];
        
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $sex_at_birth;
?>
