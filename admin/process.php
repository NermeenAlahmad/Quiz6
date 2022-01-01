<?php 
$mysqli = new mysqli ('localhost', 'root', '', 'exam') or die (mysqli_error($mysqli));


//add admin
if(isset($_POST['add-btn'])){

$file            = $_FILES['fileToUpload'];
$image           =$file["name"];
$new_image       =uniqid("IMG-", true).'.png';
$file_des        = "uploads/".$new_image;
move_uploaded_file($file['tmp_name'], $file_des);


    $query = "INSERT INTO admin(name,email,password,phone, admain_photo)
              VALUES ('{$_POST["admin-name"]}','{$_POST["admin-email"]}','{$_POST["admin-password"]}' , '{$_POST["admin-phone"]}', '$new_image')";
    $admin_query = mysqli_query($mysqli,$query);
}


//delete
if (isset($_GET['delete'])) {
    $id = $_GET["delete"];
    $mysqli -> query ("DELETE FROM admin WHERE id =$id") or die ($mysql->error);
    header ('location:manageAdmin.php');
}

//update
$id             = '';
$update         = false; // toggle button
$admin_name     = '';
$admin_email    = '';
$admin_password = '';
$admin_phone    = '';




if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM admin WHERE id ='$id'") or die($mysqli->error);
    
    $data = $result -> fetch_array();
    
    $admin_name     = $data['name'];
    $admin_email    = $data['email'];
    $admin_password = $data['password'];
    $admin_phone    = $data['phone'];

    if (isset($_POST['update-btn'])) {
        $admin_name     = $_POST['name'];
        $admin_email    = $_POST['admin-email'];
        $admin_password = $_POST['admin-password'];
        $admin_phone    = $_POST['admin-phone'];
            $mysqli->query("UPDATE admin SET name = '$admin_name ', email = '$admin_email', password = '$admin_password', phone = '$admin_phone' WHERE id = '$id' ") or die($mysqli->error);
           header('location:manageAdmin.php');
        }


}

// --------------------- Category ----------------------------
//add category
if(isset($_POST['addCategory-btn'])){
    $query = "INSERT INTO category (category_name) VALUES ('{$_POST["category-name"]}')";
    $admin_query = mysqli_query($mysqli,$query);
    header ('location:manageCatgories.php');
}

//delete
if (isset($_GET['delete2'])) {
    $id = $_GET["delete2"];
    $mysqli -> query ("DELETE FROM category WHERE id =$id") or die ($mysql->error);
    header ('location:manageCatgories.php');
}

//update
$id = '';
$update = false; // toggle button
$category_name = '';


if (isset($_GET['edit2'])) {
    $id = $_GET['edit2'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM category WHERE id ='$id'") or die($mysqli->error);
    
    $data = $result -> fetch_array();
    
    $category_name  = $data['category_name'];

    if (isset($_POST['update-btn'])) {
    $category_name  = $_POST['category-name'];
            $mysqli->query("UPDATE category SET category_name = '$category_name ' WHERE id = '$id' ") or die($mysqli->error);
           header('location:manageCatgories.php');
        }


}

// --------------------- Exam ----------------------------
//add exam
// if(isset($_POST['addExam-btn'])){
//     $query = "INSERT INTO exams (category_id, exam_name) VALUES ('{$_POST["category-name"]}', '{$_POST["exam-name"]}')";
//     $admin_query = mysqli_query($mysqli,$query);
//     header ('location:manageExams.php');
// }

//add category in exam

if (isset($_POST['addExam-btn'])) {
    $category   = $_POST['category_name'];
    $name       = $_POST['exam-name'];

    $mysqli->query("INSERT INTO exams ( category_id,exam_name ) VALUES ('$category' ,'$name')") or die($mysqli->error);
    header('location:manageExams.php');
}



//delete
if (isset($_GET['deleteExam'])) {
    $id = $_GET["deleteExam"];
    $mysqli -> query ("DELETE FROM exams WHERE id =$id") or die ($mysqli->error);
    header ('location:manageExams.php');
}

//update
$id = '';
$update = false; // toggle button
$exam_name = '';


if (isset($_GET['editExam'])) {
    $id = $_GET['editExam'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM exams WHERE id ='$id'") or die($mysqli->error);
    
    $data = $result -> fetch_array();
    
    $exam_name  = $data['exam_name'];

    if (isset($_POST['update-btn'])) {
    $exam_name  = $_POST['exam-name'];
            $mysqli->query("UPDATE exams SET exam_name = '$exam_name ' WHERE id = '$id' ") or die($mysqli->error);
           header('location:manageExams.php');
        }


}


?>