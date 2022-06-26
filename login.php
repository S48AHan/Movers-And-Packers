<!DOCTYPE html>
<html lang="en">

<head>
    <title>Movers and Packers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="header">


    <!--Check whether SignUp fields are filled or not-->
    <?php

    $username = $userId = $emailId = $userpassword = "";
    if (isset($_POST["signIn_submit"])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = test_input($_POST["sign_user_name"]);

            $userId = test_input($_POST["sign_user_id"]);

            $emailId = test_input($_POST["sign_email"]);

            $userpassword = test_input($_POST["sign_pass"]);
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        return $data;
    }


    ?>

    <?php

    $logUserId = $loguserPass = "";
    if (isset($_POST["logIn_submit"])) {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $logUserId  = test_userinput($_POST["log_user_id"]);

            $loguserPass = test_userinput($_POST["log_pass"]);
        }
    }
    function test_userinput($data)
    {
        $data = trim($data);
        return $data;
    }
    ?>

    <!--Creating LogIn and SignUp form-->
    <div class="form-part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mx-auto d-block">
                    <div class="bg-image">
                        <img src="packageImage.png">
                    </div>

                </div>
                <div class="col-md-8 form-box">
                    <div class="btn-box">
                        <div id="btn"></div>
                        <button type="button" class="toggle-btn" onclick="logIn()">Log In</button>
                        <button type="button" class="toggle-btn" onclick="signUp()">Sign Up</button>
                    </div>

                    <!--log in form-->
                    <form method="post" id="logIn" class="input_form">

                        <div>
                            <input type="text" class="input_field" placeholder="User Id" name="log_user_id" required>
                        </div>
                        <div>
                            <input type="password" class="input_field" placeholder="Enter Password" name="log_pass" required>
                            <span class="eye">
                                <i id="hideeye1" class="fa-solid fa-eye"></i>
                                <i id="hideeye2" class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>

                        <input type="checkbox" class="check_box"><span>Remember Me </span><br>
                        </span>
                        <button type="submit" class="submit_btn" name="logIn_submit">Submit</button>
                    </form>

                    <!--sign Up form-->
                    <form method="post" id="signUp" class="input_form">

                        <div>
                            <input type="text" class="input_field" placeholder="User Name" name="sign_user_name" required>
                        </div>
                        <div>
                            <input type="text" class="input_field" placeholder="User Id" name="sign_user_id" required>
                        </div>
                        <div>
                            <input type="email" class="input_field" placeholder="Email Id" name="sign_email" required>
                        </div>
                        <div>
                            <input type="password" class="input_field" placeholder="Enter Password" name="sign_pass" required>
                            <span class="eye" onclick="myFunction()">
                                <i id="hideeye1" class="fa-solid fa-eye"></i>
                                <i id="hideeye2" class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>

                        <input type="checkbox" class="check_box"><span>I agree to the terms and conditions </span><br>
                        <button type="submit" class="submit_btn" name="signIn_submit">Submit</button>
                    </form>


                </div>
            </div>
        </div>

        <!--LogIn btn and SignUp btn functions-->
        <script>
            var x = document.getElementById("logIn");
            var y = document.getElementById("signUp");
            var z = document.getElementById("btn");

            function logIn() {
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }

            function signUp() {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }

            function myFunction() {
                 var a=document.getElementById("log_pass");
                 var b=document.getElementById("hideeye1");
                 var c=document.getElementById("hideeye2");

                 if(a.type =="password"){

                     a.type="text";
                     b.style.display="block";
                     c.style.display="none";
                 }
                 else{
                     a.type="password"
                     b.style.display="none";
                     c.style.display="block";
                 }

             }
        </script>

    </div>

    <!--Creating database and insertion for signUp properties-->
    <?php


    if (isset($_POST["signIn_submit"])) {


        if (!empty($username) && !empty($userId) && !empty($emailId) && !empty($userpassword)) {

            echo ("Everything is properly filled up");

            //DATABASE creation
            $server_name = "localhost";
            $user_name = "root";
            $password = "";

            $connection = mysqli_connect($server_name, $user_name, $password);

            if (!$connection) {
                die("Error: " . mysqli_connect_error());
            } else {
                echo "Connection Successful <br>";
            }

            $db = "CREATE DATABASE IF NOT EXISTS MoversAndPackers";

            if (mysqli_query($connection, $db)) {
                echo "Database Creation Successful<br>";
            } else {
                echo ("Error: " . mysqli_error($connection));
            }
            mysqli_close($connection);

            //TABLE creation
            $db_name = "MoversAndPackers";

            $connection1 = mysqli_connect($server_name, $user_name, $password, $db_name);

            $query = "CREATE TABLE IF NOT EXISTS CustomerInfo
         (
             UserName varchar(30),
             UserId int,
             EmailId varchar(30),
             Passwords varchar(30)
         )";


            if (mysqli_query($connection1, $query)) {
                echo ("Table created succesfully");
            } else {
                echo ("Error: " . mysqli_error($connection1));
            }

            //insert into table SignUp

            $value = "INSERT INTO CustomerInfo (UserName,UserId, EmailId, Passwords) VALUES ('$username','$userId','$emailId','$userpassword')";

            if (mysqli_query($connection1, $value)) {
                echo "<h4 class=\"success\">Value Insert Successful....</h4>";
            } else {
                echo "Error: " . mysqli_error($connection1) . "<br>";
            }

            mysqli_close($connection1);
        } else {
            echo "<h4 class=\"warning\">All Fields Are Required....!!!</h4>";
        }
    }

    //login info part
    if (isset($_POST["logIn_submit"])) {

        //DATABASE creation
        $server_name = "localhost";
        $user_name = "root";
        $password = "";

        $db_name = "MoversAndPackers";

        $connection2 = mysqli_connect($server_name, $user_name, $password, $db_name);

        //$que = "Select UserId,Passwords from CustomerInfo";
        $q = "Select *from CustomerInfo where UserId= '$logUserId' and Passwords='$loguserPass'";

        $res = mysqli_query($connection2, $q);  //value store in res variable

        //check if res have value
        if (mysqli_num_rows($res)) {

            echo "<h3 class=\"right\">Matched Succesfully</h3>";
        } else {
            echo "<h5 class=\"error\">Password Didn't Matched</h5>";
        }
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>