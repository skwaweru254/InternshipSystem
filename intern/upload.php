<?php

session_start();

require("../db.php");


if(!isset($_SESSION["username"])) {
  header("location:../index.php");
  # code...
}
$regno=$_SESSION["regno"];
$email=$_SESSION["email"];


$query = mysqli_query($con,"SELECT * from task where regno='$regno' AND email ='$email' and report='No report yet'") or die(mysqli_error($con)); 
$result = mysqli_fetch_array($query);
$report=$result["report"];


$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$documentFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if selected file is a actual document or fake document

// Check if file already exists
if (file_exists($target_file)) {

    header( "refresh:0;url=intern_page.php?v=2" ); 
    echo "<script>alert('Sorry,file already exists.');</script>";

    $uploadOk = 0;
}
// Check file size

// Allow certain file formats
if($documentFileType != "pdf" && $documentFileType != "docx" && $documentFileType != "doc" && $documentFileType != "ppt") {
    header( "refresh:0;url=intern_page.php?v=2" ); 
    echo "<script>alert('Sorry, only PDF,PPT, DOC & DOCX files are allowed');</script>";

    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header( "refresh:0;url=intern_page.php?v=2" ); 
    echo "<script>alert('Sorry, your file was not uploaded.');</script>";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $sql ="UPDATE task SET report='$target_file' WHERE regno='$regno' AND email ='$email' and report='No report yet'";
        $result = mysqli_query($con,"SELECT * FROM task WHERE regno='$regno' AND email ='$email' and report='No report yet'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['fileToUpload']['name'])){
                mysqli_query($con,$sql)or die(mysqli_error($con));
        header( "refresh:0;url=intern_page.php?v=report" );
        echo "<script>alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded');</script>";

    }
}
    } else {
        header( "refresh:0;url=intern_page.php?v=2" );
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    }
}
?> 
 


