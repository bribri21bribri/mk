<?php include __DIR__ . './_header.php' ?>
<?php include __DIR__ . './_nav.php' ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lo-12">
                <div class="alert alert-success" role="alert" style="display: none;" id="info_bar"></div>
                <form method="POST" name="addPromoForm" id="addPromoForm">

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
        const info_bar = document.getElementById('info_bar');
        const planType = document.getElementById('planType');
        planType.addEventListener('change', sendPlanType);

        const data_body = document.getElementById('data_body');

//TODO:FUNCTION
        function deside_planType() {
            let condi;
            if (planType.value == 'user_plan') {
                condi = 'user_condi'
            } else if (planType.value == 'price_plan') {
                condi = 'price_condi';
            } else if (planType.value == 'prod_plan') {
                condi = 'prod_condi';
            } else if (planType.value == 'amount_plan') {
                condi = 'amount_condi';
            }
            return condi
        }

//TODO:FUNCTION
        function sendPlanType() {
            let condi = deside_planType();


            let planTypeInput = new FormData();
            planTypeInput.append('planType', planType.value);
            fetch('_list_api.php', {
                method: 'POST',
                body: planTypeInput
            })
                .then(response => response.json())
                .then(json => {
                    console.log(json);
                    let ori_data = json;

                    let str = '';
                    for (let val of ori_data.data) {

                        let tr_str = `<tr data-id=${val.id}>
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
                    }
                    data_body.innerHTML = str;

                })
        }

//TODO:FUNCTION
        function delete_plan(id) {

            if (confirm(`確認是否刪除`)) {
                let planTypeInput = new FormData();
                planTypeInput.append('planType', planType.value);
                planTypeInput.append('id', id);
                fetch('_delete_api.php', {
                    method: 'POST',
                    body: planTypeInput
                })
                    .then(response => response.json())
                    .then(result => {
                        console.log(result);


                        sendPlanType();
                    })
            }

        }

        $('#data_body').on('click', '.update_btn', switch_update_form);

//TODO:FUNCTION
        //switch list row to form for updating
        function switch_update_form(e) {

            const tr = e.target.parentNode.parentNode.parentNode;
            let condi = deside_planType();

            let condi_html = decide_condi_input();

            function decide_condi_input() {
                let condi = deside_planType();
                let condi_html;
                if (condi == 'user_condi') {
                    condi_html =
                        '<select id="update_user_condi" class="form-control" name="user_condi">' +
                        '<option value="0">等級0</option>' +
                        '<option value="1">等級1</option>' +
                        '<option value="2">等級2</option>' +
                        '<option value="3">等級3</option>' +
                        '</select>'
                } else if (condi == 'prod_condi') {
                    condi_html = '<select id="update_prod_condi" class="form-control" name="prod_condi">' +
                        '<option value="0">類型0</option>' +
                        '<option value="1">類型1</option>' +
                        '<option value="2">類型2</option>' +
                        '<option value="3">類型3</option>' +
                        '</select>';
                } else if (condi == 'price_condi') {
                    condi_html = '<input type="text" class="form-control" name="price_condi" id="update_price_condi" placeholder="輸入購買金額條件">';
                } else if (condi == 'amount_condi') {
                    condi_html = '<input type="text" class="form-control" name="amount_condi" id="update_amount_condi" placeholder="輸入購買數量條件">';
                }
                return condi_html

            }


            let id = tr.getAttribute('data-id');

            let plan = new FormData();
            plan.append('planType', planType.value);
            plan.append('id', id);
            fetch('_get_row_api.php', {
                method: 'POST',
                body: plan
            })
                .then(response => {

                   return response.json()
                })
                .then(json=>{

                    return json;
                })
                .then(json => {
                    console.log(json);
                    let ori_data = json;
                    console.log(ori_data.data[0]);

                    let row_data = ori_data.data[0];


                    let tr_str =
                        `<td></td>
                            <td class="plan_id">${row_data.id}</td>
                            <td class="plan_name"><input type="text" class="form-control" name="name" id='update_name' placeholder="輸入促銷方案名稱" value=${row_data.name}></td>
                            <td class="plan_condi">` +
                        condi_html +
                        `</td>
                            <td class="plan_dis_num">
                                <input type="text" id="update_dis_num" value=${row_data.dis_num}>
                            </td>
                            <td class="plan_dis_type">
                                <select class="form-control" name="dis_type" id="update_dis_type">
                                  <option value="0">打折</option>
                                  <option value="1">扣除金額</option>
                                </select></td>
                            <td class="plan_start">
                                <input type="date" id="update_start" name="start" value=${row_data.start} min="2018-01-01" max="2020-12-31">
                            </td>
                            <td class="plan_end">
                                <input type="date" id="update_end" name="end" value=${row_data.end} min="2018-01-01" max="2020-12-31">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary update_submit_btn" >儲存</button>
                            </td>`

                    ;


                    tr.innerHTML = tr_str;



                })
        }
        $('#data_body').on('click', '.update_submit_btn',send_update_form);



        function send_update_form(e) {
            let condi = deside_planType();
            const tr = e.target.parentNode.parentNode;
            let id = tr.getAttribute('data-id');

            let update_name = document.getElementById('update_name').value;
            let update_condi;
            if (condi=='user_condi') {
                update_condi = document.getElementById('update_user_condi').value;
            } else if (condi=='price_condi') {
                update_condi = document.getElementById('update_price_condi').value
            } else if (condi=='prod_condi') {
                update_condi = document.getElementById('update_prod_condi').value
            } else if (condi=='amount_condi') {
                update_condi = document.getElementById('update_amount_condi').value
            }
            let update_dis_num = document.getElementById('update_dis_num').value;
            let update_dis_type = document.getElementById('update_dis_type').value;
            let update_start = document.getElementById('update_start').value;
            let update_end = document.getElementById('update_end').value;





            const form = new FormData();
            form.append('planType',planType.value);
            form.append('id', id);
            form.append('name',update_name);
            form.append('condi',update_condi);
            form.append('dis_num',update_dis_num);
            form.append('dis_type',update_dis_type);
            form.append('start',update_start);
            form.append('end',update_end);


            let update_submit_btn = e.target;
             update_submit_btn.style.display = 'none';


            fetch('_edit_api.php', {
                method: 'POST',
                body: form
            })
                .then(response=>response.json())
                .then(obj=>{

                    console.log(obj);

                    info_bar.style.display = 'block';

                    if(obj.success){

                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '資料修改成功';
                    } else {

                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                    }

                    update_submit_btn.style.display = 'block';
                });

            return false;
        }

    </script>
<?php include __DIR__ . './_footer.php' ?>