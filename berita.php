<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$conn = new mysqli("localhost", "hybrid_160419034", "ubaya", "hybrid_160419034");
if ($conn->connect_error) {
  $arr = ["result" => "error", "message" => "unable to connect"];
}

if(isset($_POST['idberita'])){
  $id = $_POST['idberita'];
  $sql = "SELECT * FROM berita where idberita = $id";
}
else if(isset($_POST['idkategori'])){
  $idkategori = $_POST['idkategori'];
  $sql = "SELECT * FROM berita where idkategori = $idkategori";
} 
else{
  $sql = "SELECT * FROM berita";
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data = [];

if ($result->num_rows > 0) {
  while ($r = mysqli_fetch_assoc($result)) {
    array_push($data, $r);
  }

  $arr = ["result" => "success", "data" => $data];
} else {
  $arr = ["result" => "error", "message" => "sql error: $sql"];
}
echo json_encode($arr);
$stmt->close();
$conn->close();
?>