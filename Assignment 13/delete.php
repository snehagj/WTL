<!DOCTYPE html>
<html>
<body>

<?php
// Check if the file exists before deleting
$file = "example.txt";
if (file_exists($file)) {
    unlink($file);  // Delete the file
    echo "File deleted successfully!";
} else {
    echo "File does not exist!";
}
?>

</body>
</html>

