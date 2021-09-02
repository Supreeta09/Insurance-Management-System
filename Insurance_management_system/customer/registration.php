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
        input[type=password],
        select,
        input[type=date] {
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
            <h1>Customer Registration</h1>
            <hr>
            <?php 
            include '../connection.php';
            $query="SELECT product_name FROM insurance;";
            $res=mysqli_query($conn,$query);
            $query1="SELECT ag_user_name FROM agent;";
            $res1=mysqli_query($conn,$query1);

        ?>

            <label for="username">Username</label>
            <input type="text" name="user_name" placeholder="enter username" required="">

            <label for="Name">First Name</label>
            <input type="text" name="f_Name" placeholder="enter first name" required="">

            <label for="Name">Last Name</label>
            <input type="text" name="l_Name" placeholder="enter last name" required="">

            <label for="password">Create a password</label>
            <input type="password" name="password" placeholder="password" required="">


            <label for="agent name">Agent user name</label>
            <select name="agent_name">
            <option value="">--Select--</option>
            <?php while($row=mysqli_fetch_array($res1)):; ?>
                <option ><?php echo $row['ag_user_name']?></option>
            <?php endwhile;?>
            </select>

            <label for="dob">Date of birth</label>
            <input type="date" name="DOB" placeholder="enter data of birth" id="dob" required="">

            <label for="gend">Gender</label>
            <select name="gender" name="gender">
                <option value="">--Select--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="Address">Address</label>
            <input type="text" name="Address" placeholder="enter address" required>



            <label for="pin">Pincode</label>
            <input type="text" placeholder="enter pincode" name="pin" required="">


            <label for="cont">Contact</label>
            <input type="text" placeholder="enter contact number" name="tel" required="">


        
           <label for="ins_type">Insurance type</label>
           <select name="ins_type">
            <option value="">--Select--</option>
            <?php while($row=mysqli_fetch_array($res)):; ?>
                <option ><?php echo $row['product_name']?></option>
            <?php endwhile;?>
            </select>

            

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
        $un=$_POST['user_name'];
        $fn=$_POST['f_Name'];
        $ln=$_POST['l_Name'];
        $psw=$_POST['password'];
        $an=$_POST['agent_name'];
        $dob=$_POST['DOB'];
        $gen=$_POST['gender'];
        $add=$_POST['Address'];
        $pn=$_POST['pin'];
        $tl=$_POST['tel'];
        $inst=$_POST['ins_type'];

       /* $insertquery="insert into customer(user_name,fullname,password,ag_user_name,DOB,gender,address,pincode,contact_no,product_name) values 
        ('$un','$fn','$psw','$an','$dob','$gen','$add','$pn','$tl','$inst')";
        */

        $passmd5=base64_encode($psw);
        $insertquery = "insert into customer(user_name,f_name,l_name,password,ag_user_name,DOB,gender,address,pincode,contact_no,product_name) 
        values ('$un','$fn','$ln','$passmd5','$an','$dob','$gen','$add','$pn','$tl','$inst')";

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