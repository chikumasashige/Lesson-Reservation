<?php
session_start();
// グーグルログイン
require_once(ROOT_PATH .'/Models/Google/Google.php');

// ダイレクトアクセス禁止
require_once(ROOT_PATH .'/Models/Main/Ban.php');
Ban();
//コントローラ読み込み
require_once(ROOT_PATH .'/Controllers/Main/UsersController.php');
$users = new UsersController();
require_once(ROOT_PATH .'/Controllers/Main/StaffController.php');
$staff = new StaffController;

// 削除機能
if(isset($_GET['users'])){
 $user_delete = $users->delete();
 header('location:main.php');
}

if(isset($_GET['staff'])){
  $staff_delete = $staff->delete();
  header('location:main.php');
}

//ユーザー情報読み取り機能
$user = $users->users();
//全ユーザーデータ取得
$all = $users->all();


//全スタッフデータ取得
$instructor = $staff->all();

// $_GETの有無でのデータ取得
require(ROOT_PATH .'/Models/Main/Getdata.php');
$data = new Getdata;
// 会員データ
$user_data = $data->Member();
//スタッフデータ
$staff_data = $data->Staff();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/Main/main.css">
    <title>Lesson Reservstion - メインページ</title>
</head>
<body>
    <header>
    <?php require(ROOT_PATH .'/Views/Main/header.php'); ?>
    </header>
    <main>
      <nav id="nav1">
         <div id="main-wrapp1">
           <div id="tittle-wrapp1">
             <div id="logo-box1">
               <img id="logo1" src="/img/lesson/logo2.png" alt="">
             </div>
             <div id="text1">
               <h1>レッスン</h1>
             </div>
             <div id="box"></div>
           </div>
           <div id="image-wrapp">
               <div id="img-box">
                   <img id="img" src="/img/lesson/lesson1.jpg" alt="">
               </div>
               <div id="text-box">
                   <p>〇〇音楽教室では音楽大学を卒業し現役で活動している講師が、</p>
                   <p>お子様1人1人に合わせたカリキュラムを取り組んでおり、音楽を楽しく学ぶことができます。</p>
                   <br>
                   <br>
                   <p id="reserve-text">レッスンを予約される方はこちらから予約してください。</p>
                   <a id="reserve" href="../../Reserve/reserve_select.php?id=
                   <?php 
                    foreach($user as $key){
                       echo $key['id'];
                    } 
                    ?>&inst_id=
                    <?php
                     foreach($user as $key){
                       echo $key['inst_id'];
                    } 
                    ?>">レッスンを予約する</a>
               </div>
           </div>
         </div>
      </nav>




      <nav id="nav2">
          <div id="main-wrapp2">
            <div id="tittle-wrapp2">
              <div id="logo-box2">
                <img id="logo2" src="/img/lesson/logo3.png" alt="">
              </div>
              <div id="text2">
                <h1>会員情報</h1>
              </div>
              <div id="box"></div>
            </div>
            <div id="member-wrapp">
              <div id="member-box">
                <div id="member-img">
                 <?php foreach($user as $key): ?>
                  <img id="profile-img" src="<?php echo'/img/user/'.$key['image'];?>" alt="">
                 <?php endforeach;?>
                </div>
                <div id="member-text">
                 <?php foreach($user as $key): ?>
                  <h4>氏名：</h4>
                  <p><?= $key['name']?></p>
                  <h4>メールアドレス：</h4>
                  <p><?= $key['email']?></p>
                  <h4>担当楽器：</h4>
                  <p><?= $key['inst']?></p>
                 <?php endforeach;?>
                </div>
              </div>
              <div id="link-box">
                <a class="link" href="../Member/check_schedule.php?users=<?= $key['id'];?>">予約状況確認</a>
                <a class="link" href="../Member/edit.php?id=<?php 
                foreach($user as $key){
                   echo $key['id'];
                } 
                ?>">編集</a>
              </div>
            </div>
          </div>
      </nav>

     <!-- 管理者のみ表示 -->
     <?php 
     foreach($user as $key): 
      ?>
     <?php
      if($key['id'] == 0): 
      ?>
      <nav id="nav3">
          <div id="main-wrapp3">
              <div id="text3">
                <h1 id="manage-tittle">■管理画面</h1>
                <h1>会員情報</h1>
              </div>
              <form action="#nav3" method="GET" novalidate>
                <div class="search-box">
                  <div class="input-box">
                    <p class="search-text">ID：</p>
                    <input class="input" type="text" name="mamber_id" require>
                  </div>
                  <div class="input-box">
                    <p class="search-text">氏名：</p>
                    <input class="input" type="text" name="mamber_name" require>
                  </div>
                  <div class="submit-box">
                  　<input class="submit" type="submit" value="検索">
                  </div>
                </div>
              </form>

                <div class="manage-wrapp">
                 
                  <div class="manage-box">
                      <?php foreach($user_data as $key): ?>
                        <div class="members-box">
                          <div class="image-box">
                         
                           <img class="mambers-img" src="/img/user/<?= $key['image'];?>" alt="">
                          </div>
    
                          <div class="manage-text">
  
                           <div class="profile-box">
                            <p class="profile-name">ID:</p>
                            <p><?= $key['id']?></p>
                           </div>
  
                           <div class="profile-box">
                            <p class="profile-name">氏名:</p>
                            <p><?= $key['name']?></p>
                           </div>
                           <div class="profile-box">
                            <p class="profile-name">アドレス:</p>
                            <p><?= $key['email']?></p>
                           </div> 
  
                           <div class="profile-box">
                            <p class="profile-name">楽器:</p>
                            <p><?= $key['inst']?></p>
                           </div>
                           <div class="edit-link">
                            <a class="link" href="../Member/check_schedule.php?users=<?= $key['id'];?>">予約状況</a>
                            <a class="link" href="../Member/edit.php?id=<?= $key['id'];?>">編集</a>
                            <a class="delete" href="?users=<?= $key['id'];?>">削除</a>
                           </div>
                           
                          </div>
                        </div>
                      <?php endforeach;?>
                  </div>


                  <div class="pages">
                    <?php
                    for($i=0;$i<=$all['pages'];$i++){
                        if(isset($_GET['userpage']) && $_GET['userpage'] == $i){
                            echo "<a class=".'page'.">".($i+1)."</a>";
                        } else {
                            echo "<a class=".'page'." href='?userpage=".$i."'>".($i+1)."</a>";
                        }
                    }
                    ?>
                  </div>
                  
                </div>

          </div>
      </nav>



      <nav id="nav4">
          <div id="main-wrapp3">
              <div id="text3">
                <h1>講師情報</h1>
              </div>
            <form action="#nav4" method="GET" novalidate>
                <div class="search-box">
                  <div class="input-box">
                    <p class="search-text">ID：</p>
                    <input class="input" type="text" name="staff_id" require>
                  </div>
                  <div class="input-box">
                    <p class="search-text">氏名：</p>
                    <input class="input" type="text" name="staff_name" require>
                  </div>
                  <div class="submit-box">
                  　<input class="submit" type="submit" value="検索">
                  </div>
                  <div id="resist">
                   　<a class="resist-link"href="../Staff/resist.php">新規登録</a>
                  </div>

                </div>
            </form>

                <div class="manage-wrapp">
                 
                  <div class="manage-box">
                    <?php foreach($staff_data as $key): ?>
                     <?php if($key['del_flg'] == 0):?> 
                      <div class="members-box">
                        <div class="image-box">
                       
                         <img class="mambers-img" src="/img/staff/<?= $key['image']?>" alt="">
                        </div>
  
                        <div class="manage-text">

                         <div class="profile-box">
                          <p class="profile-name">ID:</p>
                          <p><?= $key['id']?></p>
                         </div>

                         <div class="profile-box">
                          <p class="profile-name">氏名:</p>
                          <p><?= $key['name']?></p>
                         </div>
                         <div class="profile-box">
                          <p class="profile-name">アドレス:</p>
                          <p><?= $key['email']?></p>
                         </div> 

                         <div class="profile-box">
                          <p class="profile-name">楽器:</p>
                          <p><?= $key['inst']?></p>
                         </div>
                         <div class="edit-link">
                          <a class="link" href="../Staff/edit.php?id=<?= $key['id'];?>">編集</a>
                          <a class="delete" href="?staff=<?= $key['id'];?>">削除</a>
                         </div>
                         
                        </div>
    
                      </div>
                     <?php endif; ?>
                    <?php endforeach;?>
                  </div>

                  <div class="pages">
                    <?php
                    for($i=0;$i<=$instructor['pages'];$i++){
                        if(isset($_GET['staffpage']) && $_GET['staffpage'] == $i){
                            echo "<a class=".'page'.">".($i+1)."</a>";
                        } else {
                            echo "<a class=".'page'." href='?staffpage=".$i."'>".($i+1)."</a>";
                        }
                    }
                    ?>
                  </div>
                </div>

          </div>
      </nav>   
      <?php 
    endif; 
    ?> 
      <?php
       endforeach; 
      ?>    
    </main>

    <footer>
    <?php require(ROOT_PATH .'/Views/Main/footer.php'); ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Main/main.js"></script>
</body>
</html>