<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $uploadDir = 'public/uploads/';
    $uploadFile = $uploadDir . uniqid() . basename($_FILES['avatar']['name']);
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg','gif','png','webp'];
    $maxFileSize = '1Mo';
    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
    if( (!in_array($extension, $authorizedExtensions))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
    }
    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
        $errors[] = "Votre fichier doit faire moins de 2M !";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>FILE</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<label for="imageUpload">Upload an profile image</label>
<input type="file" name="avatar" id="imageUpload" />
<button name="send">Send</button>
</form>
</body>
</html>

