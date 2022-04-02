<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
  <title>contact-Manager</title>
</head>

<body>
  <!--  -->
  <header class="header">
    <h1>管理システム</h1>
  </header>
  <!-- 検索ボックス -->
  <section class="manage_frame">
    <form name="search" action="/contactmanage/search" method="get">
      @csrf
      <ul class="search">
        <!-- 名前 -->
        <li class="name_row">
          <div class=" name_box">
            <label for="full_name">お名前</label>
            <input type="text" class="name_item" name="fullname" id="full_name" value="{{$fullname}}">
          </div>
          <!-- 性別 -->
          <div class="gender_box">
            <label for="">　　性別　</label>
            <input type="radio" class="gender_item" name="gender" id="gender0" value=0 {{$gender==0?'checked':''}} checked>　全て　
            <input type="radio" class="gender_item" name="gender" id="gender1" value=1 {{$gender==1?'checked':''}}>　男性　
            <input type="radio" class="gender_item" name="gender" id="gender2" value=2 {{$gender==2?'checked':''}}>　女性　
          </div>
        </li>
        <!-- 登録日 -->
        <li class="create_row">
          <label for="">登録日</label>
          <input type="date" class="create_item" name="created_at1" id="created_at1" value="{{$created_at1}}">
          ～
          <input type="date" class="create_item" name="created_at2" id="created_at2" value="{{$created_at2}}">
        </li>
        <!-- メールアドレス -->
        <li class="email_row">
          <label for="email">メールアドレス</label>
          <input type="text" class="email_item" name="email" id="email" value="{{$email}}">
        </li>
      </ul>
      <!-- 検索ボタン -->
      <div class="search_submit">
        <p><button type="submit" class="submit_btn" name="search" id="search" value="search">検 索</button></p>
        <p><button type="submit" class="link_style_btn" name="search_rst" id="search_rst" value="search_rst">リセット</button></p>
      </div>
    </form>
  </section>
  <!-- 検索結果表示 -->
  <section class="search_answer">
    <!-- ページネーション -->
    <div class="page_info">
      <div class="page_counts">
        全{{$items->total()}}件中
        @if($items->total() > 0)
        {{$items->firstItem()}}～{{$items->lastItem()}}件
        @endif
      </div>
      @if($items->total() > 0)
      {{$items->appends(request()->query())->links('pagination::bootstrap-4')}}
      @endif
    </div>
    <!-- 結果リスト -->
    <form name="list" action="/contactmanage/delete" method="get">
      @csrf
      <table class="serch_tbl">
        <tr>
          <th class="s_id s_line">ID</th>
          <th class="s_name s_line">お名前</th>
          <th class="s_gender s_line">性別</th>
          <th class="s_email s_line">メールアドレス</th>
          <th class="s_opinion s_line">ご意見</th>
          <th class="s_reserve s_line"></th>
          <th class="s_delpb s_line"></th>
        </tr>
        @foreach ($items as $item)
        <tr>
          <td class="s_id">{{$item->id}}</td>
          <td class="s_name">{{$item->fullname}}</td>
          <td class="s_gender">{{$item->gender}}</td>
          <td class="s_email">{{$item->email}}</td>
          <td class="s_opinion text-ellipsis" title="{{$item->opinion}}">{{$item->opinion}}</td>
          <td class="s_reserve"></td>
          <td class="s_delpb">
            <button type="submit" class="delete_btn" name="delete_btn" value="{{$item->id}}">削 除</button>
          </td>
        </tr>
        @endforeach
      </table>
    </form>
  </section>
  <!--  -->
  <footer class="footer">
  </footer>
</body>


</html>