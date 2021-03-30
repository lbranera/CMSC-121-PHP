<!-- Please upload in AGILA. This will not work in localhost. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

<?php
    if( !empty($_POST["email"]) ){
        $to = $_POST["email"];
        $subject = "PHP Mailer";

        $message = "
        <html>
            <body>
            <h1>Mail sent.</h1>
            </body>
        </html>";


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <onlinestore@gmail.com>' . "\r\n";
        $headers .= 'Cc: dummy@gmail.com' . "\r\n";

        if(mail($to, $subject, $message,$headers)){
            // Alert component from Bootstrap. 
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Message sent!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }else{
            // Alert component from Bootstrap. 
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Message not sent!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }
    }
    
    $email = "";

    if(isset($_POST["email"])){
        $email = $_POST["email"];
    }
?>

<br>
<div class="container">
    <h3>Simple Mail PHP</h3>
    <br>
    <form action="simpleMail.php" method="post">
        <label class="form-label">Enter Email Address:</label>
        <input type="email" name="email" class="form-control" value="<?php echo $email ?>" >
        <br>
        <button type="submit" name="submit" class="btn btn-outline-success">Send</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>