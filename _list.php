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

    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-striped table-bordered" id="list_table">
        <thead>
        <tr>
          <th scope="col">編輯</th>
          <th scope="col">#</th>
          <th scope="col">方案名稱</th>
          <th scope="col">適用條件</th>
          <th scope="col">折扣數值</th>
          <th scope="col">折扣類型</th>
          <th scope="col">開始時間</th>
          <th scope="col">結束時間</th>
          <th scope="col">刪除</th>
        </tr>
        </thead>
        <tbody id="data_body">

        </tbody>
      </table>
    </div>
  </div>



</div>
  <script>

    const planType = document.getElementById('planType');
    planType.addEventListener('change',sendPlanType);

    const data_body = document.getElementById('data_body');
    // underscore.js template
    // const tr_str = `<tr>
    //                     <td>
    //                         <a href="javascript: update_plan(<%= id %>)" class="update_btn"><i class="fas fa-edit"></i></a>
    //                     </td>
    //                     <td><%= id %></td>
    //                     <td><%= name %></td>
    //                     <td><%= planType.value %></td>
    //                     <td><%= dis_num %></td>
    //                     <td><%= dis_type %></td>
    //                     <td><%= start %></td>
    //                     <td><%= end %></td>
    //                     <td><a href="javascript: delete_plan(<%= id %>)">
    //                           <i class="fas fa-trash-alt"></i>
    //                         </a>
    //                     </td>
    //                 </tr>`;
    // const tr_func = _.template(tr_str);


    function sendPlanType(){
      let condi;
      if(planType.value=='user_plan'){
        condi = 'user_condi'
      }else if(planType.value =='price_plan'){
        condi = 'price_condi';
      }else if(planType.value == 'prod_plan'){
        condi = 'prod_condi';
      }else if(planType.value =='amount_plan'){
        condi = 'amount_condi';
      }



      let planTypeInput = new FormData();
      planTypeInput.append('planType',planType.value);
      fetch('_list_api.php',{
        method:'POST',
        body:planTypeInput
      })
          .then(response=>response.json())
          .then(json=> {
            console.log(json);
            let ori_data = json;

            let str = '';
            for(let val of ori_data.data){

              let tr_str = `<tr>
                        <td>
                            <a href="#" class="update_btn" ><i class="fas fa-edit"></i></a>
                        </td>
                        <td class="plan_id">${val.id}</td>
                        <td class="plan_name">${val.name}</td>
                        <td class="plan_condi">${val[condi]}</td>
                        <td class="plan_dis_num">${val.dis_num}</td>
                        <td class="plan_dis_type">${val.dis_type}</td>
                        <td class="plan_start">${val.start}</td>
                        <td class="plan_end">${val.end}</td>
                        <td><a href="javascript: delete_plan(${val.id})">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>`;

              console.log(val);
              str += tr_str;
              //rending list using underscore.js
              // str += tr_func(val);
            }
            data_body.innerHTML = str;

          })
    }


    function delete_plan(id) {

      if(confirm(`確認是否刪除`)){
        let planTypeInput = new FormData();
        planTypeInput.append('planType',planType.value);
        planTypeInput.append('id',id);
        fetch('_delete_api.php',{
          method:'POST',
          body:planTypeInput
        })
            .then(response=>response.json())
            .then(result=>{
              console.log(result);


              sendPlanType();
            })
      }

    }

    $('#list_table').on('click', '.update_btn', update_plan);


    function update_plan(e) {
        console.log(e)
    }




  </script>
<?php include __DIR__.'./_footer.php' ?>