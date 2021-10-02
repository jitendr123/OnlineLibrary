<?php
      include "connection.php";

      $sql="SELECT * FROM se_document";

      $result=mysqli_query($db,$sql);
      $files= mysqli_fetch_all($result,MYSQLI_ASSOC);

      if(isset($_POST['save']))
      {
          $filename=$_FILES['myfile']['name'];

          $destination='uploads/'. $filename;

          $extension= pathinfo($filename,PATHINFO_EXTENSION);

          $file=$_FILES['myfile']['tmp_name'];

          $size=$_FILES['myfile']['size'];

          if(!in_array($extension,['pdf','png','jpg','txt','cpp','c']))
          {
              echo " Your file extension must be .pdf .png or .jpg";
          }
          elseif($_FILES['myfile']['size']>1000000000)
          {
            echo " file is too large";
          }
          else{
              if(move_uploaded_file($file,$destination))
              {
                  $sql="INSERT INTO se_document(name,size,downloads)
                  VALUES('$filename','$size',0)";

                if(mysqli_query($db,$sql))
                {
					echo "<script>";
					echo 'alert("File uploaded sucessfully")';
					echo "</script>";
					header("refresh:0.1; url=./se_document.php");
                }
                else
                {
                    echo "failed to upload file";
                }
              }
          }
      }



// if(isset($_GET['file_id']))
// {
//     $id=$_GET['file_id'];

//     $sql="SELECT * FROM se_document where id = $id ";

//     $result=mysqli_query($db,$sql);

//     $file=mysqli_fetch_assoc($result);

//     $filepath='uploads/'.$file['name'];

//     if(file_exists($filepath))
//     {
//         header('Content-Type : application/octet-stream');

//         header('Content-Description : File Transfer');

//         header('Content-Disposition : attachment; filename='  . 
//         basename($filepath));

//         header('Expires : 0');

//         header('Cache-Control : must-revalidate');

//         header('pragma : public');

//         header('Content-Length:' . filesize('uploads/'.$file['name']));

//         readfile('uploads/' . $file['name']);

//         $newCount=$file['downloads']+1;

//         $updateQuery= " UPDATE se_document SET downloads=$newCount where id=$id";

//         mysqli_query($db,$updateQuery);


//         exit;
//     }
// }
?>