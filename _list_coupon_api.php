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
  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;



  if($according_to==4){
    $coupon_code = htmlentities($_POST['coupon_code']);
    $sql = "SELECT * FROM coupon WHERE `coupon_code`= ?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$coupon_code]);
    $rows_by_code = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($rows_by_code)==0){
      $result['errorMsg'] = "無符合條件之結果";
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
      exit();
    }

    $result['according_to'] = $according_to;
    $result['data'] = $rows_by_code;
    $result['errorMsg'] = "";
    $result['success'] = true;
  }elseif ($according_to==5){
    $coupon_name = htmlentities($_POST['coupon_name']);


    $t_sql = "SELECT COUNT(1) FROM coupon WHERE `coupon_name` LIKE :coupon_name";
    $t_stmt = $pdo->prepare($t_sql);
    $t_stmt->bindValue(':coupon_name', '%' . $coupon_name . '%', PDO::PARAM_STR);
    $t_stmt->execute();
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
    $result['totalRows'] = intval($total_rows);

    if($total_rows==0){
      $result['errorMsg'] = "無符合條件之結果";
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
      exit();
    }

    $total_pages = ceil($total_rows / $per_page);
    $result['totalPages'] = $total_pages;
    if ($page < 1) {
      $page = 1;
    }
    if ($page > $total_pages) {
      $page = $total_pages;
    }
    $result['page'] = $page;


    $sql = sprintf("SELECT * FROM coupon WHERE `coupon_name` LIKE :coupon_name LIMIT %s, %s" ,($page -1) * $per_page,$per_page);
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
    $t_sql = "SELECT COUNT(1) FROM coupon  WHERE `user_id`= {$user_id}";
    $t_stmt = $pdo->prepare($t_sql);
    $t_stmt->execute();
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
    $result['totalRows'] = intval($total_rows);

    if($total_rows==0){
      $result['errorMsg'] = "無符合條件之結果";
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
      exit();
    }

    $total_pages = ceil($total_rows / $per_page);
    $result['totalPages'] = $total_pages;
    if ($page < 1) {
      $page = 1;
    }
    if ($page > $total_pages) {
      $page = $total_pages;
    }
    $result['page'] = $page;


    $sql = sprintf("SELECT * FROM coupon WHERE `user_id`= {$user_id} LIMIT %s,%s", ($page -1) * $per_page,$per_page);
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $rows_by_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['according_to'] = $according_to;
    $result['data'] = $rows_by_user;
    $result['errorMsg'] = "";
    $result['success'] = true;
  }elseif ($according_to==7){
    $issue_condi = htmlentities($_POST['issue_condi']);

    $t_sql = "SELECT COUNT(1) FROM coupon WHERE `issue_condi`= {$issue_condi}";
    $t_stmt = $pdo->prepare($t_sql);
    $t_stmt->execute();
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
    $result['totalRows'] = intval($total_rows);
    if($total_rows==0){
      $result['errorMsg'] = "無符合條件之結果";
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
      exit();
    }


    $total_pages = ceil($total_rows / $per_page);
    $result['totalPages'] = $total_pages;
    if ($page < 1) {
      $page = 1;
    }
    //TODO:BUG
    if ($page > $total_pages) {
      $page = 1;
    }
    $result['page'] = $page;
    $sql = sprintf("SELECT * FROM coupon WHERE `issue_condi`= {$issue_condi} LIMIT %s,%s", ($page -1) * $per_page,$per_page);


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
