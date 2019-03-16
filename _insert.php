<?php include __DIR__.'./_header.php'?>
<?php include __DIR__.'./_nav.php'?>





  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <!-- submit result message -->
            <div id="info_bar">

            </div>

          <div class="card-body">
            <form method="POST"  name="addPromoForm" id="addPromoForm" onsubmit="return sendForm()">

              <div class="form-group">
                <label>促銷類型</label>
                <select class="form-control" name="planType" id="planType">
                  <option value="">---請選擇方案類型---</option>
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

                <select id="user_condi" class="form-control" name="user_condi">
                  <option value="0">等級0</option>
                  <option value="1">等級1</option>
                  <option value="2">等級2</option>
                  <option value="3">等級3</option>
                </select>

                  <select id="prod_condi" class="form-control" name="prod_condi">
                    <option value="0">類型0</option>
                    <option value="1">類型1</option>
                    <option value="2">類型2</option>
                    <option value="3">類型3</option>
                  </select>

                  <input type="text" class="form-control" name="price_condi" id="price_condi" placeholder="輸入購買金額條件">

                  <input type="text" class="form-control" name="amount_condi" id="amount_condi" placeholder="輸入購買數量條件">


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


              <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>

    //obtain plan type input field reference
    const planType = document.getElementById('planType');
    const user_condi = document.getElementById('user_condi');
    const price_condi = document.getElementById('price_condi');
    const prod_condi = document.getElementById('prod_condi');
    const amount_condi = document.getElementById('amount_condi');
    function hideField(){
      user_condi.style.display = "none";
      price_condi.style.display = "none";
      prod_condi.style.display = "none";
      amount_condi.style.display = "none";
    }
    hideField();
    planType.addEventListener('change',sendPlanType);

    function sendPlanType(){
      let p;
      let planTypeInput = new FormData();
      planTypeInput.append('planType',planType.value);
      fetch('_switchForm_api.php',{
        method:'POST',
        body:planTypeInput
      })
          .then(response=>response.json())
          .then(data=>{
            console.log(data);
            p = data;

            if(p=='user_plan'){
              hideField();
              user_condi.style.display = 'block';
            }else if(p=='price_plan'){
              hideField();
              price_condi.style.display = 'block';
            }else if(p=='prod_plan'){
              hideField();
              prod_condi.style.display = 'block';
            }else if(p=='amount_plan'){
              hideField();
              amount_condi.style.display = 'block';
            }

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

            submit_btn.style.display = 'block';
          });
      return false;
    }

  </script>

<?php include __DIR__.'./_footer.php' ?>