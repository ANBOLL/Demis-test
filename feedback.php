<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mobile.css" />
    <title>Обратная связь</title>
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
              <span itemprop="name" class="bread__link">Обратная связь</span>
              <meta itemprop="position" content="2">
            </li>
          </ul>
        </div>
      </div>
      <div class="content">
        <div class="right-side">
          <div class="topic-text">Обратная связь!</div>
          <p>Оставьте свои контактные данные, мы с Вами свяжемся!</p>
          <form action="contact.php" name="form" method="POST" enctype="multipart/form-data">
            <div class="input-box">
              <label for="name">Ваше имя*</label>
                <input
                  type="text"
                  placeholder="Иванов Иван Иванович"
                  name="name"
                  id="name"
                  data-reg
                  required
                  pattern="^[А-ЯЁ][а-яё]*([-][А-ЯЁ][а-яё]*)?\s[А-ЯЁ][а-яё]*\s[А-ЯЁ][а-яё]*$"
                  />
            </div>
            <div class="input-box">
              <label for="name">Ваш адрес</label>
                <input
                  type="text"
                  placeholder="г. Москва"
                  name="adress"
                  id="adress"
                  required
                  pattern="^[г.]*\s[А-ЯЁ][а-яё]*([-][А-ЯЁ][а-яё]*)*$"
                  data-reg
                />
            </div>
            <div class="input-box">
              <label for="phone">Контактный номер*</label>
                <input
                  type="phone"
                  placeholder="+71234567890"
                  name="phone"
                  id="phone"
                  data-reg
                  required
                  pattern="^((\+7|7|8)+([0-9]){10})$"
                />
            </div>
            <div class="input-box">
              <label for="email">Ваш E-mail*</label>
                <input
                  type="email"
                  placeholder="name@mail.com"
                  name="email"
                  id="email"
                  data-reg="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$"
                  required
                />
            </div>
            <div class="button">
              <input type="submit" name="send" value="Отправить" class="but">
            </div>
          </form>
        </div>
      </div>
      <?php if (!empty($response)) { ?>
        <div class="messagephp<?php echo $response['status']; ?>">
          <?php echo $response['message']; ?>
        </div>
        <div class="button stbut">
          <a href="index.php">
              <input type="submit" name="send" value="Выйти" class="but">
          </a>
        </div>
      </div>
<?php } ?>
  </div>
  <script src="js/app.js"></script>
</body>
</html>
