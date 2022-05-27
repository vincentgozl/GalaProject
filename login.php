<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$conn = new mysqli("localhost", "root", "", "galacraft");
if($conn->connect_error){
   $arr = ["result" => "error", "message" => "unable to connect"];
}
extract($_POST);
$sql = "SELECT * FROM user where email='$email'and password='$password'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    $arr=["result"=>"success","id"=>$row['id']];
} else {
    $arr= ["result"=>"error","message"=>"sql error: $sql"];
}
echo json_encode($arr);
?>