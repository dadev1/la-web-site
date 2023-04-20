{{-- Illuminate/Foundation/Exceptions/views --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Contact Email</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <!-- bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
    height: 100vh;
    margin: 0;
  }

  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
    padding-top: 30px;
  }

  .position-ref {
    position: relative;
  }

  .content {
    text-align: left;
  }

  .title {
    font-size: 26px;
    padding: 20px;
    text-align: center;
  }

  .email_content {
      font-size: 15px;
      padding: 20px;
      line-height: 1.8;
  }

  .email_message {
      font-size: 13px;
      padding: 20px;
      word-break: break-all;
  }
</style>
</head>
<body>
<div class="container flex-center">
    <div class="content">
      <div class="title">
        連絡先リクエストEメール
      </div>
      <div class="email_content">
        <div> ファーストネーム: {{ $firstname }} </div>
        <div> 苗字: {{ $lastname }} </div>
        <div> 教育: {{ $education }} </div>
        <div> Eメール: {{ $email }} </div>
        <div> メール: {{ $phone }} </div>
        <div> 街: {{ $city }} </div>
        <div> 位置: {{ $position }} </div>
        <div> LinkedIn: {{ $linkedin }} </div>
        <div> として適用: {{ $applyas }} </div>
      </div>
      <div class="email_message">
        {{ $note }}    
      </div>
    </div>
  </div>
</body>
</html>
