<?php include __DIR__ . './_header.php' ?>
<?php include __DIR__ . './_nav.php' ?>


    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success" role="alert" style="display: none;" id="info_bar"></div>
                <form name="list_coupon_form" id="list_coupon_form">
                    <div class="form-group">
                        <label>查詢依據</label>
                        <select class="form-control" name="according_to" id="according_to" onchange="switch_input()">
                            <option>---請選擇查詢依據---</option>
                            <option value="1">列出所有coupon</option>
                            <option value="2">列出有效期限內coupon</option>
                            <option value="3">列出已過期coupon</option>
                            <option value="4">Coupon CODE</option>
                            <option value="5">Coupon名稱</option>
                            <option value="6">使用者ID</option>
                            <option value="7">發放條件</option>
                        </select>
                        <small id="" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group" id="condition_input">
                        <label>查詢條件</label>

                    </div>
                    <button class="btn btn-success" onclick="select_all()" type="button">全選</button>
                    <button class="btn btn-success" onclick="unselect_all()" type="button">取消全選</button>
                    <button class="btn btn-primary" onclick="send_search_condition()" type="button">Submit</button>

                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table style="display: block" id="coupon_table" class="table">
                    <thead>
                    <tr>
                        <th scope="col">編輯</th>
                        <th scope="col">Coupon ID</th>
                        <th scope="col">Coupon 名稱</th>
                        <th scope="col">Coupon Code</th>
                        <th scope="col">建立</th>
                        <th scope="col">折扣數值</th>
                        <th scope="col">折扣方法</th>
                        <th scope="col">發放條件</th>
                        <th scope="col">是否有效</th>
                        <th scope="col">到期</th>
                        <th scope="col">使用者</th>
                        <th scope="col">刪除</th>
                    </tr>
                    </thead>
                    <tbody id="coupon_output">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" id="assign_to_user" style="display: none">
            <button  class="close" type="button" onclick="">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="col-lg-12">
                <form>
                    <div class="form-group">
                    <input type="text" placeholder="輸入欲指派使用者ID" id="assign_by_id">
                    </div>
                    <button class="btn btn-primary" onclick="group_assign()" type="button">Submit</button>
                </form>
            </div>
        </div>
        <button class="btn btn-warning" onclick="assign_to_user.style.display = 'block';" type="button">依使用者ID指定</button>
<!--TODO-->
        <div class="row" id="" style="display: none">
            <div class="col-lg-12">
                <form class="update_form">


                    <button class="btn btn-primary" onclick="" type="button">Submit</button>
                </form>
            </div>
        </div>
        <button class="btn btn-warning" onclick="" type="button">依使用者LEVEL指定</button>
