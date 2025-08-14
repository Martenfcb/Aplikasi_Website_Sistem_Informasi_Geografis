<?php
session_start();
include('koneksi.php');

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: halaman_admin.php");
    } else if ($_SESSION['role'] == 'petugas') {
        header("Location: halaman_petugas.php");
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Query untuk mengambil data pengguna dari database
    $sql = "SELECT * FROM users WHERE username = ? AND password = ? AND role = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        
        if ($row['role'] == 'admin') {
            header("Location: halaman_admin.php");
        } else if ($row['role'] == 'petugas') {
            header("Location: halaman_petugas.php");
        }
        exit();
    } else {
        $error = "Username, password atau role salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
/* Import Font Google */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

body {
    font-family: 'Roboto', sans-serif;
    background: radial-gradient(circle at top right, #6a11cb, #2575fc); /* Gradien radial latar belakang */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden; /* Menghilangkan scrollbar */
}

.login-container {
    background: #fff;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2); /* Bayangan kotak lebih dalam */
    max-width: 450px;
    width: 100%;
    text-align: center;
    position: relative;
    overflow: hidden;
    animation: fadeInUp 0.8s ease-out; /* Animasi masuk dari bawah */
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.login-container::before {
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    width: 120%;
    height: 120%;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.1), rgba(255, 255, 255, 0.2));
    border-radius: 50%;
    z-index: 0;
    transform: rotate(-30deg);
}

h2 {
    color: #333;
    margin-bottom: 30px;
    font-weight: 700;
    font-size: 26px;
    z-index: 1;
    position: relative;
}

label {
    display: block;
    margin-bottom: 12px;
    font-weight: 500;
    color: #555;
    text-align: left;
}

input[type="text"], input[type="password"], select {
    width: 100%;
    padding: 14px;
    margin-bottom: 20px;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    box-sizing: border-box;
    font-size: 16px;
    color: #333;
    background-color: #f9f9f9;
    transition: border 0.3s ease, box-shadow 0.3s ease;
    z-index: 1;
    position: relative;
}

input[type="text"]:focus, input[type="password"]:focus, select:focus {
    border-color: #2575fc;
    outline: none;
    box-shadow: 0 0 12px rgba(37, 117, 252, 0.3); /* Bayangan lebih lembut saat fokus */
}

button {
    width: 100%;
    padding: 14px;
    background-color: #2575fc;
    border: none;
    border-radius: 12px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Bayangan tombol */
    z-index: 1;
    position: relative;
}

button:hover {
    background-color: #1e62d4;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam saat hover */
}

button:active {
    background-color: #1a4baf;
    transform: translateY(1px) scale(1.02); /* Efek menekan tombol */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan saat diklik */
}

.error {
    color: #d9534f;
    margin-bottom: 20px;
    font-weight: 500;
    z-index: 1;
    position: relative;
}

@media (max-width: 480px) {
    .login-container {
        padding: 25px;
        box-shadow: none; /* Hapus bayangan untuk layar kecil */
    }
}

</style>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <button type="submit">Silakan Login</button>
    </form>
</div>
</body>
</html>