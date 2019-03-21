<?php
include __DIR__.'./_connectDB.php';
header('Content-Type: application/json');
$result = [
    'success' => false,
    'data' => [],
    'errorCode' => 0,
    'errorMsg' => '',
];
if(isset($_POST['issue_level'])){
  $issue_level = $_POST['issue_level'];

  $c_count_sql = "SELECT count(1) FROM coupon WHERE user_id=0";
  $c_count_stmt = $pdo->query($c_count_sql);
  $c_count_row = $c_count_stmt->fetch(PDO::FETCH_NUM)[0];

  $m_count_sql = "SELECT count(1) FROM member_list WHERE mem_level={$issue_level}";
  $m_count_stmt = $pdo->query($m_count_sql);
  $m_count_row = $m_count_stmt->fetch(PDO::FETCH_NUM)[0];

  if($c_count_row<$m_count_row){
    $result['errorMsg']= '未配發coupon不足';
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
  }else{
    $sql = "SELECT * FROM member_list WHERE mem_level={$issue_level}";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row){

    }
  }
}






echo json_encode($m_row,JSON_UNESCAPED_UNICODE);