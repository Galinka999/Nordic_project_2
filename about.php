<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');
?>

<head>
    <title>Быстрый старт. Размещение интерактивной карты на странице</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://api-maps.yandex.ru/2.1/?apikey=d89fba03-194b-4556-8df2-95d1fed921fa&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        function init(){
            var myMap = new ymaps.Map("map", {
                center: [55.77, 37.65],
                zoom: 5
            });

            let points = JSON.parse(getShops());

            for (let i = 0; i < points.length ; i++) {
                console.log(points[i].title);
                //создание метки
                let myPlacemark = new ymaps.Placemark(
                    [points[i].latitude, points[i].longitude],
                    {
                    hintContent: points[i].title,
                    balloonContent: '<b>'+points[i].description+'</b><div>'+points[i].address+'</div><div><img src="'+points[i].photo+'"/></div>'
                    }
                );
                //добавление метки на карту
                myMap.geoObjects.add(myPlacemark);

            }

            
        }

        getShops();

        function getShops() {
            //создаем новый экземпляр класса для запросов
            let xhr = new XMLHttpRequest;
            let url = 'http://localhost/eshop/api/1.0/shops/get/all/index.php';
            //запустили метод open() для установки параметров запроса
            xhr.open('GET', url , false);
            xhr.send();

            // console.log(xhr.responseText);
            return xhr.responseText;
        }

    </script>
</head>

<body>
    <div class="wrapper">
        <div id="map" style="width: 1200px; height: 500px; margin: 80px 0;"></div>
        Данные, которые были введены во второй версии файла
    </div>
</body>

</html>

<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
?>