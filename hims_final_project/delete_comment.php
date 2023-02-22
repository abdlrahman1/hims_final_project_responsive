<?php
session_start();
include("connection.php");

if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] == "admin") {
    if (isset($_POST["comment_id"])) {
        $comment_id = $_POST["comment_id"];
        // First, delete any child comments (if any)
        $delete_child_comments_query = $database->prepare("DELETE FROM question_answers WHERE parent_comment_id = :comment_id");
        $delete_child_comments_query->bindParam(':comment_id', $comment_id);
        $delete_child_comments_query->execute();
        // Then, delete the parent comment
        $delete_comment_query = $database->prepare("DELETE FROM question_answers WHERE id = :comment_id");
        $delete_comment_query->bindParam(':comment_id', $comment_id);
        if ($delete_comment_query->execute()) {
            echo "Comment deleted successfully!";
        } else {
            echo "An error occurred while deleting the comment.";
        }
    } else {
        echo "No comment ID provided.";
    }
} else {
    echo "You do not have permission to perform this action.";
}
?>
