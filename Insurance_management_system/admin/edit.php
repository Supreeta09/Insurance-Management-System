<?php
	include '../connection.php';
	$pn=$_GET['pn'];
	$sa=$_GET['sa'];
	$pm=$_GET['pm'];
	$pa=$_GET['pa'];
	$mp=$_GET['mp'];
	
?>

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
            margin: 1.5em 0 0 17em;

        }

        .home a {
            text-decoration: none;
            font-size: 1.3em;
            color: white;
        }

        .home button {
            background-color: black;
        }
    </style>
</head>

<body>

    <form method="POST">
        <div class="container">
            <h1>Edit Insurance</h1>
            <hr>

            <label for="pname">Product Name</label>
            <input type="text" name="pname" placeholder="<?php echo $pn ?>"  required="">

            <label for="sa">Sum Assured</label>
            <input type="text" name="sum" placeholder="<?php echo $sa ?>"  required="">


            <label for="pm">Premium Mode</label>
            <select name="p_mode" >
                <option value="">--select--</option>
                <option value="monthly">Monthly</option>
                <option value="quarterly">Quarterly</option>
                <option value="yearly">Yearly</option>
            </select>
            <label for="pa">Premium Amount</label>
            <input type="text" name ="p_amt" placeholder="<?php echo $pa ?>" required="">

            <label for="mp">Maturity Period</label>
            <input type="text" name="m_period" placeholder="<?php echo $mp ?>"  required="">

            <button type="update" class="registerbtn" name="update">Update</button>
        </div>

        <div class="home">
            <button> <a href="admin.php">Back</a></button>
        </div>


    </form>

</body>

</html>

<?php
    
    if(isset($_POST['update']))
    {
        $prod_name=$_POST['pname'];
        $sum=$_POST['sum'];
        $pr_mode=$_POST['p_mode'];
        $pr_amt=$_POST['p_amt'];
        $m_prd=$_POST['m_period'];

        $updatequery="Update insurance set product_name='$prod_name', sum_assured='$sum',premium_mode='$pr_mode',premium_amt='$pr_amt',maturity_prd='$m_prd' where product_name='$pn'";
        $res=mysqli_query($conn,$updatequery);

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