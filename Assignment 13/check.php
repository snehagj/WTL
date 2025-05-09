<!DOCTYPE html>
<html>
<body>

<?php
$file = "example.txt";
if (file_exists($file)) {
    echo "File exists!";
} else {
    echo "File does not exist!";
}
?>

</body>
</html>