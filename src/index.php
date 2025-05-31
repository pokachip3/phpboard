<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP 게시판</title>
</head>
<body>
    <h1>싸이코 3주차 과제_스마트보안학부 2024350034 한주영</h1>

    <p><a href="board.php">게시판</a></p>

    <?php if (isset($_SESSION['username'])): ?>
        <p><a href="logout.php">로그아웃</a></p>
    <?php else: ?>
        <p><a href="login.php">로그인</a> | <a href="signup.php">회원가입</a></p>
    <?php endif; ?>
</body>
</html>
