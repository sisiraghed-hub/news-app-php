<?php
// استدعاء ملف الاتصال بقاعدة البيانات
require_once __DIR__ . '/connectioOnDatabase.php';

// عند إرسال النموذج يتم إضافة المستخدم إلى جدول users
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'] ?? '';
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // تخزين كلمة المرور في الحقل password_hash
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql  = "INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed);
    $stmt->execute();
    header("Location: /php_corse/final_assig/login.php"); // ← تحويل بعد النجاح
    exit;
  ;
}
?>

<!-- فورم إنشاء الحساب -->
<h2>Create Account</h2>
<form method="post">
  <label>Name:</label><br>
  <input type="text" name="name" required><br><br>

  <label>Email:</label><br>
  <input type="email" name="email" required><br><br>

  <label>Password:</label><br>
  <input type="password" name="password" required><br><br>

  <button type="submit">Create Account</button>
</form>
