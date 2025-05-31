<?php
include 'db.php';
include 'session.php';

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row || $_SESSION['user_id'] != $row['user_id']) {
    echo "삭제 권한이 없습니다.";
    exit;
}

$sql = "DELETE FROM posts WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: board.php");
    exit;
} else {
    echo "삭제 실패: " . mysqli_error($conn);
}
?>
