<?php
session_start();
include("connection.php");
include("header.php");

date_default_timezone_set('africa/cairo'); // Replace with your desired time zone

function time_difference($time) {
    $time_difference = time() - strtotime($time);
    $seconds = $time_difference;
    $minutes = round($time_difference / 60);
    $hours = round($time_difference / 3600);
    if ($seconds < 60) {
        return "just now";
    } elseif ($minutes == 1) {
        return "1 minute ago";
    } elseif ($minutes < 60) {
        return "$minutes minutes ago";
    } elseif ($hours == 1) {
        return "1 hour ago";
    } elseif ($hours < 24) {
        return "$hours hours ago";
    } else {
        $result = date("F j, Y, g:i a", strtotime($time));
        echo "Result: " . $result . "\n";
        return $result;
    }
}

if(isset($_POST["send"])){
    $username = $_SESSION["user"]["username"];
    $email = $_SESSION["user"]["email"];
    $message = $_POST["message"];
    $parent_id = $_POST["parent_id"];
    $pro_img = $_SESSION["user"]["pro_img"];
    $comments = $database->prepare("INSERT INTO question_answers(username,email,message,parent_comment_id,img_profile) VALUES(:username, :email, :message, :parent_id,:pro_img)");
    $comments->bindParam(':username', $username);
    $comments->bindParam(':email', $email);
    $comments->bindParam(':message', $message);
    $comments->bindParam(':parent_id', $parent_id);
    $comments->bindParam(':pro_img', $pro_img);
    if($comments->execute()){
        // Refresh the page to prevent form resubmission on page refresh
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "the message was not sent";
    }
}

if (isset($_SESSION["user"])) {
    // User is signed in, show the comment form
    ?>
    
    <?php
    
    // Fetch and display the comments
    $comments_query = $database->query("SELECT * FROM question_answers WHERE parent_comment_id = 0 ORDER BY created_at DESC");
    $comments = $comments_query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($comments as $comment) {
        ?>
        <div class="comment-container">
            <div class="comment">
                <div class="con_details">
        
                <img src= "upload/<?php echo $comment['img_profile'];?>" alt="profile image">
                <div class="name_date">    <strong class="username"> <?php echo $comment['username']; ?></strong> 
                <span class="time"><?php echo time_difference($comment['created_at']); ?></span>
              </div>
    
                  </div>
                   <div class="comment_message"><span class="message"><?php echo $comment['message']; ?></span>
                
                </div>
                
                <?php if ($_SESSION["user"]["role"] == "admin") { ?>
                    <form method="post" action="delete_comment.php">
                        <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                <?php } ?>
            
                <?php
            // Fetch and display replies for this comment
            $replies_query = $database->prepare("SELECT * FROM question_answers WHERE parent_comment_id = :comment_id ORDER BY created_at ASC");
            $replies_query->bindParam(':comment_id', $comment['id']);
            $replies_query->execute();
            $replies = $replies_query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($replies as $reply) {
                ?>
                <div class="reply-container">
                    <div class="reply">
                        <div class="con_details">
                        <img src= "upload/<?php echo $reply['img_profile'];?>" alt="profile image">
                        <div class="name_date">    <strong class="username"> <?php echo $reply['username']; ?></strong> 
                        <span class="time"><?php echo time_difference($reply['created_at']); ?></span>
                      </div>
                          </div>
                         <div class="reply_message"><span class="message"><?php echo $reply['message']; ?></span></div>
                        <?php if ($_SESSION["user"]["role"] == "admin") { ?>
                          
                            <form method="post" action="delete_comment.php">
                                <input type="hidden" name="comment_id" value="<?php echo $reply['id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <?php
            }
            ?>
            
            <!-- Reply form -->
            <div class="reply-form-container">
                <button class="reply-btn">Reply</button>
                <div class="reply-form">
                    <form method="post">
                        <input type="hidden" name="parent_id" value="<?php echo $comment['id']; ?>">
                        <textarea name="message" placeholder="Your reply"></textarea>
                        <button type="submit" name="send">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}
echo '<form method="post" class="comment-form">
<input type="hidden" name="parent_id" value="0">
    <label for="message">Leave a comment:</label>
    <textarea name="message" required></textarea>
    <button type="submit" name="send">Post Comment</button>
</form>';
} else {
    // User is not signed in, show a message to sign in
    ?>
    <p>Please <a href="login.php">sign in</a> to view and add comments.</p>
    <?php
    }
    
  include("footer.php");  
?>
<head>
    <script>
 document.addEventListener("DOMContentLoaded", function() {
  var replyBtns = document.querySelectorAll(".reply-btn");
  for (var i = 0; i < replyBtns.length; i++) {
    replyBtns[i].addEventListener("click", function() {
      var form = this.nextElementSibling;
      if (form.style.display === "none") {
        form.style.display = "block";
      } else {
        form.style.display = "none";
      }
    });
  }
});

        </script>
    <Style>
        .reply-form {
  display: none;
}

        body{
            background-color: #eee;
        }

        .name_date{
            display: flex;
            flex-direction: column;
        }
        .comment_message{
            display: flex;
          margin: 0 50px 0 50px;

        }
        .time{
            font-size: 1rem;
            color:#7a87a9;
        }
.comment-section {
margin-top: 20px;
}


.comment {
border: 1px solid #ddd;
padding: .8em .4em .8em .9em;
background-color: #fdfdfd;
border-radius: 15px;
box-shadow: 0px 0px 5px #ddd;
    position: relative;
    min-height: 64px;
    margin-bottom: 12px;


}

.con_details{
    display: flex;
    flex-direction: row;
}
.comment-container img{
width: 50px;
height: 50px;
border-radius: 50%;
margin-right: 10px;
}

.comment p {
margin: 0;
}

.comment .username {

font-size: 16px;
color: #43b9f1;
margin-right: 5px;
}

.comment .message {
font-size: 14px;

line-height: 1.4;
}

.reply {
margin-left: 30px;
margin-bottom: 5px;

}

.reply p {
margin: 0;
font-size: 14px;
color: #888;
}

.comment-form {
margin-top: 20px;
border: 1px solid #ddd;
padding: 20px;
background-color: #f5f5f5;
border-radius: 5px;
width: 80%;
margin: auto;
}

.comment-form label {
display: block;
margin-bottom: 10px;
font-size: 16px;
color: #333;

}

.comment-form textarea {
width: 100%;
height: 100px;
margin-bottom: 10px;
padding: 10px;
font-size: 16px;
border: 1px solid #ddd;
border-radius: 5px;
}

.comment-form button {
display: block;
margin: 0 auto;
background-color: #4CAF50;
color: #fff;
border: none;
padding: 10px 20px;
border-radius: 5px;
cursor: pointer;
font-size: 16px;
}

.comment-form button:hover {
background-color: #3e8e41;
}

.comment-date {
font-size: 12px;
color: #888;
margin-top: 5px;
}


.comment-container{
    display: flex;
    flex-direction: column;
    width: 80%;
    margin: 20px auto 20px auto;
}
    </style>
</head>