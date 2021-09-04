<?php
require 'includes/init.php';
require_once('funcs3.php');
$pdo = db_conn();

// if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
//     if(isset($_GET['id'])){
//         $user_data = $user_obj->find_user_by_id($_GET['id']);
//         if($user_data ===  false){
//             header('Location: profile.php');
//             exit;
//         }
//         else{
//             if($user_data->id == $_SESSION['user_id']){
//                 header('Location: profile.php');
//                 exit;
//             }
//         }
//     }
// }
// else{
//     header('Location: logout.php');
//     exit;
// }
// CHECK FRIENDS
$is_already_friends = $frnd_obj->is_already_friends($_SESSION['user_id'], $user_data->id);
//  IF I AM THE REQUEST SENDER
$check_req_sender = $frnd_obj->am_i_the_req_sender($_SESSION['user_id'], $user_data->id);
// IF I AM THE REQUEST RECEIVER
$check_req_receiver = $frnd_obj->am_i_the_req_receiver($_SESSION['user_id'], $user_data->id);
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo  $user_data->username;?></title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
    <div class="profile_container">
        
        <div class="inner_profile">
            <div class="img">
                <img src="profile_images/<?php echo $user_data->user_image; ?>" alt="Profile image">
            </div>
            <h1><?php echo  $user_data->username;?></h1>
            <nav>
            <ul>
                <li><a href="profile.php" rel="noopener noreferrer">Home</a></li>
                <li><a href="notifications.php" rel="noopener noreferrer">交渉リクエスト<span class="badge <?php
                if($get_req_num > 0){
                    echo 'redBadge';
                }
                ?>"><?php echo $get_req_num;?></span></a></li>
                <li><a href="friends.php" rel="noopener noreferrer">交渉中<span class="badge"><?php echo $get_frnd_num;?></span></a></li>
                <li><a href="logout.php" rel="noopener noreferrer">ログアウト</a></li>
            </ul>
        </nav>
            <div class="actions">
                <?php
                if($is_already_friends){
                    echo '<a href="functions.php?action=unfriend_req&id='.$user_data->id.'" class="req_actionBtn unfriend">交渉解除</a>';
                }
                elseif($check_req_sender){
                    echo '<a href="functions.php?action=cancel_req&id='.$user_data->id.'" class="req_actionBtn cancleRequest">キャンセルリクエスト</a>';
                }
                elseif($check_req_receiver){
                    echo '<a href="functions.php?action=ignore_req&id='.$user_data->id.'" class="req_actionBtn ignoreRequest">拒否</a>&nbsp;
                    <a href="functions.php?action=accept_req&id='.$user_data->id.'" class="req_actionBtn acceptRequest">承認</a>';
                }
                else{
                    echo '<a href="functions.php?action=send_req&id='.$user_data->id.'" class="req_actionBtn sendRequest">本格交渉申請</a>';
                }
                ?>

<a class="navbar-brand" href="chat_tokumei.html">匿名チャット</a>
        
            </div>
        </div>
        <a class="navbar-brand" href="index.php">メニューへ</a>
    </div>
</body>
</html>