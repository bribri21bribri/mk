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

<div class="bg-white py-3" >

    <div class="container-fluid">
        <div class="row d-flex">

            <nav class="col-2">
                <div class="accordion" id="accordionExample">

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    會員管理
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="">
                                訂單管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="">
                                收藏管理
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    分享樂
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="">
                                達人帶路
                            </a>
                            <a class="card-body ml-2 d-flex" href="">
                                新手指南
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    營地主
                                </button>
                            </h2>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="">
                                營地列表
                            </a>
                            <a class="card-body ml-2 d-flex" href="">
                                營地主管理
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    行銷
                                </button>
                            </h2>
                        </div>

                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="">
                                行銷方案管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="">
                                Coupon管理
                            </a>
                        </div>
                    </div>

                </div>
            </nav>

            <main class="col-10 bg-white">

                <aside class="bg-warning">
                    <span>麵包屑 區域</span>
                    <p>會員管理 / 訂單管理 / 收藏管理</p>
                </aside>

                <section>
                    <span>主要頁面 區域</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente laudantium aspernatur debitis rem sequi quaerat ullam at. Incidunt ipsum cum quis perferendis natus aspernatur molestias adipisci pariatur, at quas corrupti!</p>



