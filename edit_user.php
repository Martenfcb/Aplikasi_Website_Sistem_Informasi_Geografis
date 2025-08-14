<?php
//session_start();
//if (!isset($_SESSION['username'])) {
    //header('Location: loginUser.php');
  //  exit();
//}
include('header.php');
include('koneksi.php');

$id = intval($_GET['id']);
$result = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "<script>alert('User tidak ditemukan.'); window.location='add_user.php';</script>";
    exit();
}

if (isset($_POST['edit_user'])) {
    $username = $_POST['username'];
    $password = !empty($_POST['password']) ? ($_POST['password']) : $_POST['current_password'];
    $role = $_POST['role'];

    $query = "UPDATE users SET username='$username', password='$password', role='$role' WHERE id=$id";
    if (mysqli_query($db, $query)) {
        echo "<script>alert('User berhasil diperbarui!'); window.location='add_user.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui user.');</script>";
    }
}

// Handle delete user request
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $delete_query = "DELETE FROM users WHERE id=$delete_id";
    if (mysqli_query($db, $delete_query)) {
        echo "<script>alert('User berhasil dihapus!'); window.location='add_user.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus user.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Header styles */
        header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        header .user-info {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        header .user-info a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
        }

        /* Container and layout styles */
        .container {
            display: flex;
            margin-top: 60px;
        }

        aside {
            background-color: #343a40;
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 60px;
            z-index: 999;
        }

        aside nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        aside nav ul li {
            margin: 0;
        }

        aside nav ul li a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #495057;
            transition: background-color 0.3s ease;
        }

        aside nav ul li a:hover {
            background-color: #495057;
        }

        main {
            margin-left: 200px;
            padding: 20px;
            width: calc(100% - 200px);
            background-color: #fff;
            min-height: 100vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Form styles */
        form {
            margin: 20px 0;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            aside {
                width: 100%;
                height: auto;
                position: relative;
            }

            main {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
  
    <div class="container">
        <aside>
            <nav>
                <ul>
                    <li><a href="status_penduduk_semua.php">Data Penduduk</a></li>
                    <li><a href="add_user.php">Add User</a></li>
                </ul>
            </nav>
        </aside>
        <main>
            <h2>Edit User</h2>
            <form method="post" action="edit_user.php?id=<?php echo $id; ?>">
                <input type="hidden" name="current_password" value="<?php echo $user['password']; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>

                <label for="password">Password (Kosongkan jika tidak ingin mengubah):</label>
                <input type="password" id="password" name="password">

                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="petugas" <?php echo $user['role'] == 'petugas' ? 'selected' : ''; ?>>Petugas</option>
                </select>

                <button type="submit" name="edit_user">Update User</button>
            </form>
        </main>
    </div>

</body>
</html>
