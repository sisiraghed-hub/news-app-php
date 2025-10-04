<?php
// استدعاء الاتصال بقاعدة البيانات
require_once __DIR__ . '/connectioOnDatabase.php';

// جلب الفئات لعرضها في القائمة
$cats = $conn->query("SELECT id, name FROM categories ORDER BY name ASC");

// حفظ الخبر عند إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title      = $_POST['title'] ?? '';
    $categoryId = (int)($_POST['category_id'] ?? 0);
    $details    = $_POST['details'] ?? '';
    $userId     = (int)($_POST['user_id'] ?? 0);
    $imagePath  = null;

    // رفع الصورة (اختياري)
    if (!empty($_FILES['image']['name'])) {
        $dir = __DIR__ . '/uploads';
        if (!is_dir($dir)) { @mkdir($dir, 0777, true); }
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $new = 'img_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $dir . '/' . $new);
        $imagePath = '/php_corse/final_assig/uploads/' . $new;
    }

    $sql  = "INSERT INTO news (title, category_id, details, image_path, user_id, deleted)
             VALUES (?, ?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisss", $title, $categoryId, $details, $imagePath, $userId);
    $stmt->execute();
    echo "News added ✔";
}
?>
<h2>Add News</h2>
<form method="post" enctype="multipart/form-data">
  <label>Title:</label><br>
  <input type="text" name="title" required><br><br>

  <label>Category:</label><br>
  <select name="category_id" required>
    <option value="">-- Select --</option>
    <?php while($c = $cats->fetch_assoc()): ?>
      <option value="<?php echo (int)$c['id']; ?>">
        <?php echo htmlspecialchars($c['name']); ?>
      </option>
    <?php endwhile; ?>
  </select><br><br>

  <label>Details:</label><br>
  <textarea name="details" rows="5" required></textarea><br><br>

  <label>Image (optional):</label><br>
  <input type="file" name="image"><br><br>

  <label>User ID:</label><br>
  <input type="number" name="user_id" required><br><br>

  <button type="submit">Add News</button>
</form>
<p><a href="/php_corse/final_assig/dashboard.php">Back to Dashboard</a></p>
