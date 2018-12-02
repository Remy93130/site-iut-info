function initMap() {
    var map = L.map('map').setView([48.852969, 2.349903], 9);
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: '© <a href="http://openstreetmap.fr">OpenStreetMap</a> contributors',
        minZoom: 1,
        maxZoom: 20
    }).addTo(map);
    getLocations(map);
}

function getLocations(map) {
    $.get(
        "index.php/api/getMap", {},
        (locations) => {
            putMarker(map, locations);
        });
}

function putMarker(map, iuts) {
    for (var i = 0 in iuts) {
        var lon = iuts[i]['lon'];
        var lat = iuts[i]['lat'];
        var content = iuts[i]['content'];
        var mark = L.marker([lon, lat]).addTo(map);
        mark.bindPopup(content);
    }
}

window.onload = function(){
    initMap();
};

