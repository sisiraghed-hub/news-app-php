<?php
// استدعاء الاتصال بقاعدة البيانات
require_once __DIR__ . '/connectioOnDatabase.php';

// جلب جميع الفئات في جدول
$res = $conn->query("SELECT id, name FROM categories ORDER BY id DESC");
?>
<h2>List Categories</h2>
<table border="1" cellpadding="6">
  <tr><th>#</th><th>Name</th></tr>
  <?php while($row = $res->fetch_assoc()): ?>
    <tr>
      <td><?php echo (int)$row['id']; ?></td>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>
