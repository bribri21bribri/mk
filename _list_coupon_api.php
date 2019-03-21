<?php
require __DIR__. '/_connectDB.php';
header('Content-Type: application/json');
$per_page = 10;
$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查
    'data'=>[],
    'according_to'=>0,
    'per_page'=>$per_page,
    'total_page'=>0,
    'total_row'=>0
];



if (isset($_POST['according_to'])){
  $according_to = $_POST['according_to'];




  if($according_to==4){
    $coupon_code = htmlentities($_POST['coupon_code']);
    $sql = "SELECT * FROM coupon WHERE `coupon_code`= ?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$coupon_code]);
    $rows_by_code = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['according_to'] = $according_to;
    $result['data'] = $rows_by_code;
    $result['errorMsg'] = "";
    $result['success'] = true;
  }elseif ($according_to==5){
    $coupon_name = htmlentities($_POST['coupon_name']);
    $sql = "SELECT * FROM coupon WHERE `coupon_name` LIKE :coupon_name";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':coupon_name', '%' . $coupon_name . '%', PDO::PARAM_STR);
    $stmt->execute();
    $rows_by_name = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['according_to'] = $according_to;
    $result['data'] = $rows_by_name;
    $result['errorMsg'] = "";
    $result['success'] = true;
  }elseif ($according_to==6){
    $user_id = htmlentities($_POST['user_id']);
    $sql = "SELECT * FROM coupon WHERE `user_id`= {$user_id}";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $rows_by_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['according_to'] = $according_to;
    $result['data'] = $rows_by_user;
    $result['errorMsg'] = "";
    $result['success'] = true;
  }elseif ($according_to==7){
    $issue_condi = htmlentities($_POST['issue_condi']);
    $sql = "SELECT * FROM coupon WHERE `issue_condi`= {$issue_condi}";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $rows_by_issue = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['according_to'] = $according_to;
    $result['data'] = $rows_by_issue;
    $result['errorMsg'] = "";
    $result['success'] = true;
  }

}

echo json_encode($result,JSON_UNESCAPED_UNICODE);
