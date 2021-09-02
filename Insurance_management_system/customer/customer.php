<!DOCTYPE html>
<html>
<head>
	<style type="">
		body {
            font-family: Arial, Helvetica, sans-serif;          
            background-image: url(https://wallpaperaccess.com/full/749813.jpg);
            background-size: cover;
        }
		.center {
		   display: inline-block;
		   width: 50%;
		   height: auto;
		    background-color: rgb(40, 7, 40);
		    color: white;
			border: 2px solid white;
			border-radius: 20px;
		    padding: 1em 1em;
		    margin:1.5em 8em;
		    font-size: 1.3em;
		    text-decoration: none;
			transition: all 0.25s;
		}
		.center:hover{
			border-color: #f1ff5c;
		    color:black;
		    background:none;
		    box-shadow: 0 0.5em 0.5em -0.4em #f1ff5c;
		    transform: translate(0.5em -0.25em);
		    font-weight: bold;
		}
		.logout{
			margin-left: 90%;
		    text-decoration: none;
		    display: inline-block;
		    background:none;
		    border: 1px solid whitesmoke;
		    padding: 0 1em;
		    font-size: 1.5em;
		    color: white;
	
		}
		.payment {
			text-decoration: none;
			border: 2px solid white;
			color: white;
			font-size: 20px;
			padding: 10px;
			background-color: black;
			border-radius: 10px;
			margin: 0 0 0 25em;
		/*	margin-left: 86.55%;		*/
			transition: all 0.25s;
			font-weight: 800;
			

		}
		.payment:hover{
                background:darkred;
				color: black;
				border-color:#f1ff5c ;
				transform: translate(0.5em,-0.25em);

		}
		h1{
			margin-top: 0;
			color: white;
			text-decoration: 2px white underline;
			/*text-align: center;*/
			margin-left: 30%;
		}
		h2{
			margin-top: 0;
			color: red;
			text-decoration: 2px ;
			/*text-align: center;*/
			margin-left: 30%;
			font-weight: bold;
		}
		.t_content {
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 1em;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

		}


		.t_content thead tr {
			background-color: #009879;
			color: white;
			text-align: left;
		}

		.t_content th,
		.t_content td {
			padding: 12px 10px;
		}

		.t_content tbody tr {
			border-bottom: 1px solid #dddddd;
			background-color: white;
		}

		.t_content tbody:nth-of-type(2n) {
			background-color: #f3f3f3;
		}

		.t_content tbody:last-of-type {
			border-bottom: 3px solid #009879;
		}
		

	</style>
</head>
<body>
	<a class="logout" href="../entry.php">Logout</a>

	<h1>CUSTOMER DETAILS</h1>
	<div class="center">
		<?php
			include '../connection.php';
			session_start();
			$name=$_SESSION['user'];
			echo "Welcome ".$name;
			echo "<br>";
			
			$sql ="SELECT c.policy_no,c.f_name,c.l_name,c.user_name,c.ag_user_name,c.DOB,c.gender,c.address,c.pincode,c.contact_no, 
			i.product_name,i.sum_assured,i.premium_mode,i.premium_amt,i.maturity_prd 
			FROM customer c,insurance i where user_name='$name' and c.product_name=i.product_name;";
			$result = mysqli_query($conn,$sql);

			while ($row= mysqli_fetch_assoc($result)) {  //fetches result from $result and inserts into $row which becomes like array
				
				$pol_no=$row['policy_no'];
				echo "Welcome ".$row['f_name'];
				echo "<br>";
				echo "<br>First name : ".$row['f_name'];
				echo "<br>Last name : ".$row['l_name'];
				echo "<br>User name : ".$row['user_name'];
				echo "<br>Agent name : ".$row['ag_user_name'];
				echo "<br>DOB : ".$row['DOB'];
				echo "<br>Gender : ".$row['gender'];
				echo "<br>Address : ".$row['address'];
				echo "<br>Pincode : ".$row['pincode'];
				echo "<br>Contact no. : ".$row['contact_no'];
				echo "<br>";
				echo "<br>Policy details ";
				echo "<br>";
				echo "<br>Policy Number : ".$row['policy_no'];
				echo "<br>Product name : ".$row['product_name'];
				echo "<br>Sum Assured : ".$row['sum_assured'];
				echo "<br>Premium mode : ".$row['premium_mode'];
				echo "<br>Premium amount : ".$row['premium_amt'];
				echo "<br>Maturity period: ".$row['maturity_prd'];
				echo "<br>";
			}
			?>
	</div>
	<a class="payment" href="prem_payment.php">Make payment </a>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>


	<h1>PAYMENT DETAILS</h1>
		<?php
			
			$sql ="SELECT trans_id,premium_amt,pay_mode,pay_date FROM payment where policy_no=$pol_no order by trans_id desc LIMIT 1;";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0)
			{
		?>
			<div class="center">
		<?php
			while ($row= mysqli_fetch_assoc($result)) {  //fetches result from $result and inserts into $row which becomes like array
				
				echo "<br>Transaction ID : ".$row['trans_id'];
				echo "<br>Premium amount: ".$row['premium_amt'];
				echo "<br>Payment mode : ".$row['pay_mode'];
				echo "<br>Payment Date: ".$row['pay_date'];
				
				} //end of while
		
		?>
			</div>
		<?php
		} 		//end of if
		else
		{
			?><h2>You have not paid the primium!!!</h2><?php
		}
		?>
	</body>
</html>