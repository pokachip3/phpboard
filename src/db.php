<?php
$conn = mysqli_connect(
    'db',     
    'exampleuser', 
    'examplepass', 
    'exampledb', 
    3306
);

if (!$conn) {
    die("DB 연결 실패: " . mysqli_connect_error());
}
?>
