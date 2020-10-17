

function renderGoods() {

    //создаем новый экземпляр класса для запросов
    let xhr = new XMLHttpRequest;
    let url = 'http://localhost/eshop/system/controllers/goods/catalog/index.php';
    
    let str_get = window.location.search;

    url = url + str_get;

    //запустили метод open() для установки параметров запроса
    xhr.open('GET', url , true);
    //установили заголовки запроса
    xhr.setRequestHeader('Content-type','application/x-form-urlencode');

    //как только запрос вернется
    xhr.onreadystatechange = function() {

        //и они будут хорошие
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            //делаем то что нам надо с ответом
            document.getElementById('catalog').innerHTML = xhr.responseText;
        }
    }

    xhr.send(null);

}


document.getElementById('catalog').innerHTML = '<img src="img/preloader.gif" class="preloader"/>';
setTimeout(function() {
    renderGoods();
}, 1000);


//выпадающее меню для фильтров категории, размер, стоимость

function clik(event) {
    // alert ('Клик!');
    event.target.closest('.filter').querySelector('.filter-items').classList.toggle('filter-items-2'); 
};


function toBasket() {
    function getResult(urlp,obj) {
        //создаем новый экземпляр класса для запросов
        let xhr = new XMLHttpRequest;
        let url = urlp;
    
        let str_get = window.location.search;
        url = url + str_get;

        //запустили метод open() для установки параметров запроса
        xhr.open('GET', url , true);
        //как только запрос вернется
        xhr.onreadystatechange = function() {
            //и они будут хорошие
            if( xhr.readyState == 4 && xhr.status == 200 ) {
                //делаем то что нам надо с ответом
                // alert(xhr.responseText);
                document.getElementById(obj).innerHTML = xhr.responseText;
                // document.getElementById('basket-sum').innerHTML = xhr.responseText;
            }
        }
        xhr.send(null);
    }
    getResult('http://localhost/eshop/system/controllers/basket/to_basket.php', 'basket-count');
    getResult('http://localhost/eshop/system/controllers/basket/to_basket_sum.php', 'basket-sum');
}


function fromBasket() {
    // получаем id конкретного товара из аттрибута
    let id = event.target.getAttribute('data-id');
    // удаляем ближайший к крестику объект  item (визуально)
    event.target.closest('.basket-item').remove();
    
    function getResult(urlp,obj) {  
        //создаем новый экземпляр класса для запросов
        let xhr = new XMLHttpRequest;
        let url = urlp;
        let str_get = '?id=' + id;
        url = url + str_get;
        //запустили метод open() для установки параметров запроса
        xhr.open('GET', url , true);
        //как только запрос вернется
        xhr.onreadystatechange = function() {
            //и они будут хорошие
            if( xhr.readyState == 4 && xhr.status == 200 ) {
                //делаем то что нам надо с ответом
                // alert(xhr.responseText);
                document.getElementById(obj).innerHTML = xhr.responseText;
            }
        }
        xhr.send(null);
    }
    getResult('http://localhost/eshop/system/controllers/basket/from_basket.php','basket-count');
    getResult('http://localhost/eshop/system/controllers/basket/to_basket_sum.php', 'basket-sum');
}


$(function () {
    $('[data-toggle="popover"]').popover()
});