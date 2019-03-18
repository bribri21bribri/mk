<?php include __DIR__ . './_header.php';?>
<?php include __DIR__ . './_nav.php'; ?>


  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <!-- submit result message -->
              <div id="info_bar">

              </div>

              <div class="card-body">
                  <form method="POST"  name="addPromoForm" id="addPromoForm" onsubmit="return sendForm()">

                      <div class="form-group">
                          <label>coupon名稱</label>
                          <input type="text" class="form-control" name="name" placeholder="輸入coupon名稱">
                          <small class="form-text text-muted"></small>
                      </div>
                      <div class="form-group">
                          <label>張數</label>
                          <input type="text" class="form-control" name="dis_num" placeholder="輸入張數">
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
                      <div class="form-group">
                          <label>發放條件</label>
                          <select class="form-control" name="dis_type">
                              <option value="0">初次登入</option>
                              <option value="1">會員等級</option>
                              <option value="2">訂單</option>
                          </select>
                      </div>
                      <div class="form-group">
                      <label>結束時間</label>
                      <input type="date" id="start" name="end"
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



<?php include __DIR__ . './_footer.php';?>