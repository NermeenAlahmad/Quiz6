<?php 
include 'includs/header.php';
include 'process.php';
?>

<?php 
// $mysqli = new mysqli ('localhost', 'root', '', 'exam') or die (mysqli_error($mysqli));

// if(isset($_POST['addCategory-btn'])){
//     $query = "INSERT INTO category (category_name) VALUES ('{$_POST["category-name"]}')";
//     $admin_query = mysqli_query($mysqli,$query);
//     header ('location:manageCatgories.php'); }
?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
                <div class="section__content section__content--p30">
                <div class="card">
                                    <div class="card-header">
                                        <strong>Inline</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-inline">
                                            <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Category Name</label>
                                                <input type="text" id="exampleInputName2"  required="" class="form-control" name="category-name" value="<?php echo @$category_name; ?>">
                                            </div>
                                            <?php if ($update == true) { ?>
                                        <button type="submit" class="btn btn-primary btn-sm" name="update-btn">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="addCategory-btn">
                                            <i class="fa fa-dot-circle-o"></i> Add Category
                                        </button>
                                        <?php } ?>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                    
                                    </div>
                                </div>

                                  <!-- USER DATA-->
                                  <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>Admin data</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td> Category Name</td>
                                                    <td> Edit </td>
                                                    <td> Delete </td>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            
                                            $query = "SELECT * FROM category";
                                            $admin_query = mysqli_query($conn,$query);
                                            while ($data = mysqli_fetch_assoc($admin_query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['id']; ?></td>
                                                    <td><?php echo $data['category_name']; ?></td>
                                                    <td>  <a href="manageCatgories.php?edit2=<?php echo $data['id'] ?>">  <i class="fas fa-user-edit"  name="edit-btn"></i> </a> </td>
                                                    <td>  <a href="process.php?delete2=<?php echo $data['id'] ?>">  <i class="fas fa-user-times" name="delete-btn"></i>   </a> </td>
                                                    
                                                </tr>
                                            <?php 
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
             </div>
            </div>
          
 <?php 
include 'includs/footer.php';

?>


