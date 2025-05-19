<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $level = $_POST['level'];

    $stmt = $conn->prepare("INSERT INTO students (name, phone, level) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $level);
    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "خطأ في إضافة الطالب.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8" />
    <title>إضافة طالب</title>
</head>
<body>
    <h2>إضافة طالب جديد</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>الاسم:</label><br />
        <input type="text" name="name" required /><br />

        <label>رقم الهاتف:</label><br />
        <input type="text" name="phone" required /><br />

        <label>المستوى:</label><br />
        <input type="text" name="level" required /><br />

        <button type="submit">حفظ</button>
    </form>
    <a href="dashboard.php">رجوع</a>
</body>
</html>
