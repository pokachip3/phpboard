<?php
include 'db.php';
include 'session.php';

$sql = "SELECT posts.id, title, username, posts.created_at 
        FROM posts JOIN users ON posts.user_id = users.id 
        ORDER BY posts.id DESC";
$result = mysqli_query($conn, $sql);
?>

<p>
    <a href="index.php">홈</a> |
    <a href="board.php">게시판</a> |
    <?php if (isset($_SESSION['username'])): ?>
        <a href="logout.php">로그아웃</a>
    <?php else: ?>
        <a href="login.php">로그인</a> |
        <a href="signup.php">회원가입</a>
    <?php endif; ?>
</p>


<h2>게시판 목록</h2>

<hr>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <p>
        <a href="detail.php?id=<?= $row['id'] ?>">
            <?= htmlspecialchars($row['title']) ?>
        </a><br>
        <small>작성자: <?= htmlspecialchars($row['username']) ?> | 작성일: <?= $row['created_at'] ?></small>
    </p>
    <hr>
<?php endwhile; ?>
