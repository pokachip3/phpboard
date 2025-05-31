<?php
include 'db.php';
include 'session.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;
            echo "로그인 성공! <a href='board.php'>게시판으로</a>";
            exit;
        } else {
            echo "비밀번호가 틀렸습니다.";
        }
    } else {
        echo "존재하지 않는 사용자입니다.";
    }
}
?>

<form method="POST">
    <h2>로그인</h2>
    ID: <input type="text" name="username" required><br>
    PW: <input type="password" name="password" required><br>
    <button type="submit">로그인</button>
</form>