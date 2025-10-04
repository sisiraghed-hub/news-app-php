<?php
require_once __DIR__ . '/connectioOnDatabase.php';
$sql = "SELECT n.id, n.title, c.name AS category, n.details, n.image_path, n.user_id
        FROM news n
        JOIN categories c ON c.id = n.category_id
        WHERE n.deleted = 1
        ORDER BY n.id DESC";
$res = $conn->query($sql);
?>
<h2>Deleted News</h2>
<table border="1" cellpadding="6">
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Category</th>
    <th>Details</th>
    <th>Image</th>
    <th>User ID</th>
    <th>Action</th>
  </tr>
  <?php while($r = $res->fetch_assoc()): ?>
    <tr>
      <td><?php echo (int)$r['id']; ?></td>
      <td><?php echo htmlspecialchars($r['title']); ?></td>
      <td><?php echo htmlspecialchars($r['category']); ?></td>
      <td><?php echo htmlspecialchars($r['details']); ?></td>
      <td><?php if(!empty($r['image_path'])): ?><img src="<?php echo htmlspecialchars($r['image_path']); ?>" width="80"><?php endif; ?></td>
      <td><?php echo (int)$r['user_id']; ?></td>
      <td><a href="/php_corse/final_assig/restore_news.php?id=<?php echo (int)$r['id']; ?>">Restore</a></td>
    </tr>
  <?php endwhile; ?>
</table>
<p><a href="/php_corse/final_assig/dashboard.php">Back to Dashboard</a></p>
