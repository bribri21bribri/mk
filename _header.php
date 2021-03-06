<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
  <script src="./node_modules/jquery/dist/jquery.min.js"></script>
  <script src="./node_modules/underscore/underscore.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <title>Document</title>
    <style>
        body {
            font-family: Arial, "微軟正黑體";
        }
    </style>

</head>

<body>

<header class="bg-dark">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-6 mt-2">
                <h1 class=" text-white text-center">
                    GO CAMPING 後台
                </h1>
            </div>
        </div>
    </div>
</header>

<div class="bg-white py-3">
    <div class="container-fluid">
        <div class="row d-flex">

            <nav class="col-2">
                <div class="accordion" id="accordionExample">

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    會員
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="..\member\member_list.php">
                                會員清單
                            </a>
                            <a class="card-body ml-2 d-flex" href="#">
                                會員等級
                            </a>
                            <a class="card-body ml-2 d-flex" href="#">
                                收藏管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="#">
                                勳章管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="#">
                                活動管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="#">
                                訂單管理
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    主題活動
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="..\event\event_insert.php">
                                新增活動
                            </a>
                            <a class="card-body ml-2 d-flex" href="..\event\event_list.php">
                                活動列表
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    分享樂
                                </button>
                            </h2>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="..\share_fun\post_list.php">
                                新手指南
                            </a>
                            <a class="card-body ml-2 d-flex" href="#">
                                達人帶路
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    商品管理
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="../SalePage/salepage_list.php">
                                商品清單
                            </a>
                            <a class="card-body ml-2 d-flex" href="../SalePage/salepage_creat.php">
                                建立商品頁
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    營地主
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="">
                                營地列表
                            </a>
                            <a class="card-body ml-2 d-flex" href="../host_menu.php">
                                營地主管理
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                    行銷
                                </button>
                            </h2>
                        </div>

                        <div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="_plan_list.php">
                                行銷方案管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="_list_coupon.php">
                                Coupon管理
                            </a>
                        </div>
                    </div>

                </div>
            </nav>

            <main class="col-10 bg-white">

                <aside class="bg-warning">
                    <span></span>
                    <p></p>
                </aside>

                <section>
                    <span></span>
                    <p></p>
