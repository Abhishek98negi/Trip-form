<?php
    $insert = false;

    if(isset($_POST['name'])){
        $server="localhost";
        $username="root";
        $password="";

        $con=mysqli_connect($server,$username,$password);

        if(!$con){
            die("connection to this database failed due to".mysqli_connect_error());
        }
        // echo "successfully connecting to DB";

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $other = $_POST['other'];

        $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

        // echo $sql;

        if($con->query($sql)==true){
            // echo "successfully inserted.";
            $insert = true;

        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }

        $con->close();

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Roboto:ital@1&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="trip.jpg" alt="background image">
    <div class="container">
        <h1>College Trip form</h1>
        <?php
            if($insert){ echo"<p class='submitMSG'>Thanks for submitting the form</p>";} 
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="your name...">
            <input type="text" name="age" id="age" placeholder="your age...">
            <input type="text" name="gender" id="gender" placeholder="your gender...">
            <input type="email" name="email" id="email" placeholder="your email...">
            <input type="phone" name="phone" id="phone" placeholder="your phone...">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="other info..."></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

