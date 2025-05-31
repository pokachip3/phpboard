<?php
include 'db.php';
include 'session.php';

if (!isset($_SESSION['user_id'])) {
    echo "로그인이 필요합니다. <a href='login.php'>로그인</a>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content', $user_id)";
    if (mysqli_query($conn, $sql)) {
        header("Location: board.php");
        exit;
    } else {
        echo "글쓰기 실패: " . mysqli_error($conn);
    }
}
?>

<h2>글쓰기</h2>
<form method="POST">
    제목: <input type="text" name="title" required><br>
    내용:<br>
    <textarea name="content" rows="10" cols="50" required></textarea><br>
    <button type="submit">작성</button>
</form>
