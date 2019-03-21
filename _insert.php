<?php include __DIR__ . './_header.php' ?>
<?php include __DIR__. './_plan_nav.php' ?>
<?php
require __DIR__ . '/_connectDB.php';

if (isset($_GET['planType'])) {
  $playType = $_GET['planType'];
}
//$sql = "SELECT * FROM $playType WHERE id=$id";
//
//$stmt = $pdo->query($sql);
//
//if ($stmt->rowCount() == 0) {
//  header('Location: _list.php');
//  exit;
//}
//
//$row = $stmt->fetch(PDO::FETCH_ASSOC);

$mem_sql = "SELECT * FROM member_level";
$mem_stmt = $pdo->query($mem_sql);
$mem_rows = $mem_stmt->fetchAll(PDO::FETCH_ASSOC);


$camp_type_sql = "SELECT * FROM campsite_type";
$camp_type_stmt = $pdo->query($camp_type_sql);
$camp_type_rows = $camp_type_stmt->fetchAll(PDO::FETCH_ASSOC);

$dis_type_sql = "SELECT * FROM dis_type";
$dis_type_stmt = $pdo->query($dis_type_sql);
$dis_type_rows = $dis_type_stmt->fetchAll(PDO::FETCH_ASSOC);


?>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <!-- submit result message -->
                    <div class="alert alert-success" role="alert" style="display: none;" id="info_bar">

                    </div>

                    <div class="card-body">
                        <form method="POST" name="addPromoForm" id="addPromoForm" onsubmit="return sendForm()">

                            <div class="form-group">
                                <label>促銷類型</label>
                                <select class="form-control" name="planType" id="planType_field">
                                    <option value="">---請選擇方案類型---</option>
                                    <option value="user_plan" <?php if(isset($playType))echo $playType == "user_plan" ?  'selected' : "" ?>>
                                        使用者促銷
                                    </option>
                                    <option value="price_plan" <?php if(isset($playType))echo $playType == "price_plan" ? 'selected' : "" ?>>
                                        價格促銷
                                    </option>
                                    <option value="prod_plan" <?php if(isset($playType))echo $playType == "prod_plan" ? 'selected' : "" ?>>產品促銷
                                    </option>
                                    <option value="amount_plan" <?php if(isset($playType))echo $playType == "amount_plan" ? 'selected' : "" ?>>
                                        商品數量促銷
                                    </option>
                                </select>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="name">方案名稱</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder=""
                                       value="">
                                <small id="" class="form-text text-muted"></small>
                            </div>
                          <?php if (isset($playType)): ?>
                            <?php if ($playType == 'user_plan'): ?>
                                  <div class="form-group">
                                      <label>適用條件</label>
                                      <select class="form-control" name="condi">
                                        <?php foreach ($mem_rows as $mem_row): ?>
                                            <option value="<?= $mem_row['mem_level'] ?>"><?= $mem_row['level_title'] ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <small id="" class="form-text text-muted"></small>
                                  </div>
                            <?php elseif ($playType == 'price_plan'): ?>
                                  <div class="form-group">
                                      <label>訂單價格條件</label>
                                      <input type="text" value="" name="condi" placeholder="請輸入訂單價格條件">
                                      <small id="emailHelp" class="form-text text-muted"></small>
                                  </div>
                            <?php elseif ($playType == 'prod_plan'): ?>
                                  <div class="form-group">
                                      <label>營地類型</label>
                                      <select class="form-control" name="condi">
                                        <?php foreach ($camp_type_rows as $camp_type_row): ?>
                                            <option value="<?= $camp_type_row['campType_id'] ?>"><?= $camp_type_row['campType_name'] ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <small id="" class="form-text text-muted"></small>
                                  </div>
                            <?php elseif ($playType == 'amount_plan'): ?>
                                  <div class="form-group">
                                      <label>訂單數量條件</label>
                                      <input type="text" value="" name="condi" placeholder="請輸入訂單數量條件">
                                      <small id="" class="form-text text-muted"></small>
                                  </div>
                            <?php endif; ?>
                          <?php else: ?>
                              <label>適用條件</label>
                          <?php endif; ?>

                            <div class="form-group">
                                <label>折扣數值</label>
                                <input type="text" class="form-control" name="dis_num" placeholder="輸入折扣數值" value="">
                                <small id="" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="address">折扣類型</label>
                                <select class="form-control" name="dis_type">
                                  <?php foreach ($dis_type_rows as $dis_type_row): ?>
                                      <option value="<?= $dis_type_row['id'] ?>"><?= $dis_type_row['dis_type'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <small id="" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="address">開始時間</label>
                                <input type="date" id="start" name="start"
                                       value=""
                                       min="2018-01-01" max="2020-12-31">
                                <small id="addressHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="address">結束時間</label>
                                <input type="date" id="end" name="end"
                                       value=""
                                       min="2018-01-01" max="2020-12-31">
                                <small id="" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        // //obtain plan type input field reference
        const planType_field = document.getElementById('planType_field');
        // const user_condi = document.getElementById('user_condi');
        // const price_condi = document.getElementById('price_condi');
        // const prod_condi = document.getElementById('prod_condi');
        // const amount_condi = document.getElementById('amount_condi');
        // function hideField(){
        //   user_condi.style.display = "none";
        //   price_condi.style.display = "none";
        //   prod_condi.style.display = "none";
        //   amount_condi.style.display = "none";
        // }
        // hideField();
        planType_field.addEventListener('change', sendPlanType);

        function sendPlanType() {

            let planTypeInput = new FormData();
            planTypeInput.append('planType', planType_field.value);
            fetch('_switchForm_api.php', {
                method: 'POST',
                body: planTypeInput
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    window.location.href = '_insert.php?planType=' + data;
                    //
                    // if(p=='user_plan'){
                    //   hideField();
                    //   user_condi.style.display = 'block';
                    // }else if(p=='price_plan'){
                    //   hideField();
                    //   price_condi.style.display = 'block';
                    // }else if(p=='prod_plan'){
                    //   hideField();
                    //   prod_condi.style.display = 'block';
                    // }else if(p=='amount_plan'){
                    //   hideField();
                    //   amount_condi.style.display = 'block';
                    // }

                })
        }


        const submit_btn = document.getElementById('submit_btn');
        const info_bar = document.getElementById('info_bar');
        const addPromoForm = document.getElementById('addPromoForm');

        // submit_btn.addEventListener('click',sendForm)
        // addPromoForm.addEventListener('submit',sendForm)


        function sendForm(e) {
            const form = new FormData(addPromoForm);
            submit_btn.style.display = 'none';
            fetch('_insert_api.php', {
                method: 'POST',
                body: form
            })
                .then(response => response.json())
                .then(obj => {

                    console.log(obj);
                    info_bar.style.display = 'block';

                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '資料新增成功';
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                    }

                    submit_btn.style.display = 'block';
                });
            return false;
        }

    </script>

<?php include __DIR__ . './_footer.php' ?>