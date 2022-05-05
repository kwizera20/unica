<?php
    $db=mysqli_connect("localhost","root","","unica");
    if(isset($_GET['productId'])){
        $newid=$_GET['productId'];
        $delete="DELETE FROM productList where id='$newid';";
        $sql=mysqli_query($db,$delete);
        if($sql){
        echo "<script>alert('Product Successfully deleted!!')</script>";
        echo "<meta http-equiv='refresh' content='2; url=../index.php'>";
        }
    }
?>