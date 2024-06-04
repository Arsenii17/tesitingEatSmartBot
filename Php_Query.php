



<?php
    $user_id = $_POST['argument'];
    // ваш код для обработки аргумента
    // Здесь ваш код для получения данных
    $connect_data = "host=rc1b-2tdd3qyqwzpike23.mdb.yandexcloud.net port=6432 dbname=eat_smart user=veron password=codemates";
    $db_connect = pg_connect($connect_data);
    if (!$db_connect) {
        die("Ошибка подключения: " . pg_result_error());
    }
    echo 'ЭТО ЮЗЕР АЙДИ ПЕРЕДАННЫЙ В ЗАПРОСЕ:' . $user_id . "КОНЕц";
    $query = pg_query($db_connect, "SELECT * FROM user_history");

    if (!$query) {
            die ("Ошибка выполнения запроса");
    }


    while ($result = pg_fetch_array($query)) {
        echo "<p> User_id: {$result['user_id']}. Съедено или нет: {$result['is_eat']}  Название: {$result['food_name']} Время: {$result['time']} </p> ";
    }

    $data = [
        "food_name" => $result['food_name'],
        "is_eat" =>  $result['is_eat'],
    ];

    pg_free_result($query);
    pg_close();

    return json_encode($data);


    $result = 'результат обработки аргумента';
    echo $result;
?>
