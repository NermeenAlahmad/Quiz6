<?php
$db = mysqli_connect("localhost","root","","exam");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$qry = mysqli_query($db,"select * from exam where id='$id'"); // select query
$data = mysqli_fetch_array($qry); // fetch data
if(isset($_POST['update'])) // when click on Update button
{
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
	
    $edit = mysqli_query($db,"update tblemp set fullname='$fullname', age='$age' where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:all_records.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}

?>

<!-- <h3>Update Data</h3>

<form method="POST">
  <input type="text" name="fullname" value="<?php echo $data['fullname'] ?>" placeholder="Enter Full Name" Required>
  <input type="text" name="age" value="<?php echo $data['age'] ?>" placeholder="Enter Age" Required>
  <input type="submit" name="update" value="Update">
</form> -->