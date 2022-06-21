<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Project</title>
</head>
<body>
    <?php 
        if (isset($_POST['upload-btn'])) {
            $filename = $_FILES['fileUpload']['name'] ;
            $temp = $_FILES['fileUpload']['tmp_name'] ;
            
            // Sanitize

           $fileNameArr = explode('.',$filename);
           $newFilename = $fileNameArr[0];
            $Newfilename = date("Y-m-d h:i:sa").$newFilename ;

           $extension = $fileNameArr[1];
           $allowFiletype = ['png','jpg','txt','JPG'];
           if (in_array($extension,$allowFiletype)) {
            // $folderToSave = $_SERVER['DOCUMENT_ROOT'] . "/all folder after htdocs";
               $dest =  $_SERVER['DOCUMENT_ROOT']  ."/code/form/uploadfile/". $Newfilename . "." .$extension;
            //    $dest = $Newfilename . "." .$extension;
               if(move_uploaded_file($temp,$dest)){
                   $msg = "File uploaded";
               }else{
                   $msg = "File upload fail";
               }
           }else{
               $msg = "file upload fail.Allow types are ". implode(',',$allowFiletype);
           }

           echo $msg;
          // $desti = "./uploadfile/". $filename;
        //   if (move_uploaded_file($temp,$desti)) {
        //       echo "Successful";
        //       echo $_FILES['fileUpload']['error'];
        //   }else{
        //       echo "Fail";
        //   }

        }else{ ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <input type="file" name="fileUpload" value="">
        <input type="submit" name="upload-btn" value="Upload">
    </form>
      <?php  }

     ?>
    
</body>
</html>