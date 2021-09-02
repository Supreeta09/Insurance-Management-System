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
        select {
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

    <form method="POST">
         <div class="home">
             <a href="admin.php">Back to Homepage</a>
        </div>
        <div class="container">
            <h1>Add Insurance</h1>
            <hr>

            <label for="pname">Product Name</label>
            <input type="text" name="pname" placeholder="enter product name"  required="">

            <label for="sa">Sum Assured</label>
            <input type="text" name="sa" placeholder="enter sum assured"  required="">


            <label for="pm">Premium Mode</label>
            <select name="p_mode" >
                <option value="">--select--</option>
                <option value="Monthly">Monthly</option>
                <option value="Quarterly">Quarterly</option>
                <option value="Yearly">Yearly</option>
            </select>
            <label for="pa">Premium Amount</label>
            <input type="text" name ="p_amt" placeholder="enter premium amount" required="">

            <label for="mp">Maturity Period</label>
            <input type="text" name="m_period" placeholder="enter maturity period"  required="">

            <button type="reset" class="registerbtn">Clear</button>
            <button type="submit" class="registerbtn" name="submit">ADD</button>
        </div>

    </form>

</body>

</html>

<?php
    include '../connection.php';
    if(isset($_POST['submit']))
    {
        $pn=$_POST['pname'];
        $sa=$_POST['sa'];
        $pm=$_POST['p_mode'];
        $pa=$_POST['p_amt'];
        $mp=$_POST['m_period'];

        $insertquery="insert into insurance(product_name,sum_assured,premium_mode,premium_amt, maturity_prd) values 
        ('$pn','$sa','$pm','$pa','$mp')";
        $res=mysqli_query($conn,$insertquery);

       if($res){
            ?>
            <script type="text/javascript">
                alert("Insurance added successfully")
            </script>
            <?php
        } 
        else
        {
            ?>
            <script type="text/javascript">
                alert("Failed to add insurance")
            </script>
            <?php
        }
       header('location:ins_data.php');
    }

?>