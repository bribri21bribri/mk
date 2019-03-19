<?php
$val= 1;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <div id="test">

  </div>
</body>
</html>
<script>
  const test = document.getElementById('test');
  test.innerHTML = '<?php if($val==0):?>'+'<h1>SUCCESS</h1>'+'<?php else:?>'+'<h1>FAIL</h1>'+'<?php endif;?>'
</script>

