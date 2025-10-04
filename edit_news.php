<?php
require_once __DIR__ . '/connectioOnDatabase.php';

// جلب بيانات الخبر حسب id
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT title, details FROM news WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($title, $details);
$stmt->fetch();
$stmt->close();

// عند حفظ التعديلات
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newTitle   = $_POST['title'] ?? '';
    $newDetails = $_POST['details'] ?? '';
    $up = $conn->prepare("UPDATE news SET title=?, details=? WHERE id=?");
    $up->bind_param("ssi", $newTitle, $newDetails, $id);
    $up->execute();
    header("Location: /php_corse/final_assig/list_news.php");
    exit;
}
?>
<h2>Edit News</h2>
<form method="post">
  <label>Title:</label><br>
  <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br><br>
  
  <label>Details:</label><br>
  <textarea name="details" rows="5" required><?php echo htmlspecialchars($details); ?></textarea><br><br>
  
  <button type="submit">Save Changes</button>
</form>
