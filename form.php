<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['ttl'] = $_POST['ttl'];
    $_SESSION['pendidikan'] = $_POST['pendidikan'];
    $_SESSION['pengalaman'] = $_POST['pengalaman'];
    $_SESSION['skill1'] = $_POST['skill1'];
    $_SESSION['skill2'] = $_POST['skill2'];
    $_SESSION['skill3'] = $_POST['skill3'];
    $_SESSION['deskripsi'] = $_POST['deskripsi'];

    // Upload Foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
        $_SESSION['foto'] = $target_file;
    }

    header("Location: cv.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input CV</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: 600;
        }
        input[type="text"], input[type="file"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        textarea {
            resize: none;
        }
        input[type="submit"] {
            width: 100%;
            background: #2575fc;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 15px;
        }
        input[type="submit"]:hover {
            background: #1a5ecd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Input CV</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>
            
            <label for="ttl">Tempat, Tanggal Lahir:</label>
            <input type="text" name="ttl" required>

            <label for="pendidikan">Riwayat Pendidikan:</label>
            <input type="text" name="pendidikan" required>

            <label for="pengalaman">Pengalaman Kerja:</label>
            <textarea name="pengalaman" rows="3" required></textarea>

            <label for="deskripsi">Deskripsi Diri:</label>
            <textarea name="deskripsi" rows="3" required></textarea>
            
            <label for="foto">Upload Foto:</label>
            <input type="file" name="foto" accept="image/*">

            <label for="skill1">Skill 1:</label>
            <input type="text" name="skill1" required>

            <label for="skill2">Skill 2:</label>
            <input type="text" name="skill2" required>

            <label for="skill3">Skill 3:</label>
            <input type="text" name="skill3" required>

            <input type="submit" value="Simpan dan Lihat CV">
        </form>
    </div>
</body>
</html>
