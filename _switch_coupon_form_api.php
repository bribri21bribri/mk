<?php
require __DIR__. '/_connectDB.php';
header('Content-Type: application/json');
$per_page =10;
$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查
    'data'=>[],
    'according_to'=>0,
    'totalRows' => 0,
    'perPage' => $per_page,
    'totalPages' => 0
];



if (isset($_POST['according_to'])){
  $according_to = $_POST['according_to'];

  if($according_to==1){
    //select all coupon
    $sql = "SELECT * FROM coupon";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows_all = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['according_to'] = $according_to;
    $result['data'] = $rows_all;

  }elseif ($according_to==2){
    //select which are in valid period
    $sql = "SELECT * FROM coupon WHERE `coupon_expire`>`created_at` ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows_valid_period = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['data'] = $rows_valid_period;
    $result['according_to'] = $according_to;
  }elseif ($according_to==3){
    //select which have expired
    $sql="SELECT * FROM coupon WHERE `coupon_expire`<`created_at` ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows_expire = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['data'] = $rows_expire;
    $result['according_to'] = $according_to;
  }else{
    $result['according_to'] = $according_to;
  }

}

echo json_encode($result,JSON_UNESCAPED_UNICODE);



