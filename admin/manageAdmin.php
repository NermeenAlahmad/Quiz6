<?php 
include 'includs/header.php';
include 'process.php';
?>
<?php 
// $mysqli = new mysqli ('localhost', 'root', '', 'exam') or die (mysqli_error($mysqli));
// //update
// $id = '';
// $update = false; // toggle button
// $admin_name = '';
// $admin_email = '';
// $admin_password = '';
// $admin_phone = '';

// if (isset($_GET['edit'])) {
//     $id = $_GET['edit'];
//     $update = true;
//     $result = $mysqli->query("SELECT * FROM admin WHERE id ='$id'") or die($mysqli->error);
    
//     $data = $result -> fetch_array();
    
//     $admin_name     = $data['name'];
//     $admin_email    = $data['email'];
//     $admin_password = $data['password'];
//     $admin_phone    = $data['phone'];

    
//     if (isset($_POST['update-btn'])) {
//     $admin_name     = $_POST['admin-name'];
//     $admin_email    = $_POST['admin-email'];
//     $admin_password = $_POST['admin-password'];
//     $admin_phone    = $_POST['admin-phone'];
//         $mysqli->query("UPDATE admin SET name = '$admin_name ', email = '$admin_email', password = '$admin_password', phone = '$admin_phone' WHERE id = '$id' ") or die($mysqli->error);
//        header('location:manageAdmin.php');
//     }
    

// }
?>

<?php
// if(isset($_POST['add-btn'])){
//     $query = "INSERT INTO admin(name,email,password,phone) VALUES ('{$_POST["admin-name"]}','{$_POST["admin-email"]}','{$_POST["admin-password"]}','{$_POST["admin-phone"]}')";
//     $admin_query = mysqli_query($conn,$query);
// }
?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
            <div class="section__content section__content--p30">
                  <div class="card">
                             <div class="card-header">
                                        <strong>Inline</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-inline" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Name</label>
                                                <input type="text" id="exampleInputName2"  required="" class="form-control" name="admin-name" value="<?php echo @$admin_name; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail2" class="px-1  form-control-label">Email</label>
                                                <input type="email" id="exampleInputEmail2"  required="" class="form-control" name="admin-email" value="<?php echo @$admin_email; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="pass" class="px-1  form-control-label">password</label>
                                                <input type="text" id="pass"  required="" class="form-control" name="admin-password" value="<?php echo @$admin_password; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="pass" class="px-1  form-control-label">phone</label>
                                                <input type="text" id="pass"  required="" class="form-control" name="admin-phone" value="<?php echo @$admin_phone; ?>">
                                            </div>
                                            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                                            <div class="card-footer">
                                            <?php if ($update == true) { ?>
                                        <button type="submit" class="btn btn-primary btn-sm" name="update-btn">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="add-btn">
                                            <i class="fa fa-dot-circle-o"></i> Add
                                        </button>
                                        <?php } ?>
                                        </form>
                                    </div>
                                    
                                       
                                    </div>
                                </div>

                                  <!-- USER DATA-->
                                  <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>password</th>
                                                <th>phone</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Image</th>
                                                <!-- <th>price</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $query = "SELECT * FROM admin";
                                            $admin_query = mysqli_query($conn,$query);
                                            while ($data = mysqli_fetch_assoc($admin_query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['id']; ?></td>
                                                    <td><?php echo $data['name']; ?></td>
                                                    <td><?php echo $data['email']; ?></td>
                                                    <td><?php echo $data['password']; ?></td>
                                                    <td><?php echo $data['phone']; ?></td>
                                                    <td>  <a href="manageAdmin.php?edit=<?php echo $data['id'] ?>">  <i class="fas fa-user-edit"  name="edit-btn"></i> </a> </td>
                                                    <td>  <a href="process.php?delete=<?php echo $data['id'] ?>">  <i class="fas fa-user-times" name="delete-btn"></i>   </a> </td>
                                                    <td>  <img src="uploads/ <?php echo $data['admain_photo'] ?>" alt=""></td>
                                                </tr>
                                            <?php 
                                            }
                                            ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                        </div>
                                <!-- END USER DATA-->
             </div>
            </div>
          
 <?php 
include 'includs/footer.php';

?>


