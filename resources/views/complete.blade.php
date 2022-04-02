<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>complete</title>
</head>

<body>
  <!--  -->
  <header class="header">
    <h1>{{$title}}</h1>
  </header>
  <!--  -->
  <section class="contents">
    <p>ご意見いただきありがとうございました。</p>
    <button type=“button” onclick="location.href='/contact'">トップページ</button>
  </section>
  <footer class="footer">
  </footer>
</body>

<style>
  .header {
    text-align: center;
  }

  .contents {
    text-align: center;
    transform: translateY(30vh);
  }

  button {
    color: white;
    background-color: black;
    width: 150px;
    height: 45px;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
  }
</style>

</html>