<?php

include "00DBConnect.php";

// 사용자등록시간
$regdate = date("Y-m-d H:i:s");
$user_name = $_POST["user_name"];
// $user_pw = $_POST["user_pw"];

// 자료 삽입 쿼리
$query	= "INSERT INTO `dit_user` (
		`user_id`,
		`user_category`,
		`user_name`,
		`user_email`,
		`user_content`,
		`user_regdate`
		) VALUES (".
		"NULL, '".
		$_POST["user_category"] . "', '".
		$user_name . "', '".
		$_POST["user_email"] . "', '".
		$_POST["user_content"] . "', '".
		$regdate . "'" .
		")";

// 자료 삽입
$result = mysqli_query($dbConn, $query);

// 자료 삽입 결과에 따른 페이지 이동
if($result){
	// user_id 얻기
	$query = "SELECT `user_id`
		FROM `dit_user`
		WHERE
		`user_name` = '" . $user_name . "' AND `user_regdate` = '" . $regdate . "'";
	$user_id = mysqli_fetch_array(mysqli_query($dbConn, $query));

	// Start the session
	session_start();

	// Set session variables
	$_SESSION["user_id"] = $user_id[0];
	$_SESSION["user_name"] = $user_name;

	header("Location: dit.html");

} else {
	// post 보내기
	echo "<html><body onload='document.form1.submit();'>";
	echo "<form name='form1' method='post' action='dit.html'>";
	echo "<input type='hidden' name='result' value='fail'>";
	echo "</form></body></html>";
}

// DB 연결종료
mysqli_close($dbConn);

?>
