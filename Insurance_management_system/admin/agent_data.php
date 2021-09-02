<?php
include '../connection.php';
?>

<html>
<head>
	<title>Agent Data</title>
	<style type="text/css">
		body {
			background-image: url(https://dollarsandsense.sg/wp-content/uploads/2015/10/life_insurance.jpg);
			background-size: cover;
			font-family: Arial, Helvetica, sans-serif;
		}

		a {
			border: 2px solid white;
			padding: 5px;
			float: right;
			background-color: goldenrod;
			text-decoration: none;
			color: white;
			font-weight: bold;
			font-size: 20px;
		}

		a:hover {
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
			font-size: 1.5em;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
			margin-left: 50px;
		}


		.t_content thead tr {
			background-color: #009879;
			color: white;
			text-align: left;
		}

		.t_content th,
		.t_content td {
			padding: 12px 15px;
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
	<a href="admin.php">Back to Homepage</a>
	<h2>AGENTS DATA</h2>
	<table class="t_content" width="90%">
		<thead>>
			<tr>
				<th>Sr.No</th>
				<th>Agent Name</th>
				<th>Address</th>
				<th>Pincode</th>
				<th>Contact Number</th>
				<th>No.of Customers</th>
			</tr>
		</thead>
		<?php
			//$sql ="SELECT agent_name,address,pincode,contact_no FROM agent;";
			$sql ="select agent.agent_name, agent.address,agent.pincode,agent.contact_no, count(policy_no) as NoOfPolicies 
from agent
left outer join customer on agent.ag_user_name=customer.ag_user_name group by agent.ag_user_name ;";
			$result = mysqli_query($conn,$sql);
			$sr=0;
			while ($row= mysqli_fetch_assoc($result)) {  //fetches result from $result and inserts into $row which becomes like array
		?>
		<tbody>
			<tr>
				<td>
					<?php echo ++$sr; ?>
				</td>
				<td>
					<?php echo $row['agent_name'];?>
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
					<?php echo $row['NoOfPolicies'];?>
				</td>
				 
			</tr>
		</tbody>
		<?php
			}
		?>
	</table>
</body>
</html>