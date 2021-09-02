<?php
include '../connection.php';
?>

<html>
<head>
	<title>Customer Data</title>
	<style type="text/css">
		body {
			background-image: url(https://dollarsandsense.sg/wp-content/uploads/2015/10/life_insurance.jpg);
			background-size: cover;
			font-family: Arial, Helvetica, sans-serif;
		}

		.back{
			border: 2px solid white;
			padding: 5px;
			float: right;
			background-color: goldenrod;
			text-decoration: none;
			color: white;
			font-weight: bold;
			font-size: 20px;
		}
		.back:hover {
			background: white;
			border: 2px solid goldenrod;
			box-shadow: greenyellow;
			color: magenta;
			transition: all 0.25s;
		}
		h2 {
			font-size: 40px;
			color: black;
			text-align: center;
			margin: 0;
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
		.button a{		  
		  border: none;
		  color: white;
		  padding: 10px 30px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		}
		.edit{
			background-color:green; 		  
		}

	</style>
</head>
<body>
	<a class="back" href="admin.php">Back to Homepage</a>
    <h2>CUSTOMERS DATA</h2>
	<table width="100%" class="t_content">
		<thead>
			<tr>
				<th>Sr.No</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Policy no</th>
				<th>Product name</th>
				<th>Agent name</th>
				<th>DOB</th>
				<th>Gender</th>
				<th>address</th>
				<th>Pincode</th>
				<th>Contact Number</th>
				<th>Transaction id</th>
				<th>Payment mode</th>
				<th>Payment date</th>
			</tr>
		</thead>
		<?php
			//$sql ="SELECT user_name,policy_no, product_name,ag_user_name,DOB,gender, address,pincode,contact_no FROM customer;";
			$sql ="SELECT c.f_name,c.l_name,c.policy_no,c.product_name,c.ag_user_name,c.DOB,c.gender,c.address,c.pincode,c.contact_no,p.trans_id,p.pay_mode,p.pay_date FROM customer c left join payment p on c.policy_no=p.policy_no order by c.f_name;";
			$result = mysqli_query($conn,$sql);
			$sr=0;
			while ($row= mysqli_fetch_assoc($result)) {  //fetches result from $result and inserts into $row which becomes like array
		?>
		<tbody>
			<tr>
				<td>
					<?php echo ++$sr;?>
				</td>
				<td>
					<?php echo $row['f_name'];?>
				</td>
				<td>
					<?php echo $row['l_name'];?>
				</td>
				<td>
					<?php echo $row['policy_no'];?>
				</td>
				<td>
					<?php echo $row['product_name'];?>
				</td>
				<td>
					<?php echo $row['ag_user_name'];?>
				</td>
				<td>
					<?php echo $row['DOB'];?>
				</td>
				<td>
					<?php echo $row['gender'];?>
				</td>
				<td>
					<?php echo $row['address'];?>
				</td>
				<td>
					<?php echo $row['pincode'];?>
				</td>
				<td>
					<?php echo $row['contact_no'];?>
				</td>
				<td>
					<?php 
					if($row['trans_id']=="")
					{
						echo "Not paid yet";
					}
					else{
						echo $row['trans_id'];
					}
					
					?>
				</td>
				<td>
					<?php
					if($row['pay_mode']=="")
					{
						echo "Not paid yet";
					} 
					else
					{
						echo $row['pay_mode'];
					}
					?>
				</td>	
				<td>
					<?php
					if($row['pay_date']=="")
					{
						echo "Not paid yet";
					} 
					else
					{
						echo $row['pay_date'];
					}
					?>
				</td>	
						 
			</tr>
		</tbody>
		<?php
			}
		?>
	</table>
</body>
</html>