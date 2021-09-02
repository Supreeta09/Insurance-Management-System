<?php
include 'connection.php';
?>

<html>
<head>
	<title>Insurance Data</title>
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
	<a href="entry.php">Back to homepage</a>
    <h2>INSURANCE PLANS</h2>
	<table  class="t_content" width="90%">    
        <thead>
			<tr>
				<th>Sr.No</th>
				<th>Product Name</th>
				<th>Sum Assured</th>
				<th>Premium Mode</th>
				<th>Premium Amount</th>
				<th>Maturity Period</th>
			</tr>
		</thead>


		<?php
			$sql ="SELECT * FROM insurance;";
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
					<?php echo $row['product_name'];?>
				</td>
				<td>
					<?php echo $row['sum_assured'];?>
				</td>
				<td>
					<?php echo $row['premium_mode'];?>
				</td>
				<td>
					<?php echo $row['premium_amt'];?>
				</td>
				 <td>
					<?php echo $row['maturity_prd'];?>
				</td>
			</tr>
		</tbody>
		<?php
			}
		?>
	</table>
</body>
</html>