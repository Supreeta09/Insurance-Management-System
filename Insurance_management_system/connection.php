<?php
	$dbServername = "localhost";  
	$dbUsername = "root";  
	$dbPassword = ""; 
	$dbName="myproject" ;
	$conn = mysqli_connect($dbServername , $dbUsername , $dbPassword,$dbName);


/*	if($conn)
	{
		//echo "connection success";
		?>
		<script type="text/javascript">
			alert("connection success")
		</script>
		<?php
	} 
	else
	{
		//echo "no connection";
		?>
		<script type="text/javascript">
			alert("connection success")
		</script>
		<?php
	}
*/
?>