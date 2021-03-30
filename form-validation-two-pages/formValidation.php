<html>
    <head>
        <title>Sample Form Validation</title>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>

    <body>  
   
    <?php
        // define variables and set to empty values
        $nameErr = $emailErr = $sex_at_birth_err = "";
        $name = $email = $sex_at_birth  = "";
        $success = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                $success = true;
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameErr = "Only letters and white space allowed"; 
                    $success = false;
                }
            }
        
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                $success = true;
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format"; 
                    $success = false;
                }
            }

            if (empty($_POST["sex_at_birth"])) {
                $sex_at_birth_err = "Sex Assigned at Birth is required";
            } else {
                $sex_at_birth = $_POST["sex_at_birth"];
                $success = true;
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if($success === true){
            header("Location: output.php", true, 307);
        }
    ?>

    <h2>Form Validation</h2>
    <p><span class="error">* required field.</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        
        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        
        Sex Assigned at Birth:
        <input type="radio" name="sex_at_birth" <?php if (isset($sex_at_birth) && $sex_at_birth=="female") echo "checked";?> value="female">Female
        <input type="radio" name="sex_at_birth" <?php if (isset($sex_at_birth) && $sex_at_birth=="male") echo "checked";?> value="male">Male
        
        <span class="error">* <?php echo $sex_at_birth_err;?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">  
    </form>

    

    </body>
</html>