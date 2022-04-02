<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  <title>CONTACT</title>
</head>

<body>
  <!-- <script src="js/contact.js"></script> -->
  <!--  -->
  <header class="header">
    <h1>{{$title}}</h1>
    @if (count($errors) > 0)
    <p class="red error">入力に問題があります</p>
    <!-- <ul>
      @foreach ($errors->all() as $error)
      <li class="red>{{$error}}</li>
      @endforeach
    </ul> -->
    @endif
  </header>
  <!--  -->
  <section class="contact_frame">
    <form name="contact" id="contact" action="/contact" method="post" onsubmit="querySubmit()">
      <table class="contact_tbl">
        @csrf
        <!-- お名前 -->
        <tr class="name_row mini-only">
          <th>お名前<span class="red">※</span></th>
          <td class="name_box">
            <input type="text" class="name_item" name="firstname" id="first_name" value="{{old('firstname',$firstname)}}" onChange="nameChange()">
            <input type="text" class="name_item" name="lastname" id="last_name" value="{{old('lastname',$lastname)}}" onChange="nameChange()">
            <input type="text" class="name_item" name="fullname" id="full_name">
          </td>
        </tr>
        <!-- エラー表示 -->
        @error('fullname')
        <tr class="red error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <!-- お名前 -->
        <tr class="name_row mini-only">
          <th></th>
          <td class="name_box_ex">
            <span class="gray">　例）山田</span>
            <span class="gray">　例）太郎</span>
            <span></span>
          </td>
        </tr>
        <!-- 性別 -->
        <tr class="gender_row mini-only">
          <th>性別<span class="red">※</span></th>
          <td class="gender_box">
            <input type="radio" class="gender_item" name="gender" id="gender1" onChange="genderChange(value)" value=1 {{old('gender',$gender)==1?'checked':''}} checked>　男性　
            <input type="radio" class="gender_item" name="gender" id="gender2" onChange="genderChange(value)" value=2 {{old('gender',$gender)==2?'checked':''}}>　女性　
          </td>
        </tr>
        <!-- エラー表示 -->
        @error('gender')
        <tr class="red error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <!-- メールアドレス -->
        <tr class="email_row mini-only">
          <th>メールアドレス<span class="red">※</span></th>
          <td class="email_box">
            <span></span>
            <input type="email" class="email_item" name="email" id="email" value="{{old('email',$email)}}" onChange="emailChange()">
          </td>
        </tr>
        <!-- エラー表示 -->
        @error('email')
        <tr class="red error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <!-- メールアドレス -->
        <tr class="email_row mini-only">
          <th></th>
          <td class="email_box_ex">
            <span class="gray">　例）test@example.com</span>
          </td>
        </tr>
        <!-- 郵便番号 -->
        <tr class="postcode_row mini-only">
          <th>郵便番号<span class="red">※</span></th>
          <td class="postcode_box">
            <span>〒</span>
            <input type="text" class="postcode_item" name="postcode" id="postcode" value="{{old('postcode',$postcode)}}" onchange="postcodeChange()">
          </td>
        </tr>
        @error('postcode')
        <tr class="red error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <!-- 郵便番号 -->
        <tr class=" postcode_row mini-only">
          <th></th>
          <td class="postcode_box_ex">
            <input type="text" class="postcode_item_ex gray" value="　　　　　例）123-4567" disabled="disabled">
          </td>
        </tr>
        <!-- 住所 -->
        <tr class="address_row mini-only">
          <th>住所<span class="red">※</span></th>
          <td class="address_box">
            <input type="text" class="address_item" name="address" id="address" value="{{old('address',$address)}}" onChange="addressChange()">
          </td>
        </tr>
        <!-- エラー表示 -->
        @error('address')
        <tr class="red error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <!-- 住所 -->
        <tr class="address_row mini-only">
          <th></th>
          <td class="address_box_ex">
            <span class="gray">　例）東京都渋谷区千駄ヶ谷1-2-3</span>
          </td>
        </tr>
        <!-- 建物名 -->
        <tr class="building_row mini-only">
          <th>建物名</th>
          <td class="building_box">
            <input type="text" class="building_item" name="building_name" id="building" value="{{old('building_name',$building_name)}}">
          </td>
        </tr>
        <!-- 建物名 -->
        <tr class="building_row mini-only">
          <th></th>
          <td class="building_box_ex">
            <span class="gray">　例）千駄ヶ谷マンション101</span>
          </td>
        </tr>
        <!-- ご意見 -->
        <tr class="opinion_row mini-only">
          <th>ご意見<span class="red">※</span></th>
          <td class="opinion_box">
            <textarea class="opinion_item" name="opinion" id="opinion" onChange="opinionChange()">{{old('opinion',$opinion)}}</textarea>
          </td>
        </tr>
        <!-- エラー表示 -->
        @error('opinion')
        <tr class="red error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <!--  -->
      </table>
      <!-- 確認ボタン -->
      <div class="submit mini-only">
        <button type="submit" class="submit_btn" name="confirm" id="confirm" value="confirm">確認</button>
      </div>
    </form>
  </section>
  <footer class="footer">
  </footer>

</body>

<script>
  /* -------------------------------------------------- */
  function querySubmit() {
    let fullname = document.getElementById('first_name').value + document.getElementById('last_name').value;
    document.getElementById('full_name').value = fullname;
    // alert('送信');
  }
  /* -------------------------------------------------- */
  function toHankaku(str) {
    str = str.replace('－', '-');
    return str.replace(/[０-９]/g, function(s) {
      return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
    });
  }
  /* -------------------------------------------------- */
  function postcodeChange() {
    let basepostcode = document.getElementById('postcode').value;
    if (basepostcode.length == 8 && (basepostcode.indexOf('-') != -1 | basepostcode.indexOf('－') != -1)) {
      newpostcode = this.toHankaku(basepostcode);
      document.getElementById('postcode').value = newpostcode;
      //郵便番号to住所検索処理
      newpostcode = newpostcode.replace('-', '');
      this.requestAddress(newpostcode);
    }
  }
  /* -------------------------------------------------- */
  function requestAddress(postcode) {
    let form = document.getElementById('contact');
    form.action = '/contact/postcode';
    form.method = 'get';
    if (!form.address.value || form.address.value == "該当住所がありません。") {
      form.postcode.value = postcode;
      form.submit();
    }
  }
  /* -------------------------------------------------- */
  function inputcheck() {
    let form = document.getElementById('contact');
    form.action = '/contact';
    form.method = 'post';
    form.full_name.value = form.first_name.value + form.last_name.value;
    form.submit();
  }
  /* -------------------------------------------------- */
  function nameChange() {
    this.inputcheck();
  }

  function genderChange() {
    this.inputcheck();
  }

  function emailChange() {
    this.inputcheck();
  }

  function addressChange() {
    this.inputcheck();
  }

  function opinionChange() {
    this.inputcheck();
  }
</script>

</html>