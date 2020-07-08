<?php

    function uploadImage($image)  // UPLOAD IMAGE
    {
        if (!empty($_POST)) {
            $folder = "uploads/";
            $target_file = $folder . basename($image);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            // Check if image file is correct
            if (isset($_POST["submit"])) {
                $check = getimagesize($image);
                if ($check == false) {
                    throw new Exception('The uploaded file is not an image!');
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) { // no exception because we Do want to change users picture but not upload it again
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["avatar"]["size"] > 2097152) { // file max size is 2mb
                throw new Exception('The image you are trying to upload is to big, max 2MB!');
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                throw new Exception('Only JPG, JPEG, PNG & GIF files are allowed');
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk != 0) {
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    return true;
                } else {
                    throw new Exception('Something went wrong while upploading your picture, please try again!');
                }
            }
        }
    }
