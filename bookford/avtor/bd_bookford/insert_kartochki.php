<?php




/*
$avtor_works = $bookford->query("SELECT * FROM `avtor_works`");

for ($x = 0; $x < count($avtor_works); $x++) {
    $array_id_avtor[$x] = $avtor_works[$x]['id_avtor'];
    $array_id_works[$x] = $avtor_works[$x]['id_works'];
}

$avtor = $bookford->query("SELECT * FROM `avtor`");
$works = $bookford->query("SELECT * FROM `works`");

for ($x = 0; $x < count($avtor); $x++) {
    $array_avtor_id[$x] = $avtor[$x]['id_avtor'];
    $array_avtor_name[$x] = $avtor[$x]['name_avtor'];
    $array_avtor_img[$x] = $avtor[$x]['img_avtor'];
    $array_avtor_strana[$x] = $avtor[$x]['strana'];
}

for ($x = 0; $x < count($works); $x++) {
    $array_works_id[$x] = $works[$x]['id_works'];
    $array_works_name[$x] = $works[$x]['name_works'];
    $array_works_img[$x] = $works[$x]['img_work'];
    $array_works_janr[$x] = $works[$x]['janr'];
    $array_works_comment[$x] = $works[$x]['comment'];
    $array_works_year[$x] = $works[$x]['year'];
}


for ($x = 0; $x < count($avtor_works); $x++) {
    $array_id_avtor[$x] = $avtor_works[$x]['id_avtor'];
    $array_id_works[$x] = $avtor_works[$x]['id_works'];

}


print_r($array_id_avtor);
print_r($array_id_works);

print_r($array_avtor_name);
print_r($array_works_name);
*/
$qwerty = function($data_object, $path_work, $path_avtor, $id_works) {
    $data = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $data_object["name_works"] . '</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/myStr.css">
    <link rel="stylesheet" href="../style/kartochka.css">
</head>
<body>
<header>
    <div class="auto">
        
    </div>
    <!--Логотип -->
    <div class="logo">
        <a href="index.php"><img src="../images/logo2..svg" alt="" width="200px"></a>
    </div>
    <!--        Каталог-->
    <div class="nav">
        <div class="katalog">
            <a href="../KATALOG.php" class="punkt_menu">Каталог произведений</a>
        </div>
    </div>
</header>
<section class="face">
<div>
<img src="../' . $path_work .'" alt="">
</div>
<div>
<h1>' . $data_object["name_works"].'</h1>
<p>Автор произведения: ' . $data_object["name_avtor"].'</p>
<p>Место рождения автора: ' . $data_object["strana"].'</p>
<p>Год выпуска произведения: ' . $data_object["year"].'</p>
<p>Жанр произведения: ' . $data_object["janr"].'</p>


</div>
<div>
<img src="../' . $path_avtor .'" alt="">
</div>
</section>
<section class="text">
<p>'. $data_object["comm_works"] .'</p>
</section>
<footer>
    <p>&#169 Bookford, 2021 || Мир книг</p>
</footer>
</body>
</html>';
    $name_file = "../../kartochki/" . $id_works . ".php";
    file_put_contents($name_file, $data);
};









