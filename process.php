<?php
session_start();
/**
 * Created by PhpStorm.
 * User: shuav
 * Date: 7/22/2020
 * Time: 11:19 AM
 */
if (isset($_POST['submit'])){
    $count = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        foreach ($_FILES['files']['name'] as $i => $file) {
            $extension = explode('.',$file);
            $extension = strtolower($extension[count($extension)-1]);;
            $file_extension = trim($_POST['file_extension']);
            if($file_extension == 'all'){
                if (strlen($_FILES['files']['name'][$i]) > 1) {
                    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], 'moved_files/'.$_FILES['files']['name'][$i])) {
                        $count++;
                    }
                }
            }
            elseif($extension == $file_extension){
                if (strlen($_FILES['files']['name'][$i]) > 1) {
                    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], 'moved_files/'.$_FILES['files']['name'][$i])) {
                        $count++;
                    }
                }
            }
        }
    }
    $_SESSION['message'] = $count.' files have been moved to folder';
    header('location:index.php');
}