

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
$conn = mysqli_connect("localhost","root","","bkas") or die("connection error");
if(isset($_POST['submit'])){
  
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
  $pswdr = mysqli_real_escape_string($conn,$_POST['pswdr']);
  

$sql = "SELECT * FROM try WHERE phone = '$phone'";
$res = mysqli_query($conn,$sql) or die("query error");
$count = mysqli_num_rows($res);
if($count){
  $var = mysqli_fetch_assoc($res);
  $hash = $var['password'];
  
  echo "your database password=".$hash."<br>";

 
  if ($pswdr==$hash) {
    
    echo ' password.';
    echo "<a href='user.php?phone={$var['phone']}'>send</a>";
   // header("location:http://localhost/nogod/user.php");
} else {
    echo 'Invalid password.';
}
}
else{
  echo "your number already exists...";
}

}
?>

<div class="container">
  <h2>Stacked form</h2>
  <form action="" method="post">
    
    <div class="form-group">
      <label for="number">Number:</label>
      <input type="text" class="form-control" id="number" placeholder="Enter number" name="phone">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswdr">
    </div>

    
    
    <button type="submit" name="submit" class="btn btn-primary">
   

     
    </button>
   
  </form>
</div>

</body>
</html>
