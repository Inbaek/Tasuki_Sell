<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link rel="stylesheet" href="css/toroku.css?v=2">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_list.php">サイト一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="kigyo_insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
     <div id="a"><p>　　　企業名称：</p><input type="text" name="name"></div>
     <div id="a"><p>　　　地域：</p><input type="text" name="area"></div>
     <div id="a"><p>　　　譲渡希望額：</p><input type="text" name="price"></div>
     <!-- <p>　　　性別：</p> -->
    <!-- <select name="sex">
    <option >男性</option>
    <option >女性</option>
    </select> -->
     <!-- <div id="a"><p>メールアドレス：</p><input type="text" name="email"></div>
     <div id="a"><p>　　パスワード：</p><input type="text" name="lpw"></div> -->
     <p><企業概要></p><textArea name="gaiyo" rows="4" cols="40"></textArea><br>
     <p><譲渡理由></p><textArea name="riyu" rows="6" cols="40"></textArea><br>
    <input type="file" name="upfile">
    <input type="submit" class="btn btn-success btn-sm" value="Fileアップロード">
    <input id="b" type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<a class="navbar-brand" href="index.php">メニューへ</a>

</body>
</html>
