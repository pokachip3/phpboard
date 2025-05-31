<?php
include 'session.php';
session_destroy();
echo "로그아웃 되었습니다. <a href='login.php'>다시 로그인</a>";
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
