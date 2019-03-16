<?php include __DIR__.'./_header.php'?>
<?php include __DIR__.'./_nav.php'?>

<div class="container">
  <div class="row">
    <div class="col-lo-12">
      <form method="POST"  name="addPromoForm" id="addPromoForm" >

        <div class="form-group">
          <label>查詢方案</label>
          <select class="form-control" name="planType" id="planType">
            <option value="">---請選擇查詢方案類型---</option>
            <option value="user_plan">使用者促銷</option>
            <option value="prod_plan">產品促銷</option>
            <option value="price_plan">價格促銷</option>
            <option value="amount_plan">商品數量促銷</option>
          </select>
          <small class="form-text text-muted"></small>
        </div>
      </form>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-bordered">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">方案名稱</th>
              <th scope="col">適用條件</th>
              <th scope="col">折扣數值</th>
              <th scope="col">折扣類型</th>
              <th scope="col">開始時間</th>
              <th scope="col">結束時間</th>
            </tr>
            </thead>
            <tbody id="data_body">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
  <script>
    const planType = document.getElementById('planType');
    planType.addEventListener('change',sendPlanType);

    //send
    function sendPlanType(){
      let p;
      let planTypeInput = new FormData();
      planTypeInput.append('planType',planType.value);
      fetch('_list_api.php',{
        method:'POST',
        body:planTypeInput
      })
          .then(response=>response.json())
          .then(data=> {
            console.log(data);
            p = data;
          })
    }



  </script>
<?php include __DIR__.'./_footer.php' ?>