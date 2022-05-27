<?php
header("Access-Control-Allow-Origin: *");
$conn = new mysqli("localhost", "hybrid_160419034", "ubaya", "hybrid_160419034");
extract($_POST);
$arr = [];

$sql = "INSERT INTO berita(judul,keterangan,idkategori, pertanyaan) VALUES(?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis",$judul,$keterangan,$idkategori,$pertanyaan);
$stmt->execute();
if($stmt->affected_rows > 0)
{
  $arr = ["result" => "success", "id" => $conn ->insert_id];
} else {
  $arr = ["result" => "fail",'error' => $conn->error];
}
echo json_encode($arr);

?>