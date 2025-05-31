<?php
include 'db.php';
include 'session.php';

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row || $_SESSION['user_id'] != $row['user_id']) {
    echo "수정 권한이 없습니다.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: detail.php?id=$id");
        exit;
    } else {
        echo "수정 실패: " . mysqli_error($conn);
    }
}
?>

<h2>글 수정</h2>
<form method="POST">
    제목: <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br>
    내용:<br>
    <textarea name="content" rows="10" cols="50" required><?= htmlspecialchars($row['content']) ?></textarea><br>
    <button type="submit">수정</button>
</form>
