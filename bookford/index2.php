<?php
session_start();

include ('avtor/bread.php');
$bookford = new Database();

require('avtor/bd_bookford/insert.php');
$avtors_array = $bookford->query("SELECT * FROM `avtor`");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookford</title>
    <link rel="stylesheet" href="style/reg_avtoris.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/myStr.css">
</head>
<body>
<script src="js/jquery-3.6.0.min.js"></script>
<header>
    <div class="auto">
<!--        не забыть грохнуть сессию-->
        <a href="avtor/end_session.php">Выход</a>
    </div>
    <!--Логотип -->
    <div class="logo">
        <a href="index2.php"><img src="images/logo2..svg" alt="" width="200px"></a>
    </div>
    <!--Каталог -->
    <div class="nav">
        <div class="katalog">
            <a href="KATALOG_ADMIN.php" class="punkt_menu">Каталог произведений</a>
        </div>
    </div>
</header>
<section class="polzov_my_str">
    <div>
        <div class="block">
            <img src="<?=$_SESSION['polzovatel']['profile']?>" class="profile" alt="">
        </div>
            <h2 class="name_polz"><?=$_SESSION['polzovatel']['name']?> <?=$_SESSION['polzovatel']['surname']?></h2>
    </div>
    <div class="block_insert_book">
        <div class="insert_book">
            <a href="#" id="plus" onclick="on_insertBook()">
            <p>+</p>
            <p>Добавить книгу</p>
            </a>
        </div>
    </div>
</section>
<section id="probnAjax">
    <div class="probn_ajax">
        <a href="#" class="close_insert_book" onclick="close_insertBook()"
           style="font-size: 40px; font-weight: bold; margin-bottom: 0">&#215;</a>
        <h2> Добавьте произведение</h2>
            <form id="formdata" method="POST" enctype="multipart/form-data">
                <div class="insert">
             <div class="insert_avtor">
                <input type="text" name="name_avtor" class="name_avtor" placeholder="Имя автора" required>
                <input type="text" name="strana" class="strana" placeholder="Страна" required>
             </div>
                <div class="block_comm_works">
                    <label>Напишите краткое описание произведения</label>
                    <textarea name="comm_works" id="comm_works" class="comm_works" cols="30" rows="15" required></textarea>
                </div>
                <div class="insert_work">
                    <input type="text" name="name_works" class="name_works" placeholder="Название произведения" required>
                    <input type="number" name="year" class="year" placeholder="Год выпуска" required>
                    <input type="text" name="janr" class="janr" placeholder="Жанр произведения" required>
                </div>
            </div>
                <div class="img">
                <div>
                <label>Добавьте изображение автора</label>
                <input type="file" name="img_avtors" id="img_avtors" class="img_avtors" placeholder="Добавьте изображение" required>
                </div>
                <div>
                <label>Добавьте обложку произведения</label>
                <input type="file" id="img_works" name="img_works" class="img_works" required>
                </div>
                </div>
        <button type="submit" class="otpravka">Сохранить</button>
        </form>

    <script type="text/javascript" src="js/ajax.js" ></script>
</section>

<!--Поиск по странице-->

<section class="search">
    <div>
        <img src="images/logo2..svg" alt="logotype">
        <form action="">
            <input type="search" name="text" class="nav-search" required placeholder="Поиск по сайту">
            <input type="submit" value="Поиск" class="button_search">
        </form>
    </div>
    <img src="images/DLS2R3VWsAEcpl5.jpg"  style="width: 320px; height: 320px" alt="">
</section>


<!--Каталог авторов слайдер-->
<section class="avtor">
    <h2>Каталог авторов</h2>
    <!--slider avtorov -->
    <div class="slider-avtorov">
        <div id="prev-img-container"><img id="prev-img" alt=""></div>
        <div class="itk-slider">
            <button id="onPrevbtn"> << </button>
            <img id="image" alt="">
            <button id="onNextbtn"> >> </button>
        </div>
        <div id="next-img-container"><img id="next-img" alt=""></div>
    </div>
    <!-- имя автора на слайдере выше -->
    <h3 id="name_avtor"></h3>
    <!-- его описание -->
    <div class="harakterist-css">
        <p id="harakteristika"></p>
    </div>

</section>
<section class="opisanie_avtor">

</section>
<section class="proizved">
    <h2>Каталог произведений</h2>
    <!--slider proizvedeni -->
</section>
<section class="opisanie_proizved">
    <!-- название произведения на слайдере выше -->
    <h3></h3>
    <!-- его описание -->
    <p></p>
</section>
<section class="komment">
    <h2>Делитесь комментариями о прочитанном</h2>
        <div class="comm">
            <form class="kommentarii" action="" method="post">
                <div>
                    <label for="">Ваше имя:</label>
                    <input type="text" name="name" placeholder="Введите имя">
                    <input type="hidden" name="page_id" value="150" />
                </div>
                <div>
                    <label for="">Ваш комментарий:</label>
                    <textarea name="text_comment" id="" cols="30" rows="10"></textarea>
                </div>
            </form>
            <button>Отправить</button>
        </div>
</section>
<footer>
    <p>&#169 Bookford, 2021 || Мир книг</p>
</footer>
<script src="js/slaider.js"></script>
<script src="js/insert_book.js"></script>
</body>
</html>