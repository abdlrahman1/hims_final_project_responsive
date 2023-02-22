<?php 
session_start();
include("connection.php");
include("header.php");
date_default_timezone_set('Africa/cairo');
?>
<form method="post">
<div class="parent_search">
<input type="text" class="search_input" name="search_input">
</div>
</form>
<div class="container">

<?php
$result_per_page = 8;
$page = 1;
if(isset($_GET['page'])) {
  $page = $_GET['page'];
}
$start_from = ($page-1) * $result_per_page;
$result = $database->prepare("
SELECT *, 'books' as source FROM books
UNION
SELECT *, 'article' as source FROM articles
UNION
SELECT *, 'challenges' as source FROM challenges
ORDER BY create_date DESC
LIMIT $start_from, $result_per_page");
$result->execute();
while ($row = $result->fetch()) {
  $postTime = new DateTime($row['create_date']);
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
echo'<a href="' . $row['source'] . '_details.php?id=' . $row['id'] . '">';
  echo '<div class="card-header">';
  if ($row['source'] == 'books') {
    echo   '<img src="books/'.$row["img_title"].'" alt="">';
  } elseif ($row['source'] == 'article') {
    echo   '<img src="articles/'.$row["img_title"].'" alt="">';
  }
  elseif($row['source'] == 'challenges') {
    
    echo   '<img src="challenges/'.$row["img_title"].'" alt="">';
  }
  echo '</div>';
  echo  '<div class="card-body">';
  echo    '<span class="tag tag-teal">' . $row["source"].'</span>';
  echo "<h4>".substr($row["title"],0,30). "</h4>";
  echo "<p>".substr($row["article"],0,50). "</p>";
  echo  '<div class="user">';
  echo  '<img src="upload/'.$row["admin_pro"].'" alt="">';
  echo   '<div class="user-info">';
  echo     '<h5>'.$row['admin_name'].'<h5>';
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
$total_rows = $database->prepare("
SELECT COUNT(*) FROM (
  SELECT * FROM books
  UNION
  SELECT * FROM articles
  UNION
  SELECT * FROM challenges
) AS combined_results
");
  $total_rows->execute();
  $total_rows = $total_rows->fetchColumn();
  $total_pages = ceil($total_rows / $result_per_page);
  for ($i=1; $i<=$total_pages; $i++) {
    if ($page == $i) {
      echo '<a style="color:black"; class="page-number" href="index.php?page='.$i.'">'.$i.'</a> ';
    } else {
      echo '<a class="page-number" href="index.php?page='.$i.'">'.$i.'</a> ';
    }
  }
  ?>
</div>

<div class="container2">
<?php 
$search_input = "";
if(isset($_POST["search_input"])) {
  $search_input = $_POST["search_input"];
  $stmt = $database->prepare("
  (SELECT *, 'books' as source FROM books WHERE title LIKE '%$search_input%')
  UNION
  (SELECT *, 'article' as source FROM articles WHERE title LIKE '%$search_input%')
  UNION
  SELECT *, 'challenges' as source FROM challenges WHERE title LIKE '%$search_input%'");
  
  $stmt->execute();
  $total_results = $stmt->rowCount();
  $total_pages = ceil($total_results / $result_per_page);

  $start_from = ($page-1) * $result_per_page;


  $stmt = $database->prepare("
  (SELECT *, 'books' as source FROM books WHERE title LIKE '%$search_input%' LIMIT $start_from, $result_per_page)
  UNION
  (SELECT *, 'article' as source FROM articles WHERE title LIKE '%$search_input%' LIMIT $start_from, $result_per_page)
  UNION
  SELECT *, 'challenges' as source FROM challenges WHERE title LIKE '%$search_input%' LIMIT $start_from, $result_per_page");
  
  $stmt->execute();
  $search_results = $stmt->fetchAll();
  if (count($search_results) > 0) {
    $_SESSION["search_results"] = $search_results;
  } else {
    echo "No results found.";
  }
}
if (isset($_SESSION["search_results"])) {
  $search_results = $_SESSION["search_results"];
  echo '<script type="text/javascript">document.querySelector(".container").style.display = "none";</script>';
  echo '<script type="text/javascript">document.querySelector(".pagination").style.display = "none";</script>';

  foreach ($search_results as $search_result) {
    echo '<div class="card">';
    echo '<a href="' . $search_result['source'] . '_details.php?id=' . $search_result['id'] . '">';
    echo '<div class="card-header">';
    if ($search_result['source'] == 'books') {
      echo '<img src="books/' . $search_result["img_title"] . '" alt="">';
    } elseif ($search_result['source'] == 'article') {
      echo '<img src="articles/' . $search_result["img_title"] . '" alt="">';
    }
    elseif ($search_result['source'] == 'challenges') {
      echo '<img src="challenges/' . $search_result["img_title"] . '" alt="">';
    }
    echo '</div>';
    echo '<div class="card-body">';
    echo '<span class="tag tag-teal">' . $search_result["source"] . '</span>';
    echo '<h4>' . $search_result['title'] . '<h4>';
    echo "<p>" . substr($search_result["article"], 0, 100) . "</p>";
    echo '<div class="user">';
    echo '<img src="articles/' . $search_result["admin_pro"] . '" alt="">';
    echo '<div class="user-info">';
    echo '<h5>' . $search_result['admin_name'] . '<h5>';
    echo '<small>' . $timeAgo . '</small>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
    echo '</div>';
  }

  // Pagination links
  echo '<div class="pagination2">';
  for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='index.php?page=$i'>$i</a>";
  }
  echo '</div>';
}
?>
</div>

<head>
<link rel = "stylesheet"href="css/index.css"/>
</head>
<?php


?>