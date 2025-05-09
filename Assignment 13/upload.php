<?php
// Mapping for MIME types
$mimeTypes = [
    'jpg' => 'image/jpeg',
    'png' => 'image/png',
    'pdf' => 'application/pdf',
    'txt' => 'text/plain'
];

// File size limits in bytes (1MB = 1048576 bytes)
$fileSizeLimits = [
    'jpg' => 2 * 1048576,  // 2 MB
    'png' => 2 * 1048576,  // 2 MB
    'pdf' => 5 * 1048576,  // 5 MB
    'txt' => 1 * 1048576   // 1 MB
];

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileTypeKey = $_POST['fileType'] ?? '';

    if (isset($_FILES['uploadedFile']) && isset($mimeTypes[$fileTypeKey])) {
        if ($_FILES['uploadedFile']['error'] === 0) {
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileType = mime_content_type($fileTmpPath);
            $fileSize = $_FILES['uploadedFile']['size'];

            if ($fileType === $mimeTypes[$fileTypeKey]) {
                if ($fileSize <= $fileSizeLimits[$fileTypeKey]) {
                    $destination = 'uploads/' . $fileTypeKey . '_' . basename($fileName);

                    // Create uploads folder if it doesn't exist
                    if (!is_dir('uploads')) {
                        mkdir('uploads', 0755, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $destination)) {
                        echo "<p style='color: green; text-align: center;'>File uploaded successfully as $destination!</p>";
                    } else {
                        echo "<p style='color: red; text-align: center;'>Error moving the uploaded file.</p>";
                    }
                } else {
                    $maxMB = $fileSizeLimits[$fileTypeKey] / 1048576;
                    echo "<p style='color: red; text-align: center;'>File is too large. Maximum allowed size for " . strtoupper($fileTypeKey) . " is $maxMB MB.</p>";
                }
            } else {
                echo "<p style='color: red; text-align: center;'>Invalid file type. Expected a " . strtoupper($fileTypeKey) . " file.</p>";
            }
        } else {
            echo "<p style='color: red; text-align: center;'>Error uploading file.</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Invalid form submission.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Forms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }

        h2, h3 {
            text-align: center;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        input[type="file"] {
            flex: 1;
        }

        input[type="submit"] {
            background-color: #007BFF;
            border: none;
            color: white;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>File Upload</h2>

        <h3>Upload a JPG Image (Max 2MB):</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="fileType" value="jpg">
            <input type="file" name="uploadedFile" accept="image/jpeg" required>
            <input type="submit" value="Upload JPG">
        </form>

        <h3>Upload a PNG Image (Max 2MB):</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="fileType" value="png">
            <input type="file" name="uploadedFile" accept="image/png" required>
            <input type="submit" value="Upload PNG">
        </form>

        <h3>Upload a PDF Document (Max 5MB):</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="fileType" value="pdf">
            <input type="file" name="uploadedFile" accept="application/pdf" required>
            <input type="submit" value="Upload PDF">
        </form>

        <h3>Upload a TXT File (Max 1MB):</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="fileType" value="txt">
            <input type="file" name="uploadedFile" accept=".txt" required>
            <input type="submit" value="Upload TXT">
        </form>
    </div>
</body>
</html>
