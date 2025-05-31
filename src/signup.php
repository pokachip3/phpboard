<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "회원가입 성공! <a href='login.php'>로그인</a>";
    } else {
        echo "회원가입 실패: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <h2>회원가입</h2>
    ID: <input type="text" name="username" required><br>
    PW: <input type="password" name="password" required><br>
    <button type="submit">가입</button>
</form>
