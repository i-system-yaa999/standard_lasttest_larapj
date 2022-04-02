<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  <title>CONFIRM</title>
</head>

<body>
  <!--  -->
  <header class="header">
    <h1>{{$title}}</h1>
  </header>
  <!--  -->
  <section class="contact_frame">
    <form name="contact" action="/contact/complete" method="post">
      <table class="contact_tbl">
        @csrf
        <!-- お名前 -->
        <tr class="name_row mini-only">
          <th>お名前</th>
          <td class="name_box">
            <input type="text" class="name_item" name="firstname" id="first_name" value="{{$firstname}}" tabindex="-1">
            <input type="text" class="name_item" name="lastname" id="last_name" value="{{$lastname}}" tabindex="-1">
            <input type="text" class="name_item" name="fullname" id="full_name" value="{{$fullname}}" tabindex="-1">
          </td>
        </tr>
        <!-- お名前 -->
        <tr class="name_row mini-only">
          <th></th>
          <td class="name_box_ex">
            <span class="gray">　</span>
            <span class="gray">　</span>
            <span></span>
          </td>
        </tr>
        <!-- 性別 -->
        <tr class="gender_row mini-only">
          <th>性別</th>
          <td class="gender_box">
            @if($gender==1)
            <input class="gender_item" type="radio" name="gender" id="gender1" value=1 checked tabindex="-1">　男性　
            @elseif($gender==2)
            <input class="gender_item" type="radio" name="gender" id="gender2" value=2 checked tabindex="-1">　女性　
            @endif
          </td>
        </tr>
        <!-- メールアドレス -->
        <tr class="email_row mini-only">
          <th>メールアドレス</th>
          <td class="email_box">
            <span></span>
            <input type="email" class="email_item" name="email" id="email" value="{{$email}}" tabindex="-1">
          </td>
        </tr>
        <!-- メールアドレス -->
        <tr class="email_row mini-only">
          <th></th>
          <td class="email_box_ex">
            <span class="gray">　</span>
          </td>
        </tr>
        <!-- 郵便番号 -->
        <tr class="postcode_row mini-only">
          <th>郵便番号</th>
          <td class="postcode_box">
            <!-- <span>〒</span> -->
            <input type="text" class="postcode_item" name="postcode" id="postcode" value="{{$postcode}}" tabindex="-1">
          </td>
        </tr>
        <!-- 郵便番号 -->
        <tr class=" postcode_row mini-only">
          <th></th>
          <td class="postcode_box_ex">
            <input type="text" class="postcode_item_ex gray" value="　" disabled="disabled">
          </td>
        </tr>
        <!-- 住所 -->
        <tr class="address_row mini-only">
          <th>住所</th>
          <td class="address_box">
            <input type="text" class="address_item" name="address" id="address" value="{{$address}}" tabindex="-1">
          </td>
        </tr>
        <tr class="address_row mini-only">
          <th></th>
          <td class="address_box_ex">
            <span class="gray">　</span>
          </td>
        </tr>
        <!-- 建物名 -->
        <tr class="building_row mini-only">
          <th>建物名</th>
          <td class="building_box">
            <input type="text" class="building_item" name="building_name" id="building" value="{{$building_name}}" tabindex="-1">
          </td>
        </tr>
        <tr class="building_row mini-only">
          <th></th>
          <td class="building_box_ex">
            <span class="gray">　</span>
          </td>
        </tr>
        <!-- ご意見 -->
        <tr class="opinion_row mini-only">
          <th>ご意見</th>
          <td class="opinion_box">
            <textarea class="opinion_item" name="opinion" id="opinion" tabindex="-1">{{$opinion}}</textarea>
          </td>
        </tr>
        <!--  -->
      </table>
      <!-- 送信ボタン -->
      <div class="submit mini-only">
        <p><button type="submit" class="submit_btn" name="complete" value="complete">送信</button></p>
        <p><button type="submit" class="link_style_btn" name="back" value="back">修正する</button></p>
      </div>
    </form>
  </section>
  <footer class="footer">
  </footer>
</body>

<style>
  .name_item,
  .email_item,
  .postcode_item,
  .address_item,
  .building_item,
  .opinion_item {
    border: none;
    background-color: white;
    pointer-events: none;
  }

  .gender_item {
    visibility: hidden;
    margin-left: -25px;
    pointer-events: none;
  }

  #first_name,
  #last_name {
    display: none;
  }

  #full_name {
    display: block;
  }
</style>

</html>