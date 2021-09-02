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
        input[type=date],
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
            margin: 1.5em 0 0 27em;

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
            <h1>Premium Payment</h1>
            <hr>

            <label for="pon">Policy Number</label>
            <input type="text"  placeholder="enter policy number" name="po_num" required="">

            <label for="pram">Premium Amount</label>
            <input type="text"  placeholder="enter premium amount" name="prem_amt" required="">


            <label for="paym">Payment Mode</label>
            <select name="paymode" id="paym">
                <option value="">--select--</option>
                <option value="Debit card">Debit Card</option>
                <option value="Credit card">Credit Card</option>
            </select>

            <label for="pram">Date</label>
            <input type="date" placeholder="enter date" name="pay_date" required="">

            <label for="cardno">Card Number</label>
            <input type="text"  name="cardno" placeholder="enter card number" required="">

            <label for="exd">Card Expiry Date</label>
            <input type="date"  name="exp" required="">

            <label for="cvv">CVV</label>
            <input type="password" name="cvv"  placeholder="enter cvv" required="">



            <button type="reset" class="registerbtn">Clear</button>
            <button type="submit" class="registerbtn" name="submit">Make Payment</button>
        </div>

        <div class="home">
            <button> <a href="customer.php">Back</a></button>
        </div>


    </form>

</body>

</html>

<?php
    include '../connection.php';
    if(isset($_POST['submit']))
    {
        $pn=$_POST['po_num'];
        $pa=$_POST['prem_amt'];
        $pm=$_POST['paymode'];
        $pd = $_POST['pay_date'];
        $cd = $_POST['cardno'];
        $exp = $_POST['exp'];
        $cvv = $_POST['cvv'];


        $cdmd5=md5($cd);
        $cvvmd5=md5($cvv);
        $insertquery = "insert into payment(policy_no,premium_amt,pay_mode,pay_date,card_no,exp_date,CVV) values 
        ('$pn','$pa','$pm','$pd','$cdmd5','$exp','$cvvmd5')";
        $res=mysqli_query($conn,$insertquery);

       if($res){
            ?>
            <script type="text/javascript">
                alert("Payment successful")
            </script>
            <?php
        } 
        else
        {
            ?>
            <script type="text/javascript">
                alert("Payment Failed!!!")
            </script>
            <?php
        }
       //header('location:login.php');
    }

?>