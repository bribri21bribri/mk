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
<form name="form1" method="POST">
  <input type="text" name="input1" id="input1">
</form>
<script>
  let form = document.form1;
  let input = document.getElementById('input1')
  input.addEventListener('change',submitForm);
  function submitForm(){
    // form.submit();
    let formInput = new FormData();
    formInput.append('input',input.value);
    fetch('test_receive.php',{
      method:'POST',
      body:formInput
    })
        .then(response=>response.text())
        .then(data=>console.log(data))
  }
</script>
</body>
</html>