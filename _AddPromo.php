<?php include __DIR__ . './_header.php' ?>
<?php include __DIR__ . './_connectDB.php' ?>
<?php

if (isset($_POST['name'])) {

  $name = $_POST['name'];
  $condi = $_POST['condi'];
  $dis_num = $_POST['dis_num'];
  $dis_type = $_POST['dis_type'];
  $start = $_POST['start'];
  $end = $_POST['end'];

  $sql = "INSERT INTO {$_POST['plan']} (`name`,`user_level`,`dis_num`,`dis_type`,`start`,`end`) VALUE (?,?,?,?,?,?)";


  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $name,
        $condi,
        $dis_num,
        $dis_type,
        $start,
        $end
    ]);
    if($stmt->rowCount()==1){
      $msg = [
          'msgClass'=>'success',
          'info'=>'新增成功'
      ];

    }else{
      $msg = [
          'msgClass'=>'danger',
          'info'=>'新增錯誤'
      ];
    }


  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}


?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <?php if(isset($msg)): ?>
                      <div class="alert alert-<?= $msg['msgClass'] ?>" role="alert">
                        <?= $msg['info'] ?>
                      </div>
                  <?php endif; ?>
                    <div class="card-body">
                        <form method="POST" action="_AddPromo.php">
                            <div class="form-group">
                                <label>促銷類型</label>
                                <select class="form-control" name="plan" id="plan">
                                    <option value="user_plan">使用者促銷</option>
                                    <option value="prod_plan">產品促銷</option>
                                    <option value="price_plan">價格促銷</option>
                                    <option value="amount_plan">商品數量促銷</option>
                                </select>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label>促銷方案名稱</label>
                                <input type="text" class="form-control" name="name" placeholder="輸入促銷方案名稱">
                            </div>
                            <div class="form-group">
                                <label>條件</label>


                                <select id="condi" class="form-control" name="condi">
                                    <option value="0">等級0</option>
                                    <option value="1">等級1</option>
                                    <option value="2">等級2</option>
                                    <option value="3">等級3</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>促銷折扣數值</label>
                                <input type="text" class="form-control" name="dis_num" placeholder="輸入折扣數值">
                            </div>
                            <div class="form-group">
                                <label>折扣類型</label>
                                <select class="form-control" name="dis_type">
                                    <option value="0">打折</option>
                                    <option value="1">扣除金額</option>
                                </select>
                            </div>
                            <label>開始時間</label>
                            <input type="date" id="start" name="start"
                                   value="2018-07-22"
                                   min="2018-01-01" max="2020-12-31">
                            <label>結束時間</label>
                            <input type="date" id="start" name="end"
                                   value="2018-07-22"
                                   min="2018-01-01" max="2020-12-31">


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . "./_footer.php" ?>

<script>
    document.getElementById('plan').addEventListener('change',changeOption)

    let user_level ={0:'等級0',1:'等級1',2:'等級2',3:'等級3'};
    let prod_type = {0:'type1',0:'type2',0:'type3',0:'type4',};
    let price_type = {0: '10000',1:'20000',3:'30000'};
    let amount_type = {0:2,1:4,2:6};
    function changeOption(e) {
        let plan = e.target.value;
        switch (plan) {
            case 'user_plan':
                jQuery("#condi").empty();
                $.each(user_level, function (index, value) {
                    alert(index + ": " + value);
                    jQuery("#condi").append("<option value='" + index + "'>" + value + "</option>");

                });
                break;
            case 'prod_plan':
                jQuery("#condi").empty();
                $.each(prod_type, function (index, value) {
                    alert(index + ": " + value);
                    jQuery("#condi").append("<option value='" + index + "'>" + value + "</option>");

                });
                break;
            case 'price_plan':
                jQuery("#condi").empty();
                $.each(price_type, function (index, value) {
                    alert(index + ": " + value);
                    jQuery("#condi").append("<option value='" + index + "'>" + value + "</option>");

                });
                break;
            case 'amount_plan':
                jQuery("#condi").empty();
                $.each(amount_type, function (index, value) {
                    alert(index + ": " + value);
                    jQuery("#condi").append("<option value='" + index + "'>" + value + "</option>");

                });
                break;
        }

    }



</script>
