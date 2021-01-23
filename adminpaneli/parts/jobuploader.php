


<?php
include('../../config/db.php');
$jobname=$_POST["job"];

$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {

$path= '../../uploads/';
if (empty($name))
{
echo "Please choose a file";
}
else if (!empty($name)){
if (($fileextension !== "jpg") && ($fileextension !== "jpeg") && ($fileextension !== "png") && ($fileextension !== "bmp"))
{
echo "The file extension must be .jpg, .jpeg, .png, or .bmp in order to be uploaded";
}


else if (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp"))
{
if (move_uploaded_file($tmp_name, $path.$name)) {
    $query="INSERT INTO works(id,image,workname) VALUES (NULL, '$name','$jobname');";
    if ($conn->query($query) == TRUE) {
        ?>
        <script>
      window.location.href=('../adminworks.php');
      exit;
    </script>
    <?php
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
}
}