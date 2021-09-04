<?php
session_start();
require_once('funcs3.php');


if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
// 1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
// $file_name = $_FILES["upfile"]["name"];
$name = $_POST['name'];
$area = $_POST['area'];
$price = $_POST['price'];
// $lpw = $_POST['lpw'];
// $hlpw = password_hash($lpw,PASSWORD_DEFAULT);
$gaiyo = $_POST['gaiyo'];
$riyu = $_POST['riyu'];

$file_name = $_FILES["upfile"]["name"];
//   // //一時保存パス作成
$tmp_path  = $_FILES["upfile"]["tmp_name"];
//   // //拡張子取得
$extension = pathinfo($file_name, PATHINFO_EXTENSION);
//   // //ユニークなファイル名を生成
$file_name = date("YmdHis").md5(session_id()) . "." . $extension;
//   // // FileUpload [--Start--]
$img="";//空の変数
$file_dir_path = "upload/".$file_name;//uploadフォルダにファイルを移動


// $status = $stmt->execute();


//   // if ( is_uploaded_file( $tmp_path ) ) {
//     // echo $file_name;
//     echo $name;
//     echo $email;
//     echo $shokai;


  // } else {
  //   echo "false";
  // }


//     if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
//         chmod( $file_dir_path, 0644 );
//         //DB接続
        // $pdo = db_conn();
//         // $sql = "INSERT INTO tasuki_user_db(img)VALUES(:img)";
        // $sql = "INSERT INTO tasuki_user_db(id,name,email,lpw,keireki,shokai,img)
        // VALUES(null,:name,:email,:lpw,:keireki,:shokai,:img)";
        // $stmt = $pdo->prepare($sql);
//       //   $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//       //   $stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//       //   $stmt->bindValue(':lpw', $hlpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//       //   $stmt->bindValue(':keireki', $keireki, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//       //   $stmt->bindValue(':shokai', $shokai, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        // $stmt->bindValue(':img', $file_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
        // $status = $stmt->execute();
//         header('Location:index.php');
//       }
//     }
// // }else{
// //     $img = "画像が送信されていません";
// // }

//     //４．データ登録処理後
//     // if ($status == false) {
//     //     sql_error($stmt);
//     //     } else {
//               //   $img = '<img src="'.$file_dir_path.'">';
//                 // header('Location:index.php');
//         // }
          

if ( is_uploaded_file( $tmp_path ) == true ) {
  if (move_uploaded_file( $tmp_path, $file_dir_path ) == true ) {
    chmod( $file_dir_path, 0644 );
    $pdo = db_conn();
    $stmt = $pdo->prepare(
    "INSERT INTO tasuki_company_db(id,name,area,price,gaiyo,riyu,img)
    VALUES(null,:name,:area,:price,:gaiyo,:riyu,:img)"
    );
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':area', $area, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':gaiyo', $gaiyo,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':riyu', $riyu, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':img', $file_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
  //  echo $file_name;
  //  echo $tmp_path;
  //  echo $file_dir_path;
  //  echo $name;
  //  echo $email;
  //  echo $shokai;
    header('Location:index.php');
  } else {
    echo "false";
}
}
}



// if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {

// 2. DB接続します

// $pdo = db_conn();

// ３．SQL文を用意(データ登録：INSERT)
// $stmt = $pdo->prepare(
//   "INSERT INTO tasuki_user_db(id,name,email,lpw,keireki,shokai)
//   VALUES(NULL,:name,:email,:lpw,:keireki,:shokai)"
// );

// // 4. バインド変数を用意

// // 5. 実行
// $status = $stmt->execute();

// if($status==false){
//     //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//     $error = $stmt->errorInfo();
//     exit("ErrorMassage:".$error[2]);
//   }else{
//     //５．index.phpへリダイレクト
    // header('Location:index.php');
//   }



  //ファイル名を取得
  // $file_name = $_FILES["upfile"]["name"];
  // //一時保存パス作成
  // $tmp_path  = $_FILES["upfile"]["tmp_name"];
  // //拡張子取得
  // $extension = pathinfo($file_name, PATHINFO_EXTENSION);
  // //ユニークなファイル名を生成
  // $file_name = date("YmdHis").md5(session_id()) . "." . $extension;
  // // FileUpload [--Start--]
  // $img="";//空の変数
  // $file_dir_path = "upload/".$file_name;//uploadフォルダにファイルを移動
  
//   $name = $_POST['name'];
//   $email = $_POST['email'];
//   $lpw = $_POST['lpw'];
//   $hlpw = password_hash($lpw,PASSWORD_DEFAULT);
//   $keireki = $_POST['keireki'];
//   $shokai = $_POST['shokai'];

                  // echo "Error:アップロードできませんでした。";

      //[FileUploadCheck--END--] 

// 6．データ登録処理後
// if($status==false){
//   //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//   $error = $stmt->errorInfo();
//   exit("ErrorMassage:".$error[2]);
// }else{
//   //５．index.phpへリダイレクト
//   header('Location:index.php');
// }
?>
