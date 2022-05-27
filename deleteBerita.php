<?php
header("Access-Control-Allow-Origin: *");
$conn = new mysqli("localhost", "hybrid_160419034", "ubaya", "hybrid_160419034");
extract($_POST);
$arr = [];

$sql = "DELETE FROM berita where idberita = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $idberita);
$stmt->execute();

if($stmt->affected_rows > 0)
{
  $arr = ["result" => "success"];
} else {
  $arr = ["result" => "fail",'error' => $conn->error];
}
echo json_encode($arr);

?>