<?php 
include 'includs/header.php';
include 'process.php';
?>

 <!-- MAIN CONTENT-->
 <div class="main-content">
                <div class="section__content section__content--p30">
                <div class="card">
                                    <div class="card-header">
                                        <strong>Inline</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="manageExams.php" method="post" class="form-inline">
                                            <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Exam Name</label>
                                                <input type="text" id="exampleInputName2"  required="" class="form-control" name="exam-name" value="<?php echo @$exam_name; ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Category Name</label>
                                                <input type="text" id="exampleInputName2"  required="" class="form-control" name="category-name" value="<?php echo @$category_name; ?>">
                                            </div> -->

                                            <select class="form-select w-25 mb-4" name ='category_name' >
                                    <?php 
                                           $query           = "SELECT * FROM category ";
                                           $category_query  = mysqli_query($mysqli,$query);
                                           while($data       = mysqli_fetch_assoc($category_query))
                                           { 
                                            $category_id2    = $data['id'];
                                            $category_name2 = $data['category_name']; 
                                            echo "<option class='w-25' value='{$category_id2}'>{$category_name2}<?option>";}
                                    ?>
                                </select>




                                            <?php if ($update == true) { ?>
                                        <button type="submit" class="btn btn-primary btn-sm" name="update-btn">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="addExam-btn">
                                            <i class="fa fa-dot-circle-o"></i> Add Exam
                                        </button>
                                        <?php } ?>
                                        </form>
                                    </div>
                                    
                                </div>
                    <div class="container-fluid">
                        <div class="row">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Exam Name</th>
                                                <th>Category Name</th>
                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                $query = "SELECT exams.id, exams.exam_name, category.category_name
                                                            FROM exams
                                                            INNER JOIN category ON exams.category_id = category.id;";
                                                $exam_query = mysqli_query($conn,$query);
                                                // var_dump(mysqli_fetch_assoc($exam_query));
                                                while($data = mysqli_fetch_assoc($exam_query)){ ?>

                                                <tr>
                                                    <td><?php echo $data['exam_name']; ?></td>
                                                    <td><?php echo $data['category_name']; ?></td>

                                                    <td> <a href="manageExams.php?editExam=<?php echo $data['id'] ?>">  <i class="fas fa-user-edit"  name="edit-btn"></i> </a> 

                                                    <a href="process.php?deleteExam=<?php echo $data['id'] ?>" class="item" name="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                         </div>
                     </div>
                </div>
      </div>


<?php 
include 'includs/footer.php';
?>




