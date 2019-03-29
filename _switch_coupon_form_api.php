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
  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;




  if($according_to==1){
    $t_sql = "SELECT COUNT(1) FROM coupon";
    $t_stmt = $pdo->query($t_sql);
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
    $result['totalRows'] = intval($total_rows);

    $total_pages = ceil($total_rows / $per_page);
    $result['totalPages'] = $total_pages;

    if ($page < 1) {
      $page = 1;
    }

    if ($page > $total_pages) {
      $page = $total_pages;
    }
    $result['page'] = $page;


    //select all coupon
    $sql = sprintf("SELECT * FROM coupon LIMIT %s, %s", ($page -1) * $per_page,$per_page);
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount()>0){
      $result['success'] = true;
//      $result['errorCode'] = 200;
      $result['errorMsg'] = '';
    }else{
//      $result['errorCode'] = 402;
      $result['errorMsg'] = "無符合條件之結果";
    }

    $rows_all = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['according_to'] = $according_to;
    $result['data'] = $rows_all;

  }elseif ($according_to==2){
    $t_sql = "SELECT COUNT(1) FROM coupon WHERE `coupon_expire`>`created_at`";
    $t_stmt = $pdo->query($t_sql);
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
    $result['totalRows'] = intval($total_rows);

    $total_pages = ceil($total_rows / $per_page);
    $result['totalPages'] = $total_pages;

    if ($page < 1) {
      $page = 1;
    }

    if ($page > $total_pages) {
      $page = $total_pages;
    }
    $result['page'] = $page;

    //select which are in valid period
    $sql = sprintf("SELECT * FROM coupon WHERE `coupon_expire`>`created_at` LIMIT %s,%s", ($page -1) * $per_page,$per_page);
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
      $result['success'] = true;
//      $result['errorCode'] = 200;
      $result['errorMsg'] = '';
    }else{
//      $result['errorCode'] = 402;
      $result['errorMsg'] = "無符合條件之結果";
    }

    $rows_valid_period = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['data'] = $rows_valid_period;
    $result['according_to'] = $according_to;
  }elseif ($according_to==3){
    $t_sql = "SELECT COUNT(1) FROM coupon WHERE `coupon_expire`<`created_at`";
    $t_stmt = $pdo->query($t_sql);
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
    $result['totalRows'] = intval($total_rows);

    $total_pages = ceil($total_rows / $per_page);
    $result['totalPages'] = $total_pages;

    if ($page < 1) {
      $page = 1;
    }

    if ($page > $total_pages) {
      $page = $total_pages;
    }
    $result['page'] = $page;

    //select which have expired
    $sql=sprintf("SELECT * FROM coupon WHERE `coupon_expire`<`created_at` LIMIT %s,%s", ($page -1) * $per_page,$per_page);
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
      $result['success'] = true;
//      $result['errorCode'] = 200;
      $result['errorMsg'] = '';
    }else{
//      $result['errorCode'] = 402;
      $result['errorMsg'] = "無符合條件之結果";
    }

    $rows_expire = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['data'] = $rows_expire;
    $result['according_to'] = $according_to;
  }else{
    $result['according_to'] = $according_to;
  }

}

echo json_encode($result,JSON_UNESCAPED_UNICODE);



