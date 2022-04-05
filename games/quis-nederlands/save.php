<?php

include '../../dbConnection.php';
session_start();
$score = $_POST['score'];

$useruid = $_SESSION['userid'];

$sqql = "SELECT * FROM `quiz_score` WHERE `useruid` = '$useruid'";
$sql = "INSERT INTO `quiz_score`(`score`, `useruid`) VALUES ('$score','$useruid')";
$sqll = "UPDATE `quiz_score` SET `score` = '$score' WHERE `quiz_score`.`useruid` = $useruid;";
$result = mysqli_query($conn, $sqql);
if (mysqli_num_rows($result) > 0) {
	if (mysqli_query($conn, $sqll)) {
		echo json_encode(array("statusCode" => 200));
		header("Location: Quiz-Nedelands.php");
	} else {
		echo json_encode(array("statusCode" => 201));
		header("Location: Quiz-Nedelands.php");
	}
} else {
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode" => 200));
		header("Location: Quiz-Nedelands.php");
	} else {
		echo json_encode(array("statusCode" => 201));
		header("Location: Quiz-Nedelands.php");
	}
}
mysqli_close($conn);
