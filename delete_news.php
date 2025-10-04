<?php
require_once __DIR__ . '/connectioOnDatabase.php';

$id  = (int)($_GET['id'] ?? 0);
$sql = "UPDATE news SET deleted = 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: /php_corse/final_assig/list_news.php");
exit;

