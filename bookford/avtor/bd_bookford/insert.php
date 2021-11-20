<?php

if(!empty($_POST))
{
    require '../bread.php';
    $bookford = new Database();
}

$name_avtor = $_POST['name_avtor'];
$name_works = $_POST['name_works'];
$janr = $_POST['janr'];
$strana = $_POST['strana'];
$comm_works = $_POST['comm_works'];
$year = $_POST['year'];

$data_object = [
    "name_avtor" =>$_POST['name_avtor'],
    "name_works" => $_POST['name_works'],
    "janr" => $_POST['janr'],
    "strana" => $_POST['strana'],
    "comm_works" => $_POST['comm_works'],
    "year" => $_POST['year']
];



$path_avtor = 'img_avtor/' . time() . $_FILES['img_avtors']['name'];


$path_work = 'img_works/' . time() . $_FILES['img_works']['name'];


##     Массив с именами:$array_names_avtors;

if(!empty($_POST)) {


    function zapusk($bookford, $data_object, $path_avtor, $path_work)
    {

        $count_1 = 0;
        $count_2 = 0;
        $count_3 = 0;

        //добавление старому автору новой книги
        //перебор массива имен авторов

        $name_avtor_array = $bookford->query("SELECT `name_avtor` FROM `avtor`");
        for ($x = 0; $x < count($name_avtor_array); $x++) {
            $array_names_avtors[$x] = $name_avtor_array[$x]['name_avtor'];
        }

        $name_work_array = $bookford->query("SELECT `name_works` FROM `works`");
        for ($x = 0; $x < count($name_work_array); $x++) {
            $array_names_works[$x] = $name_work_array[$x]['name_works'];
        }

        for ($z = 0; $z < count($array_names_avtors); $z++) {


            //если найдено совпадение
            if ($array_names_avtors[$z] == $data_object['name_avtor']) {

                //то перебираем массив книг
                for ($q = 0; $q < count($array_names_works); $q++) {

                    //!!!!!! 1 если найдено совпадение в массиве книг то выводим сообщение
                    if ($array_names_works[$q] == $data_object['name_works']) {

                        echo "Такой автор с таким произведением уже существует";
                        $count_1++;
                    }
                }
                //!!!!!! 2 если ни одного совпадения в массиве названий книг не было найдено то создаем новую книгу
                // но не создаем автора и добавляем новую работы в общую таблицу с id этого же авторы
                if ($count_1 == 0) {
                    if(!move_uploaded_file($_FILES['img_works']['tmp_name'], '../../' . $path_work))
                    {$_SESSION['message'] = 'Ошибка при загрузке изображения';}
                    $bookford->execute("INSERT INTO `works` (`id_works`, `name_works`, `janr`, `img_work`, `comment`, `year`) VALUES (NULL , '{$data_object['name_works']}', '{$data_object['janr']}', '$path_work', '{$data_object['comm_works']}', '{$data_object['year']}')");
                    $count_2++;
                }
            }
        }


        //добавление новому автору к старой книге
        //перебор массива имен книг
        for ($z = 0; $z < count($array_names_works); $z++) {


            //если найдено совпадение
            if ($array_names_works[$z] == $data_object['name_works']) {

                //то перебираем массив авторов
                for ($w = 0; $w > count($array_names_works); $w++) {

                    // !!!!!! 1 если найдено совпадение в массиве авторов то выводим сообщение
                    if ($array_names_works[$w] == $data_object['name_avtor']) {

                        echo "Такой автор с таким произведением уже существует";
                        $count_1++;
                    }
                }
                //!!!!!! 3 если ни одного совпадения в массиве названий авторов не было найдено то создаем нового автора
                // но не создаем книгу и добавляем нового автора с id этой книги
                if ($count_2 == 0) {
                    if(!move_uploaded_file($_FILES['img_avtors']['tmp_name'], '../../' . $path_avtor))
                    {
                        $_SESSION['message'] = 'Ошибка при загрузке изображения';
                    }
                    $bookford->execute("INSERT INTO `avtor` (`id_avtor`, `name_avtor`, `img_avtor`, `strana`) VALUES (NULL , '{$data_object['name_works']}', '{$data_object['janr']}', '$path_work}, '{$data_object['comm_works']}', '{$data_object['year']})");
                    $count_3++;
                }
            }
        }


        //!!!!!!! 4 если не существует такого автора и такого произведения то создаем все по новой
        if ($count_1 == 0 && $count_2 == 0 && $count_3 == 0) {
            if(!move_uploaded_file($_FILES['img_avtors']['tmp_name'], '../../' . $path_avtor))
            {
                $_SESSION['message'] = 'Ошибка при загрузке изображения';
            }
            if(!move_uploaded_file($_FILES['img_works']['tmp_name'], '../../' . $path_work))
            {$_SESSION['message'] = 'Ошибка при загрузке изображения';}
            $bookford->execute("INSERT INTO `avtor` (`name_avtor`, `img_avtor`, `strana`) VALUES ('{$data_object['name_avtor']}', '$path_avtor' , '{$data_object['strana']}')");
            $bookford->execute("INSERT INTO `works` (`name_works`, `janr`, `img_work`, `comment`, `year`) VALUES ('{$data_object['name_works']}', '{$data_object['janr']}', '$path_work', '{$data_object['comm_works']}', '{$data_object['year']}')");
        }


        $id_avtor_array = $bookford->query("SELECT `id_avtor` FROM `avtor` WHERE `name_avtor` LIKE '{$data_object['name_avtor']}'");
        $id_works_array = $bookford->query("SELECT `id_works` FROM `works` WHERE `name_works` LIKE '{$data_object['name_works']}'");
        $id_works = $id_works_array[0]['id_works'];
        $id_avtor = $id_avtor_array[0]['id_avtor'];
        // ВСТАВВЛЯЕМ ID'S В СВЯЗЫВАЮЩУЮ ТАБЛИЦУ
        $bookford->execute("INSERT INTO `avtor_works` (`id_avtor`, `id_works`) VALUES ( '$id_avtor', '$id_works')");

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
<script src="js/jquery-3.6.0.min.js"></script>
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
<h1 id="name_delete_works">' . $data_object["name_works"].'</h1>
<p>Автор произведения: ' . $data_object["name_avtor"].'</p>
<p>Место рождения автора: ' . $data_object["strana"].'</p>
<p>Год выпуска произведения: ' . $data_object["year"].'</p>
<p>Жанр произведения: ' . $data_object["janr"].'</p>
<a href="../avtor/bd_bookford/delete.php" class="delete_works">Удалить книгу</a>
<script src="../js/ajax1.js"></script>

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

    }
    zapusk($bookford, $data_object, $path_avtor, $path_work);
}



