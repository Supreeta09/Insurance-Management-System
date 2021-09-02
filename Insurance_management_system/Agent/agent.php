
<!DOCTYPE html>
<html>
<script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<head>
	<style type="">
		body {
            font-family: Arial, Helvetica, sans-serif;          
            background-image: url(https://wallpaperaccess.com/full/749813.jpg);
            background-size: cover;
        }
		.center {
		   display: inline-block;
		   width:40%;
		   height: auto;
		    background-color: rgb(40, 7, 40);
		    color: white;
			border: 2px solid white;
			border-radius: 20px;
		    padding: 1em 1em;
		    margin:2em 12em;
		    font-size: 1.5em;
		    text-decoration: none;
			transition: all 0.25s;
		}
		.center:hover{
			border-color: #f1ff5c;
		    color:black;
		    background:none;
		    box-shadow: 0 0.5em 0.5em -0.4em #f1ff5c;
		    transform: translate(0.5em -0.25em);
		}
		.logout {
				margin-left: 90%;
		    text-decoration: none;
		    display: inline-block;
		    background:none;
		    border: 1px solid whitesmoke;
		    padding: 0 1em;
		    font-size: 1.5em;
		    color: white;
		}

		::placeholder{
			color: white;
		}
		h3{
			margin-left: 50px;
			margin-top:0;
			font-size: 22px;
			color: white;
			font-family: Arial, Helvetica, sans-serif;
		}
		h1{
			margin: 0;
			margin-left: 30%;
			color: white;
			text-decoration: 2px white underline;
			font-family: Arial, Helvetica, sans-serif;
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
		h2{
			margin-top: 0;
			color: red;
			text-decoration: 2px ;
			/*text-align: center;*/
			margin-left: 20%;
			font-weight: bold;
		}
		h3{
			/*text-align: center;*/
			margin-left: 20%;
			font-weight: bold;
			font-size: 1.8em;
		}
		
	</style>
</head>

<body>
	<a class="logout" href="../entry.php">Logout</a>
	<h1>AGENT DETAILS</h1>
	<div class="center">
		<?php
		include '../connection.php';
		session_start();
		$name = $_SESSION['user'];
		echo "Welcome " . $name;
		echo "<br>";
		$sql = "SELECT ag_user_name,agent_name,address,pincode,contact_no FROM agent where ag_user_name='$name';";
		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($result)) {  //fetches result from $result and inserts into $row which becomes like array

			echo "<br>Agent name : " . $row['agent_name'];
			echo "<br>User name : " . $row['ag_user_name'];
			echo "<br>Address : " . $row['address'];
			echo "<br>Pincode : " . $row['pincode'];
			echo "<br>Contact no. : " . $row['contact_no'];
		}
		?>
	</div>
	<h3>Details about your cusomers:</h3>
	
	<?php
		include '../connection.php';
		$name = $_SESSION['user'];
		$sql = "SELECT f_name,l_name,address, pincode,contact_no FROM customer where ag_user_name='$name';";
		$result = mysqli_query($conn, $sql);
		$sr=0;
		if(mysqli_num_rows($result)>0)
		{
	?>
		<table class="t_content" width="90%">
		<thead>
			<tr>
				<th>Sr.No</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
				<th>Pincode</th>
				<th>Contact No.</th>
				
			</tr>
		</thead>
	<?php
		while ($row = mysqli_fetch_assoc($result)) {  //fetches result from $result and inserts into $row which becomes like array
			
	?>
			<tbody>
				<tr>
					<td>
						<?php echo ++$sr; ?>
					</td>
					<td>
						<?php echo $row['f_name']; ?>
					</td>
					<td>
						<?php echo $row['l_name']; ?>
					</td>
					<td>
						<?php echo $row['address']; ?>
					</td>
					<td>
						<?php echo $row['pincode']; ?>
					</td>
					<td>
						<?php echo $row['contact_no']; ?>
					</td>
					
				</tr>
			</tbody>
		<?php
			}  											//eo w
			}  
			else
			{
		?>
				<h2>Oops!! You don't have any customer!!!</h2>
		<?php		
			}
		?>
	</table>
</form>
</body>

</html>