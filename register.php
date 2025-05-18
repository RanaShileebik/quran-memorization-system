<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role'];

    $sql = "INSERT INTO users (user_name, user_email, user_password, user_role) 
            VALUES ('$name', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "تم تسجيل المستخدم بنجاح!";
    } else {
        echo "خطأ: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label>الاسم:</label><br>
    <input type="text" name="name" required><br>

    <label>البريد الإلكتروني:</label><br>
    <input type="email" name="email" required><br>

    <label>كلمة السر:</label><br>
    <input type="password" name="password" required><br>

    <label>الدور:</label><br>
    <select name="role" required>
        <option value="مشرف">مشرف</option>
        <option value="محفظ">محفظ</option>
        <option value="طالب">طالب</option>
    </select><br><br>

    <button type="submit">تسجيل</button>
</form>