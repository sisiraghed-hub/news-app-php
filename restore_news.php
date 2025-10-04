<?php
require_once __DIR__ . '/connectioOnDatabase.php';
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("UPDATE news SET deleted = 0 WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location: /php_corse/final_assig/deleted_news.php");
exit;
