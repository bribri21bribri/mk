<?php include __DIR__ . './_header.php';?>
<?php include __DIR__ . './_coupon_nav.php'; ?>


  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <!-- submit result message -->
              <div id="info_bar" style="display: none" class="alert alert-success">

              </div>

              <div class="card-body">
                  <form method="POST"  name="coupon_form"  onsubmit="return sendForm()">

                      <div class="form-group">
                          <label>coupon名稱</label>
                          <input type="text" class="form-control" name="coupon_name" placeholder="輸入coupon名稱">
                          <small class="form-text text-muted"></small>
                      </div>
                      <div class="form-group">
                          <label>張數</label>
                          <input type="text" class="form-control" name="amount" placeholder="輸入張數">
                      </div>

                      <div class="form-group">
                          <label>促銷折扣數值</label>
                          <input type="text" class="form-control" name="dis_num" placeholder="輸入折扣數值">
                      </div>

                      <div class="form-group">
                          <label>折扣類型</label>
                          <select class="form-control" name="dis_type">
                              <option value="1">打折</option>
                              <option value="2">扣除金額</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>發放條件</label>
                          <select class="form-control" name="issue_condi">
                              <option value="1">初次登入</option>
                              <option value="2">會員等級</option>
                              <option value="3">訂單累積</option>
                          </select>
                      </div>
                      <div class="form-group">
                      <label>到期時間</label>
                      <input type="date" id="start" name="coupon_expire"
                             value="2018-07-22"
                             min="2018-01-01" max="2020-12-31">
                      </div>

                      <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
    <script>
        const submit_btn = document.getElementById('submit_btn')
        function sendForm(e) {
            const form = new FormData(coupon_form);
            submit_btn.style.display = 'none';
            fetch('_insert_coupon_api.php', {
                method: 'POST',
                body: form
            })
                .then(response=>response.json())
                .then(obj=>{

                    console.log(obj);

                    info_bar.style.display = 'block';

                    if(obj.success){
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '資料新增成功';
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                    }
                    setTimeout(function () {
                        info_bar.style.display='none';
                    },5000);
                    submit_btn.style.display = 'block';
                });
            return false;
        }

    </script>


<?php include __DIR__ . './_footer.php';?>