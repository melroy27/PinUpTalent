<?php
if(isset($Post['submit'])){
    $file=$Files['file'];
    print_r($file);
    $fileName=$Files['file']['name'];
    $fileTmpName=$Files['file']['tmp_name'];
    $fileSize=$Files['file']['size'];
    $fileError=$Files['file']['size'];
    $fileType=$Files['file']['type'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('jpg','jpeg','png','pdf');
    if(in_array($fileActualExt,$allowed))
    {
        if($fileError === 0)
        {
            if($fileSize<1000000)
            {
                $fileNameNew=uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location: uploadfile.php?uploadsuccess");
            }
            else
            {
                echo "Your file is too big!";
            }
        }
        else
        {
            echo "There was an erroe uploading your file!";
        }
    }
    else
    {
        echo "You cannot uploads files of this type!";
    }
}
?>