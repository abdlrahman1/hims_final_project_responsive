
<html>
<head>
<link rel="stylesheet" href="css/books.css"/>
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

$books = $database->prepare("SELECT * FROM books LIMIT $start_from, $result_per_page");
$books->execute();
$result = $books->fetchALL();

?>
<div class="books_container">
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
      echo'<div class="books_card">';
      echo'<a href="books_details.php?id='.$re['id'].'">';
      echo '<div class="books_card_header">';
      echo   '<img src="books/'.$re["img_title"].'" alt="">';
      echo '</div>';
      echo  '<div class="books_card_body">';
      echo    '<span class="books_tag tag-teal">books</span>';
      echo "<h4>".substr($re["title"],0,50). "</h4>";
      echo "<p>".substr($re["article"],0,100). "</p>";
      echo  '<div class="book_user">';
      
      echo  '<img src="books/'.$re["admin_pro"].'" alt="">';
     
    
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
 $total_books = $database->prepare("SELECT COUNT(*) FROM books");
$total_books->execute();
$total_books = $total_books->fetchColumn();
$total_pages = ceil($total_books / $result_per_page);
  for ($i=1; $i<=$total_pages; $i++) {
   if($page == $i) {
    echo '<a style="color:black"; class="page-number" href="books.php?page='.$i.'">'.$i.'</a> ';
   } 
   else{
    echo '<a class="page-number" href="books.php?page='.$i.'">'.$i.'</a> ';
   }
   
  }
  ?>
</div>
</body>
</html>
</body>
</html>