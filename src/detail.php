<?php
include 'db.php';
include 'session.php';

$id = $_GET['id'];
$sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "글을 찾을 수 없습니다.";
    exit;
}
?>

<h2><?= htmlspecialchars($row['title']) ?></h2>
<p>작성자: <?= htmlspecialchars($row['username']) ?></p>
<p>작성일: <?= $row['created_at'] ?></p>
<p><?= nl2br(htmlspecialchars($row['content'])) ?></p>

<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['user_id']) : ?>
    <p>
        <a href="update.php?id=<?= $row['id'] ?>">수정</a> | 
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('삭제하시겠습니까?');">삭제</a>
    </p>
<?php endif; ?>

<p><a href="board.php">목록</a></p>
