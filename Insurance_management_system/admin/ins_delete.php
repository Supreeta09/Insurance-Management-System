<?php
    include '../connection.php';
    $sql = "delete from insurance where product_name = '".$_GET['id']."'";    
    $result = mysqli_query($conn,$sql);  
    if($result){
        ?>
        <script type="text/javascript">
        alert("data deleted")
        </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert("data not deleted")
        </script>
        <?php
    }
   header('Location:ins_data.php');
?>