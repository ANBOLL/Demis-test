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
                        <a itemprop="item" href="#" class="bread__link">
                            <span itemprop="name">Главная</span>
                            <meta itemprop="position" content="1">
                        </a>
                    </ul>
                </div>
                    
            </div>
            <div class="content">
                <div class="right-side">
                    <?php
                        require_once("php/dbn.php");
                        if ($connection == false) 
                            {
                                echo "Error!";
                                echo mysqli_connect_errno();
                                exit();
                            }
                        if (isset($_GET['page'])) 
                            {
                                $page = $_GET['page'];
                            } 
                        else 
                            {
                                $page = 1;
                            }
                        $limit = 3;
                        $number = ($page * $limit) - $limit;
                        $res_count = mysqli_query($connection, "SELECT COUNT(*) FROM `$dbarticles`");
                        $row = mysqli_fetch_row($res_count);
                        $total = $row[0];
                        $str_page = ceil($total / $limit);
                        $query = mysqli_query($connection,"SELECT * FROM $dbarticles ORDER BY `idate` DESC LIMIT $number, $limit");
                        ?>
                    <div class="news-main">
                        <?php
                            while ($article = mysqli_fetch_assoc($query)) 
                            {   
                                $timestamp = $article['idate'];   
                                echo '<div class="art">';
                                $run = date("d-m-Y", $timestamp);
                                echo '<span class="idatestyle">'.$run.'</span>'.' <a class="title-style" href=page.php?id='.$article['id'].'>'.'<span class="titlestyle">'.$article['title'].'</span>'.'</a><br>';
                                echo '<br>';
                            
                                $text = $article['content'];
                                $patern="#<[\s]*p[\s]*>([^<]*)<[\s]*/p[\s]*>#i";
                                if(preg_match($patern, $text, $matches))
                                {
                                $first_p = $matches[1];
                                $first_pr = substr($first_p,0,strpos($first_p,'.'));
                                echo "<span>".$first_pr."</span>";
                                }
                                echo '<br>';
                                echo '</div>'; 
                                
                            }
                            ?>
                        <div class="button">
                            <a href="news.phtml">
                                <input type="submit" name="news" value="Все новости" class="but">
                            </a>
                            <a href="feedback.php">
                                <input type="submit" name="feedback" value="Обратная связь" class="but">
                            </a>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <script src="app.js"></script>
    </body>
</html>