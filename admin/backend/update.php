<?php
$db=mysqli_connect("localhost","root","","unica");

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $color=$_POST['color'];
    $size=$_POST['size'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $totalPrice=$price*$quantity;
    $date=date("y-m-d");
    $description=$_POST['description'];

    $photo=$_FILES['photo']['name'];
    $tempName=$_FILES['photo']['tmp_name'];
    $extension=explode('.', $photo);
    $actualExt=strtolower(end($extension));
    $photoNewName=uniqid('',true).'.'.$actualExt;
    $target_dir="../../product-images/".$photoNewName;
    $move=move_uploaded_file($tempName, $target_dir);
    if($move){
        if($move){
            $update="UPDATE productList SET name='$name',picture='$photoNewName',
            color='$color',size='$size',price='$price',quantity='$quantity',
            total_price='$totalPrice',date='$date',description='$description'  where id='$id'; ";
    $sql=mysqli_query($db,$update);
    if($sql){
         echo "<script>alert('Product has been successfully Updated. ')</script>";
         echo "<meta http-equiv='refresh' content='2; url=../index.php'>";
  
}else{
    echo "<script>alert('Submission Failed. Try again. ')</script>";
}
    }else{
        echo "<script>alert('Product has been successfully Updated.  ')</script>";
}
    }

}

?>