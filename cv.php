<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .cv-container {
            width: 800px;
            max-width: 100%;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .cv-header {
            display: flex;
            align-items: center;
            text-align: left;
        }
        .cv-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }
        .cv-section {
            text-align: left;
            margin-top: 20px;
        }
        .cv-section h2 {
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            font-size: 1.5em;
        }
        .skills ul {
            display: flex;
            flex-wrap: wrap;
            padding: 0;
        }
        .skills li {
            background-color: #000;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 5px;
            font-size: 0.9em;
            list-style: none;
        }
    </style>
</head>
<body>
    <div class="cv-container">
        <div class="cv-header">
            <?php if (!empty($_SESSION['foto'])): ?>
                <img src="<?php echo $_SESSION['foto']; ?>" alt="Foto Profil">
            <?php endif; ?>
            <div>
                <h1><?php echo $_SESSION['nama'] ?? 'Nama Tidak Tersedia'; ?></h1>
                <p><strong>Tempat, Tanggal Lahir:</strong> <?php echo $_SESSION['ttl'] ?? '-'; ?></p>
            </div>
        </div>

        <div class="cv-section">
            <h2>Tentang Saya</h2>
            <p><?php echo $_SESSION['deskripsi'] ?? 'Tidak ada deskripsi yang tersedia.'; ?></p>
        </div>

        <div class="cv-section">
            <h2>Riwayat Pendidikan</h2>
            <p><?php echo $_SESSION['pendidikan'] ?? '-'; ?></p>
        </div>

        <div class="cv-section">
            <h2>Pengalaman Kerja</h2>
            <p><?php echo $_SESSION['pengalaman'] ?? '-'; ?></p>
        </div>

        <div class="cv-section skills">
            <h2>Keahlian</h2>
            <ul>
                <li><?php echo $_SESSION['skill1'] ?? '-'; ?></li>
                <li><?php echo $_SESSION['skill2'] ?? '-'; ?></li>
                <li><?php echo $_SESSION['skill3'] ?? '-'; ?></li>
            </ul>
        </div>
    </div>
</body>
</html>
