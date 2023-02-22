
<html>
<head>
  <link rel = "stylesheet" href="css/article.css">
</head>
<body>

<?php
session_start();
include("connection.php");
include("header.php");

date_default_timezone_set('Africa/cairo');
$result_per_page = 8;
$page = 1;

if(isset($_GET['page'])) {
  $page = $_GET['page'];
}

$start_from = ($page-1) * $result_per_page;

$aritcles = $database->prepare("SELECT * FROM articles LIMIT $start_from, $result_per_page");
$aritcles->execute();
$result = $aritcles->fetchALL();

?>
<form method = "post">
<div class="search_con">
  <input type="text"name="article_search"class="article_search">

</div>
</form>
<?php 
if(isset($_POST["article_search"])){
  $article_search = $_POST['article_search'];
  $article_engine = $database->prepare("SELECT * from articles WHERE title Like '%$article_search%'");
  $article_engine->execute();
  $result = $article_engine->fetchAll();
if(!empty($result)){
  if(count($result)>0){
    "its found";
  }
}
else{
  echo "please insert a value";
}

}
?>
<div class="container">
  <?php
    foreach ($result as $re) {
      $postTime = new DateTime($re['create_date']);
      $currentTime = new DateTime();
      $interval = $currentTime->diff($postTime);
      $timeAgo = '';
      if ($interval->y >= 1) {
        $timeAgo = $interval->y . ' years ago';
      } elseif ($interval->m >= 1) {
        $timeAgo = $interval->m . ' months ago';
      } elseif ($interval->d >= 1) {
        $timeAgo = $interval->d . ' days ago';
      } elseif ($interval->h >= 1) {
        $timeAgo = $interval->h . ' hours ago';
      } elseif ($interval->i >= 1) {
        $timeAgo = $interval->i . ' minutes ago';
      } else {
        $timeAgo = 'Less than a minute ago';
      }
      echo'<div class="card">';
      echo'<a href="article_details.php?id='.$re['id'].'">';
      echo '<div class="card-header">';
      echo   '<img src="articles/'.$re["img_title"].'" alt="">';
      echo '</div>';
      echo  '<div class="card-body">';
      echo    '<span class="tag tag-teal">articles</span>';
      echo "<h4>".substr($re["title"],0,50). "</h4>";
      echo "<p>".substr($re["article"],0,100). "</p>";
      echo  '<div class="user">';
      
      echo  '<img src="upload/'.$re["admin_pro"].'" alt="">';
     
    
      echo   '<div class="user-info">';
      echo     '<h5>'.$re['admin_name'].'<h5>';
      echo     '<small>'.$timeAgo.'</small>';
      echo    '</div>';
      echo   '</div>';
      echo  '</div>';
      echo  '</div>';
      echo '</a>';
    }
    
    ?>
    
    </div>
    <div class="pagination">
  <?php
 $total_articles = $database->prepare("SELECT COUNT(*) FROM articles");
$total_articles->execute();
$total_articles = $total_articles->fetchColumn();
$total_pages = ceil($total_articles / $result_per_page);
  for ($i=1; $i<=$total_pages; $i++) {
   if($page == $i) {
    echo '<a style="color:black"; class="page-number" href="articles.php?page='.$i.'">'.$i.'</a> ';
   } 
   else{
    echo '<a class="page-number" href="articles.php?page='.$i.'">'.$i.'</a> ';
   }
   
  }
  ?>
</div>

</body>
</html>
</body>
</html>