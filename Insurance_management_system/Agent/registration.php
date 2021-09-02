<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
            width: 60%;
            height: 50%;
            background-image: url(https://wallpaperaccess.com/full/749813.jpg);
            background-size: cover;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
            margin-left: 17em;
            width: 100%;
            color: black;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        h1 {
            color: forestgreen;
            text-decoration: forestgreen 2px underline;
        }

         .home {
            margin:  0 0 1em 38em;
            display: inline-block;
            padding:4px 20px;
            background-color: #000;
            border: 2px solid white;
        }

        .home a {
            text-decoration: none;
            font-size: 1.3em;
            color: white;
        }
        
    </style>
</head>

<body>
    
    <form action="" method="POST">
         <div class="home">
             <a href="../entry.php">Back to Home Page</a>
        </div>
        <div class="container">
            
            <h1>Agent Registration</h1>
            <hr>

            <label for="username">Username</label>
            <input type="text" name="User_name" placeholder="enter username" required="">

            <label for="Name">Full Name</label>
            <input type="text" name="Agent_name" placeholder="enter fullname" required="">

            <label for="password">Create a password</label>
            <input type="password" name="Agent_psw" placeholder="password" required="">

            <label for="Address">Address</label>
            <input type="text" name="Address" placeholder="enter address" required>

            <label for="pin">Pincode</label>
            <input type="text" name="Pincode" placeholder="enter pincode" id="pin" required="">

            <label for="cont">Contact</label>
            <input type="text" name="tel" placeholder="contact" required="">

            <button type="reset" class="registerbtn">Clear</button>
            <button type="submit" name="submit" class="registerbtn">Register</button>
        </div>

        

    </form>

</body>

</html>
<?php
    include '../connection.php';
    if(isset($_POST['submit']))
    {
        $un=$_POST['User_name'];
        $an=$_POST['Agent_name'];
        $ap=$_POST['Agent_psw'];
        $ad=$_POST['Address'];
        $p=$_POST['Pincode'];
        $tel=$_POST['tel'];

     /*   $insertquery = "insert into agent(ag_user_name,agent_name,agent_psw,address,pincode,contact_no) 
        values ('$un','$an','$ap','$ad','$p','$tel')";
        */

        $passmd5=base64_encode($ap);
        $insertquery = "insert into agent(ag_user_name,agent_name,agent_psw,address,pincode,contact_no) 
        values ('$un','$an','$passmd5','$ad','$p','$tel')";

        $res=mysqli_query($conn,$insertquery);

       if($res){
            ?>
            <script type="text/javascript">
                alert("Registered successfully")
            </script>
            <?php
        } 
        else
        {
            ?>
            <script type="text/javascript">
                alert("Failed to Register")
            </script>
            <?php
        }
       //header('location:login.php');
    }

?>