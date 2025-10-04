<?php
// استدعاء الاتصال بقاعدة البيانات
require_once __DIR__ . '/connectioOnDatabase.php';

// بدء الجلسة
if (session_status() === PHP_SESSION_NONE) session_start();

// عند إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';

    // البحث عن المستخدم بالاسم
    $sql  = "SELECT id, password_hash FROM users WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($uid, $hash);

    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['user_id'] = $uid;
        $_SESSION['name']    = $name;
        header("Location: /php_corse/final_assig/dashboard.php");
        exit;
    } else {
        echo "Invalid name or password.";
    }
    $stmt->close();
}
?>

<h2>Login</h2>
<form method="post">
  <label>Name:</label><br>
  <input type="text" name="name" required><br><br>

  <label>Password:</label><br>
  <input type="password" name="password" required><br><br>

  <button type="submit">Login</button>
</form>
