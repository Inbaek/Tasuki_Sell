

    <form action="kaite_list.php" method="post">
    <input type="text" name="name"><br>

    年齢:<br>
        <input type="checkbox" name="age" value="20">20代</input><br>
         <input type="checkbox" name="age" value="30">30代</input><br>
         <input type="checkbox" name="age" value="between 40 and 49">40代</input><br>
         <input type="checkbox" name="age" value="50">50代</input><br>
         <input type="checkbox" name="age" value="60">60代</input><br>
    性別:<br>
        <input type="checkbox" name="sex" value="0">男性</input><br>
        <input type="checkbox" name="sex" value="1" >女性</input><br> 

    地域:<select name="area" >
            <option value="" >都道府県</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
            </select><br>
        <input type="submit" name="search" value="検索"><br>
    </form>

<?php
//SESSIONスタート
session_start();

$user_name = $SESSION['name'];

// if( $_SESSION["chk_ssid"] == session_id() ){

    require_once('funcs3.php');
    //1.  DB接続します
    $pdo = db_conn();

    //SQL文を実行して、結果を$stmtに代入する。
    // $stmt = $pdo->prepare(" SELECT * FROM urite_mae WHERE name LIKE '%" . $_POST["name"] . "%' "); 
    // $stmt->bindValue(':id',$id,PDO::PARAM_INT);
    //実行する

    $name = $_POST["name"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $area = $_POST["area"];

    if (isset($_POST['name']) && $_POST['name'] != "") {
        $where[] = " ( name like '%".$_POST['name']."%' ) ";
    }
    if (isset($_POST['age']) && $_POST['age'] != "") {
        $where[] = " ( age = '".$_POST['age']."' ) ";
    }
    if (isset($_POST['sex']) && $_POST['sex'] != "") {
        $where[] = " ( sex = '".$_POST['sex']."' ) ";
    }
    if (isset($_POST['area']) && $_POST['area'] != "") {
        $where[] = " ( area = '".$_POST['area']."' ) ";
    }

    var_dump($where);

    $sql = 'SELECT * FROM urite_mae';

    if(count($where) > 0){
      $sql .= " where ".implode("and",$where);
    }

    if(isset($_POST["name"])){ //IDおよびユーザー名の入力有無を確認
        $stmt = $pdo->query($sql); //SQL文を実行して、結果を$stmtに代入する。
    };

    echo '<table border="1">
        <caption align="top">買手一覧</caption>
        <tr>
        <th>ID</th>
        <th>名前</th>
        <th>年齢</th>
        <th>地域</th>
        </tr>';

    foreach ($stmt as $row):
        echo "<tr>\n";
            echo "<td>{$row[0]}</td>\n";
            echo "<td>{$row[1]}</td>\n";
            echo "<td>{$row[2]}</td>\n";
            echo "<td>{$row[3]}</td>\n";
            echo '<td><a href="bm_update_view.php?id='.$result["id"].'">';
            echo '[ 詳細 ]';
            echo '</a></td>';
            echo "</tr>\n";

    endforeach;

//         }else{
//   // echo "失敗";
//   header("Location: index.php");
// };

?>

詳細は会員登録が必要になります<a class="navbar-brand" href="login.php">ログイン</a><br>
<a class="navbar-brand" href="index.php">メニューへ</a>

<!-- <h2>検索</h2>
<form action="urite_mae.php" method="post"> -->
    <!-- 任意の<input>要素＝入力欄などを用意する -->
    <!-- <input type="text" name="name"> -->
    <!-- 送信ボタンを用意する -->
    <!-- <input type="submit" name="submit" value="名前を検索する">
</form> -->

<!-- <html>
    <body>
        <table>
            <tr><th>ID</th><th>名前</th><th>年齢</th><th>地域</th><th>性別</th><th>予算（万円）</th></tr> -->
            <!-- ここでPHPのforeachを使って結果をループさせる -->
            <!-- <?php foreach ($stmt as $row): ?>
            <tr>
                <td><?php echo $row[0]?></td>
                <td><?php echo $row[1]?></td>
                <td><?php echo $row[2]?></td>
                <td><?php echo $row[3]?></td>
                <td><?php echo $row[4]?></td>
                <td><?php echo $row[5]?></td>
            </tr>

                <?php endforeach; ?>
        </table>
    </body>
</html> -->