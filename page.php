<?php
require_once("php/dbn.php");
    if ($connection == false) 
    {
        echo "Error!";
        echo mysqli_connect_errno();
        exit();
    }
$page = $_GET['id'];
$query = mysqli_query($connection,"SELECT * FROM `news` WHERE id='$page' ");
$article = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mobile.css" />
</head>
<body>
    <div class="bodystyle">
        <div class="container">
            <div class="wrapper">
                <div class="breadcrumbs">
                    <ul class="bread__ul" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="bread__li bread__item-link">
                          <a itemprop="item" href="index.php" class="bread__link">
                            <span itemprop="name">Главная</span>
                            <meta itemprop="position" content="1">
                            </a>
                        </li>
                        <li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="bread__li">
                        <a itemprop="item" href="news.phtml" class="bread__link">
                          <span itemprop="name" class="bread__link">Новости</span>
                          <meta itemprop="position" content="2">
                          </a>
                        </li>
                        <li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="bread__li">
                          <span itemprop="name" class="bread__link"><?php echo $article['title'];?></span>
                          <meta itemprop="position" content="2">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="right-side">
                    <div class="news-main">         
                        <h2 class="topic-text">
                            <?php
                                echo $article['title'];
                            ?>
                        </h2>  
                        <h3 class="news-content">
                            <?php
                                echo ' '.$article['content'];
                            ?>
                        </h3>               
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="app.js"></script>
</body>
</html>