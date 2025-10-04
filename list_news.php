<?php
// استدعاء الاتصال بقاعدة البيانات
require_once __DIR__ . '/connectioOnDatabase.php';

// جلب الأخبار غير المحذوفة
$sql = "SELECT n.id, n.title, c.name AS category, n.user_id
        FROM news n
        JOIN categories c ON c.id = n.category_id
        WHERE n.deleted = 0
        ORDER BY n.id DESC";
$res = $conn->query($sql);
?>
<h2>List All News</h2>
<table border="1" cellpadding="6">
  <tr><th>#</th><th>Title</th><th>Category</th><th>User ID</th><th>Action</th></tr>
  <?php while($r = $res->fetch_assoc()): ?>
    <tr>
      <td><?php echo (int)$r['id']; ?></td>
      <td><?php echo htmlspecialchars($r['title']); ?></td>
      <td><?php echo htmlspecialchars($r['category']); ?></td>
      <td><?php echo (int)$r['user_id']; ?></td>
      <td>
        <a href="/php_corse/final_assig/edit_news.php?id=<?php echo (int)$r['id']; ?>">Edit</a> |
        <a href="/php_corse/final_assig/delete_news.php?id=<?php echo (int)$r['id']; ?>"
           onclick="return confirm('Soft delete this news?');">Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
<p><a href="/php_corse/final_assig/dashboard.php">Back to Dashboard</a></p>

