<?php
// استدعاء الاتصال بقاعدة البيانات
require_once __DIR__ . '/connectioOnDatabase.php';

// حفظ الفئة عند إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';

    $sql  = "INSERT INTO categories (name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();

    header("Location: /php_corse/final_assig/list_categories.php");
    exit;;
}
?>
<h2>Add Category</h2>
<form method="post">
  <label>Category Name (e.g., Sports, Politics):</label><br>
  <input type="text" name="name" required><br><br>
  <button type="submit">Add Category</button>
</form>