<!--        <div class="row" id="update_coupon_name" style="display: none">-->
<!--            <div class="col-lg-12">-->
<!--                <form class= "update_form">-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" placeholder="輸入欲修改coupont名稱" id="name_to_update">-->
<!--                    </div>-->
<!---->
<!--                    <button class="btn btn-primary" onclick="group_update_name()" type="button">Submit</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--        <button class="btn btn-warning" onclick="update_coupon_name.style.display = 'block'" type="button">修改coupon名稱</button>-->
<!--        <div class="row" id="update_dis_num" style="display: none">-->
<!--            <div class="col-lg-12">-->
<!--                <form class="update_form">-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" placeholder="輸入欲修改折扣數值" id="num_to_update">-->
<!--                    </div>-->
<!---->
<!--                    <button class="btn btn-primary" onclick="" type="button">Submit</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--        <button class="btn btn-warning" onclick="update_dis_num.style.display = 'block'" type="button">修改折扣數值</button>-->
<!--        <div class="row" id="update_dis_type" style="display: none">-->
<!--            <div class="col-lg-12">-->
<!--                <form class="update_form">-->
<!--                    <div class="form-group">-->
<!--                        <select class="form-control" name="dis_type" id="type_to_update">-->
<!--                            <option>---選擇折扣類型---</option>-->
<!--                            <option value="1">打折</option>-->
<!--                            <option value="2">扣除金額</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                    <button class="btn btn-primary" onclick="" type="button">Submit</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--        <button class="btn btn-warning" onclick="update_dis_type.style.display = 'block'" type="button">修改折扣類型</button>-->
<!--        <div class="row" id="update_issue_condi" style="display: none">-->
<!--            <div class="col-lg-12">-->
<!--                <form class="update_form">-->
<!--                    <div class="form-group">-->
<!--                        <select class="form-control" name="issue_condi" id="condi_to_update">-->
<!--                            <option>---選擇發放條件---</option>-->
<!--                            <option value="1">初次登入</option>-->
<!--                            <option value="2">會員等級</option>-->
<!--                            <option value="3">訂單</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                    <button class="btn btn-primary" onclick="" type="button">Submit</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--        <button class="btn btn-warning" onclick="update_issue_condi.style.display = 'block'" type="button">修改發放條件</button>-->
<!--        <div class="row" id="update_valid" style="display: none">-->
<!--            <div class="col-lg-12">-->
<!--                <form class="update_form">-->
<!--                    <div class="form-group">-->
<!--                        <select class="form-control" name="issue_condi" id="valid_to_update">-->
<!--                            <option>---設定是否啟用---</option>-->
<!--                            <option value="1">啟用</option>-->
<!--                            <option value="2">關閉</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                    <button class="btn btn-primary" onclick="" type="button">Submit</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--        <button class="btn btn-warning" onclick="update_valid.style.display = 'block'" type="button">修改是否有效</button>-->
<!--        <div class="row" id="update_expire" style="display: none">-->
<!---->
<!--            <div class="col-lg-12">-->
<!--                <form class="update_form">-->
<!--                    <div class="form-group">-->
<!--                        <label>選擇到期時間</label>-->
<!--                        <input type="date" id="start" name="coupon_expire"-->
<!--                               value="2018-07-22"-->
<!--                               min="2018-01-01" max="2020-12-31" id="expire_to_update">-->
<!--                    </div>-->
<!--                    </div>-->
<!---->
<!--                    <button class="btn btn-primary" onclick="" type="button">Submit</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        <button class="btn btn-warning" onclick="update_expire.style.display = 'block'" type="button">修改到期日</button>-->
<!--        </div>-->








        <button class="btn btn-danger" onclick="group_delete()" type="button">刪除</button>
    </div>



    <script>
        // const update_coupon_name = document.getElementById('update_coupon_name');
        // const update_dis_num = document.getElementById('update_dis_num');
        // const update_dis_type =document.getElementById('update_dis_type');
        // const update_issue_condi =document.getElementById('update_issue_condi');
        // const update_valid = document.getElementById('update_valid');
        // const update_expire = document.getElementById('update_expire');
        const assign_to_user = document.getElementById('assign_to_user');
        function switch_input(e) {
            const coupon_output = document.getElementById('coupon_output');
            const according_val = document.getElementById('according_to').value;
            const coupon_table = document.getElementById('coupon_table');
            let according_to = new FormData();
            according_to.append('according_to', according_val);
            fetch('_switch_coupon_form_api.php', {
                method: 'POST',
                body: according_to
            })
                .then(response => response.json())
                .then(result => {
                        const condition_input = document.getElementById('condition_input');
                        // console.log(result); //FOR TEST
                        //return false;
                        if (result['according_to'] == 4) {
                            condition_input.innerHTML = '<label>查詢條件</label><input class="form-control" type="text" name="coupon_code" id="coupon_code_field" placeholder="請輸入coupon CODE">';
                            coupon_table.style.display = 'none';
                        } else if (result['according_to'] == 5) {
                            condition_input.innerHTML = '<label>查詢條件</label><input class="form-control" type="text" name="coupon_name" id="coupon_name_field" placeholder="請輸入coupon名稱 ">';
                            coupon_table.style.display = 'none';
                        } else if (result['according_to'] == 6) {
                            condition_input.innerHTML = '<label>查詢條件</label><input class="form-control" type="text" name="user_id" id="user_id_field" placeholder="請輸入使用者 ID">';
                            coupon_table.style.display = 'none';
                        } else if (result['according_to'] == 7) {
                            condition_input.innerHTML = '<label>查詢條件</label>' +
                                '<select class="form-control" name="issue_condi" id="issue_condi_field">' +
                                '<option >---請選擇發放條件---</option>' +
                                '<option value="1">第一次登入</option>' +
                                '<option value="2">升等</option>' +
                                '<option value="3">累積訂單</option>' +
                                '</select>';
                            coupon_table.style.display = 'none';

                        } else {
                            condition_input.innerHTML = '<label>查詢條件</label>';
                            coupon_table.style.display = 'block';
                            let str = '';
                            for (let data of result['data']) {

                                let tr_str = `<tr>
                        <td>
                            <a href="#" class="update_btn" ><i class="fas fa-edit"></i></a>
                        </td>
                        <td class="coupon_id">${data['coupon_id']}</td>
                        <td class="coupon_name">${data['coupon_name']}</td>
                        <td class="coupon_code">${data['coupon_code']}</td>
                        <td class="created_at">${data['created_at']}</td>
                        <td class="dis_num">${data['dis_num']}</td>
                        <td class="dis_type">${data['dis_type']}</td>
                        <td class="issue_condi">${data['issue_condi']}</td>
                        <td class="coupon_valid">${data['coupon_valid']}</td>
                        <td class="coupon_expire">${data['coupon_expire']}</td>
                        <td class="user_id">${data['user_id']}</td>
                        <td><a href="javascript: delete_coupon(${data['coupon_id']})">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>
                            <input type="checkbox" value="${data['coupon_id']}" class="selected_coupon">
                        </td>
                    </tr>`;
                                str += tr_str;
                            }
                            coupon_output.innerHTML = str;
                        }

                    }
                )
        }

        function send_search_condition(e) {
            const according_to = document.getElementById('according_to').value;
            const coupon_table = document.getElementById('coupon_table');
            const coupon_output = document.getElementById('coupon_output');
            let field_name;
            let field_val;
            if (according_to == 4) {
                const coupon_code_val = document.getElementById('coupon_code_field').value;
                field_name = 'coupon_code';
                field_val = coupon_code_val;
            } else if (according_to == 5) {
                const coupon_name_val = document.getElementById('coupon_name_field').value;
                field_name = 'coupon_name';
                field_val = coupon_name_val;
            } else if (according_to == 6) {
                const user_id_val = document.getElementById('user_id_field').value;
                field_name = 'user_id';
                field_val = user_id_val;
            } else if (according_to == 7) {
                const issue_condi_val = document.getElementById('issue_condi_field').value;
                field_name = 'issue_condi';
                field_val = issue_condi_val;
            }
            let form = new FormData();
            form.append(field_name, field_val);
            form.append('according_to', according_to);
            fetch('_list_coupon_api.php', {
                method: 'POST',
                body: form
            })
                .then(response => response.json())
                .then(result => {
                    console.log(result);


                    coupon_table.style.display = 'block';
                    let str = '';
                    for (let data of result['data']) {

                        let tr_str = `<tr>
                        <td>
                            <a href="#" class="update_btn" ><i class="fas fa-edit"></i></a>
                        </td>
                        <td class="coupon_id">${data['coupon_id']}</td>
                        <td class="coupon_name">${data['coupon_name']}</td>
                        <td class="coupon_code">${data['coupon_code']}</td>
                        <td class="created_at">${data['created_at']}</td>
                        <td class="dis_num">${data['dis_num']}</td>
                        <td class="dis_type">${data['dis_type']}</td>
                        <td class="issue_condi">${data['issue_condi']}</td>
                        <td class="coupon_valid">${data['coupon_valid']}</td>
                        <td class="coupon_expire">${data['coupon_expire']}</td>
                        <td class="user_id">${data['user_id']}</td>
                        <td><a href="javascript: delete_coupon(${data['coupon_id']})">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>
                            <input type="checkbox" value="${data['coupon_id']}" class="selected_coupon">
                        </td>
                    </tr>`;
                        str += tr_str;
                    }
                    coupon_output.innerHTML = str;


                    if (result['success']) {
                        info_bar.style.display = 'none';
                        // info_bar.className = 'alert alert-success';
                        // info_bar.innerHTML = '刪除成功';
                    } else {
                        info_bar.style.display = 'block';
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = result.errorMsg;
                    }
                })
        }


        function delete_coupon(coupon_id) {
            const info_bar = document.querySelector('#info_bar');
            if (confirm(`確認是否刪除`)) {
                let form = new FormData();
                form.append('coupon_id', coupon_id);
                fetch('_delete_coupon_api.php', {
                    method: 'POST',
                    body: form
                })
                    .then(response => response.json())
                    .then(result => {
                        console.log(result);
                        info_bar.style.display = 'block';
                        if (result['success']) {
                            info_bar.className = 'alert alert-success';
                            info_bar.innerHTML = '刪除成功';
                        } else {
                            info_bar.className = 'alert alert-danger';
                            info_bar.innerHTML = result.errorMsg;
                        }
                    })
            }

        }

        function group_delete() {
            const selected_coupons = document.getElementsByClassName('selected_coupon');
            let form = new FormData();

            //Get all coupon id which has been checked, put it in an array and convert array to string
            let delete_coupons = [];
            Object.keys(selected_coupons).forEach(function (key) {
                if (selected_coupons[key].checked) {
                    delete_coupons.push(selected_coupons[key].value)
                }

            });
            delete_coupons = JSON.stringify(delete_coupons);
            form.append('delete_coupons', delete_coupons);
            fetch('_group_delete_api.php', {
                method: 'POST',
                body: form
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    switch_input()
                })
        }

        function select_all() {
            let items = document.getElementsByClassName('selected_coupon');
            for (let i = 0; i < items.length; i++) {
                if (items[i].type === 'checkbox')
                    items[i].checked = true;
            }
        }

        function unselect_all() {
            let items = document.getElementsByClassName('selected_coupon');
            for (let i = 0; i < items.length; i++) {
                if (items[i].type === 'checkbox')
                    items[i].checked = false;
            }
        }


        function group_assign(){
            if(confirm('確認指派給此使用者')){
                document.getElementById('assign_to_user').style.display = 'none'
                const selected_coupons = document.getElementsByClassName('selected_coupon');

                let form = new FormData();

                //Get all coupon id which has been checked, put it in an array and convert array to string
                let assign_couopns = [];
                Object.keys(selected_coupons).forEach(function (key) {
                    if (selected_coupons[key].checked) {
                        assign_couopns.push(selected_coupons[key].value)
                    }

                });
                assign_couopns = JSON.stringify(assign_couopns);
                form.append('assign_coupons', assign_couopns);


                let user_id = document.getElementById('assign_by_id').value;
                form.append('user_id',user_id);

                fetch('_group_assign_api.php',{
                    method:'POST',
                    body:form
                })
                    .then(response=>response.text())
                    .then(data=>console.log(data))
            }
        }
        function group_update_name(){
            if(confirm('確認更新coupon名稱')){
                document.getElementById('update_coupon_name').style.display = 'none'
                const selected_coupons = document.getElementsByClassName('selected_coupon');
                let form = new FormData();

                //Get all coupon id which has been checked, put it in an array and convert array to string
                let update_coupons = [];
                Object.keys(selected_coupons).forEach(function (key) {
                    if (selected_coupons[key].checked) {
                        update_coupons.push(selected_coupons[key].value)
                    }

                });
                update_coupons = JSON.stringify(update_coupons);
                form.append('update_coupons', update_coupons);


                let name_to_update = document.getElementById('name_to_update').value;
                form.append('name_to_update',name_to_update);

                fetch('_update_coupon_name_api.php',{
                    method:'POST',
                    body:form
                })
                    .then(response=>response.text())
                    .then(data=>console.log(data))
            }
        }

    </script>


<?php include __DIR__ . './_footer.php' ?>