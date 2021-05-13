function Map () {

    ymaps.ready(init);

        let coords =  map.coords

        coords = coords.split(',');

        function init() {
          // Создание карты.
          // https://tech.yandex.ru/maps/doc/jsapi/2.1/dg/concepts/map-docpage/
          var myMap = new ymaps.Map("map", {
              // Координаты центра карты.
              // Порядок по умолчнию: «широта, долгота».
              center: [ coords[0], coords[1] ],
              // Уровень масштабирования. Допустимые значения:
              // от 0 (весь мир) до 19.
              zoom: 17,
              // Элементы управления
              // https://tech.yandex.ru/maps/doc/jsapi/2.1/dg/concepts/controls/standard-docpage/
              controls: [

              ]
          });

          // Добавление метки
          // https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/Placemark-docpage/
          var myPlacemark = new ymaps.Placemark([coords[0], coords[1]], {
              // Хинт показывается при наведении мышкой на иконку метки.
              hintContent: '',
              // Балун откроется при клике по метке.
              balloonContent: ''
          });

          // После того как метка была создана, добавляем её на карту.
          myMap.geoObjects.add(myPlacemark);

        }
}



export default Map
