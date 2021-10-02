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
					header("refresh:0.1; url=./admin_se_document.php");
                }
                else
                {
                    echo "failed to upload file";
                }
              }
          }
      }


?>