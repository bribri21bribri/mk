<?php
require __DIR__ . '/_connectDB.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '指定失敗',
    'post' => [], // 做 echo 檢查
    'row_assign' => 0
];
try {
  if (isset($_POST['update_coupons'])) {
    $update_coupons = json_decode($_POST['update_coupons']);
    $name_to_update = $_POST['name_to_update'];
    $row_count = 0;
    foreach ($update_coupons as $coupon_to_rename) {
      $sql = "UPDATE `coupon` SET
              `coupon_name`=? WHERE `coupon_id`=?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
          $name_to_update,
          $coupon_to_rename
      ]);
      if($stmt->rowCount()==1){
        $row_count++;
      }
    }



  }
  if ($row_count == count($update_coupons)) {
    $result['errorMsg'] = '指派成功';
    $result['success'] = true;
    $result['row_assign'] = $row_count;
  }
} catch (PDOException $ex) {
  $result['errorMsg'] = $ex->getMessage();
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);