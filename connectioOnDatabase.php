<?php
 

// إنشاء الاتصال
$conn = new mysqli("localhost", "root", "","news app" );
// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}
?>
