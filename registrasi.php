<?php
header("Access-Control-Allow-Origin: *");
$conn = new mysqli("localhost", "root", "", "galacraft");
extract($_POST);
$arr = [];

$sql = "INSERT INTO user(email,password,alamat,nomor) VALUES(?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss",$email,$password,$alamat,$nomor);
$stmt->execute();
if($stmt->affected_rows > 0)
{
  $arr = ["result" => "success", "id" => $conn ->insert_id];
} else {
  $arr = ["result" => "fail",'error' => $conn->error];
}
echo json_encode($arr);

?>