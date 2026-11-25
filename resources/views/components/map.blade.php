{{-- AIzaSyB8C_OstQWzGHH-K5Uf_FSzwfZ5FsgK2CI --}}
<style>
    #map {
        width: 550px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Мобільні пристрої */
    @media (max-width: 480px) {
        #map {
            width: 300px;
            height: 350px;
        }

        .map-container {
            padding: 0 10px;
        }
    }

    /* Планшети */
    @media (min-width: 481px) and (max-width: 768px) {
        #map {
            width: 450px;
            height: 450px;
        }
    }

    /* Десктоп */
    @media (min-width: 769px) {
        #map {
            height: 500px;
            width: 500px;
        }
    }

    /* Великі екрани */
    @media (min-width: 1200px) {
        #map {
            height: 600px;
            width: 600px;
        }
    }
</style>

<div class="bg-skoda-emerald-green p-2 rounded-xl">
    <div id="map"></div>
</div>

<script>
    let map;
    let marker;

    // Ініціалізація карти
    function initMap() {
        // Дефолтна позиція - Кременчук
        const defaultPosition = {
            lat: 49.1047000,
            lng: 33.4115000
        };

        map = new google.maps.Map(document.getElementById("map"), {
            zoom: getResponsiveZoom(),
            center: defaultPosition,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                featureType: "poi",
                elementType: "labels",
                stylers: [{
                    visibility: "off"
                }]
            }]
        });

        // Створення маркера
        marker = new google.maps.Marker({
            position: defaultPosition,
            map: map,
            title: "Кременчук",
            draggable: false
        });

        // Адаптивний зум при зміні розміру вікна
        window.addEventListener('resize', function() {
            setTimeout(function() {
                map.setZoom(getResponsiveZoom());
                google.maps.event.trigger(map, 'resize');
            }, 100);
        });
    }

    // Функція для визначення зуму в залежності від розміру екрану
    function getResponsiveZoom() {
        const width = window.innerWidth;
        if (width < 480) {
            return 16; // Мобільні - менший зум
        } else if (width < 768) {
            return 16; // Планшети
        } else {
            return 16; // Десктоп - більший зум
        }
    }

    // Функція для отримання координат з PHP/Laravel
    @if (isset($latitude) && isset($longitude))
        window.addEventListener('load', function() {
            const phpPosition = {
                lat: {{ $latitude }},
                lng: {{ $longitude }}
            };
            map.setCenter(phpPosition);
            marker.setPosition(phpPosition);
        });
    @endif
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8C_OstQWzGHH-K5Uf_FSzwfZ5FsgK2CI&callback=initMap&language=ua">
</script>
