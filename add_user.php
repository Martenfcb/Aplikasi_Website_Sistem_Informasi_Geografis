<?php
include('koneksi.php');

// Increase memory limit
ini_set('memory_limit', '1024M');

// Handle form submission for adding a new user
if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $role = $_POST['role'];

    $query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sss", $username, $password, $role);
    if ($stmt->execute()) {
        echo "<script>alert('User berhasil ditambahkan!'); window.location='add_user.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menambahkan user.');</script>";
    }
}

// Handle user deletion
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $query = "DELETE FROM users WHERE id=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('User berhasil dihapus!'); window.location='add_user.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus user.');</script>";
    }
}

// Handle user editing
if (isset($_POST['edit_user'])) {
    $id = intval($_POST['id']);
    $username = $_POST['username'];
    $password = !empty($_POST['password']) ? ($_POST['password']) : $_POST['current_password'];
    $role = $_POST['role'];

    $query = "UPDATE users SET username=?, password=?, role=? WHERE id=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssi", $username, $password, $role, $id);
    if ($stmt->execute()) {
        echo "<script>alert('User berhasil diperbarui!'); window.location='add_user.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui user.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="add_user.css">
</head>
<style>

</style>
<body>
<?php include('header.php'); ?>
    <div class="container">
        <main>
            <h2>Tambah User Baru</h2>
            <form action="add_user.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>

                <button type="submit" name="add_user">Tambah User</button>
            </form>

            <?php
            // Display users in a table
            $result = $db->query("SELECT * FROM users");
            if ($result->num_rows > 0) {
                echo '<table>';
                echo '<thead><tr><th>ID</th><th>Username</th><th>Password</th><th>Role</th><th>Aksi</th></tr></thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td>' . $row['role'] . '</td>';
                    echo '<td class="action-buttons">
                            <a href="edit_user.php?id=' . $row['id'] . '" class="edit-button">Edit</a>
                            <a href="add_user.php?delete=' . $row['id'] . '" class="delete-button">Hapus</a>
                          </td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>Tidak ada user yang tersedia.</p>';
            }
            ?>
        </main>
    </div>
</body>
</html>
