<?php
session_start();

include("connection.php");

if(isset($_SESSION["user"]["role"]) == "admin"){

    echo "<div class='publish_con'>
    <form method='post' enctype='multipart/form-data'>
    <div class='publish_con_child'>
    <h1> post an article </h1>
    <input type='text' name='title' placeholder='title required ! '>
    <input type='text' name='subheading' placeholder='subheading required ! '>
    <input type='file' name='img_title' placeholder='subheading required ! '>
    <textarea  placeholder='content required ! ' required name='content'> </textarea>
    <input type='text'name='subheading2' placeholder='subheading2'>
    <textarea name='content2' placholder = 'content2'> </textarea>
    <input type='file'name='img2'>
    <input type='text'name='subheading3' placeholder='subheading2'>
    <textarea name='content3' placholder = 'content3'> </textarea>
    <input type='file'name='img3'>
    <button type='submit' name='publish_btn'> publish</button>
    </div>
    </form>
    </div>";
    if(isset($_POST["publish_btn"])){
        if (empty($_POST["title"]) || empty($_POST["subheading"]) || empty($_FILES["img_title"]["tmp_name"]) || empty(trim($_POST["content"]))) {
            
            echo "Title, Subheading, Image, and Content are required fields.";
         
          }
        else{
            $admin_id = $_SESSION["user"]["id"];
            $admin_name = $_SESSION["user"]["username"];
            $admin_pro = $_SESSION["user"]["pro_img"];
            $title = $_POST["title"];
            $subheading = $_POST["subheading"] ;
            $img_title = $_FILES["img_title"]["name"];
            $content = $_POST["content"];
            $subheading2 = (isset($_POST["subheading2"])) ? $_POST["subheading2"] : NULL;
            $content2 = (isset($_POST["content2"])) ? $_POST["content2"] : NULL;
            $img2 = (isset($_FILES["img2"])) ? $_FILES["img2"]["name"] : NULL;
            $subheading3 = (isset($_POST["subheading3"])) ? $_POST["subheading3"] : NULL;
            $content3 = (isset($_POST["content3"])) ? $_POST["content3"] : NULL;
            $img3 = (isset($_FILES["img3"])) ? $_FILES["img3"]["name"] : NULL;
            if(isset($content) && !empty($content)){
                if(file_exists("articles")){
                    $target_dir = 'D:\xampp\htdocs\php code\hims_final_project\articles/';
                    $target_file = $target_dir . basename($_FILES["img_title"]["name"]);
                    if(move_uploaded_file($_FILES["img_title"]["tmp_name"], $target_file)){
                        $img_title = $_FILES["img_title"]["name"];
                        $img2 = '';
                        if(isset($_FILES["img2"]["name"]) && !empty($_FILES["img2"]["name"])){
                            $target_file2 = $target_dir . basename($_FILES["img2"]["name"]);
                            if(move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file2)){
                                $img2 = $_FILES["img2"]["name"];
                            }
                            if(isset($_FILES["img3"]["name"]) && !empty($_FILES["img3"]["name"])){
                                $target_file3 = $target_dir . basename($_FILES["img3"]["name"]);
                                if(move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file3)){
                                    $img3 = $_FILES["img3"]["name"];
                                }
                            }
                        }
                        $insert_article = $database->prepare("INSERT INTO articles(admin_id,admin_name,admin_pro,title,subheading,img_title,article,subheading2,content2,img2,subheading3,content3,img3,create_date)VALUES(:admin_id,:admin_name,:admin_pro,:title,:subheading,:img_title,:content,:subheading2,:content2,:img2,:subheading3,:content3,:img3,now())");
                        $insert_article->bindParam(':admin_id', $admin_id);
                        $insert_article->bindParam(':admin_name', $admin_name);
                        $insert_article->bindParam(':admin_pro',$admin_pro);
                        $insert_article->bindParam(':title', $title);
                        $insert_article->bindParam(':subheading', $subheading);
                        $insert_article->bindParam(':img_title',$img_title);
    
                    $insert_article->bindParam(':content', $content);
                    $insert_article->bindParam(':subheading2', $subheading2);
                    $insert_article->bindParam(':content2', $content2);
                    $insert_article->bindParam(':img2', $img2);
                    $insert_article->bindParam(':subheading3', $subheading3);
                    $insert_article->bindParam(':content3', $content3);
                    $insert_article->bindParam(':img3', $img3);
                    if($insert_article->execute()){
                        echo "The article has been published.";
                    }
                }
                else{
                    echo "An error occurred while publishing the article.";
                }
            }
            else{
                echo "An error occurred while uploading the image.";
            }
        }
        else{
            echo "The content field is empty.";
        }
    }
}
}

    
?>


<head>

<link rel="stylesheet" href="css/publish_article.css"/>
</head>
<body>
    

</body>
</html>
