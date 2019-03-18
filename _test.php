<?php include __DIR__ . './_connectDB.php' ?>

<?php
//session_start();
//$_SESSION['user_level'] = 2;
//$user_level= $_SESSION['user_level'];
//$price = 100;
//$stmt = $pdo->query("SELECT * FROM user_plan");
//
//
//while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//   if($row['user_level']==$user_level){
//     $dis_num = $row['dis_num'];
//     $dis_type = $row['dis_type'];
//    }
//}
//if(isset($dis_num)){
//  if($dis_type == 0){
//    echo  $price * (1-$dis_num/100);
//  }else{
//    echo $price - $dis_num;
//  }
//}else{
//  echo $price;
//}