var mymap;


    mymap = new L.map('mapid').setView([ 43.30932,-1.97711], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/marborav/cjb7ndf2q3olg2qk50cpyzvy0/tiles/256/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox.Ukiyo-e',
        accessToken: 'pk.eyJ1IjoibWFyYm9yYXYiLCJhIjoiY2o5eDJrbTV0N2NncjJxcXljeDR3cXNhMiJ9.igTamTLm4nLiAN6w8NFS6Q'
    }).addTo(mymap);


    var coffeeIcon = L.icon({
		iconUrl: 'coffee-cup.png',
		iconSize: [32, 37],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
    });


    var fastfoodIcon = L.icon({
		iconUrl: 'fries.png',
		iconSize: [32, 37],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
    });


    var dinnerIcon = L.icon({
		iconUrl: 'dinner.png',
		iconSize: [32, 37],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
    });

    var pubIcon = L.icon({
    iconUrl: 'beer.png',
    iconSize: [32, 37],
    iconAnchor: [16, 37],
    popupAnchor: [0, -28]
    });


    var nodeArray = [
      {
        "type": "node",
        "id": 827737141,
        "lat": 43.3162704,
        "lon": -1.9737407,
        "tags": {
          "addr:city": "Donostia-san Sebastian",
          "addr:country": "ES",
          "addr:housenumber": "10",
          "addr:postcode": "20012",
          "addr:street": "Egia",
          "amenity": "bar",
          "b5m:id": "D_37554",
          "b5m:url": "http://b5m.gipuzkoa.net/b5map/r1/eu/mapa/lekutu/D_37554",
          "b5m:urlOrto": "http://b5m.gipuzkoa.net/url5000/index.php?id=D_37554&lengua=1&actu=0&categoria=VITO_FOTO",
          "name": "La Farandula",
          "source": "b5m"
        }
      },
      {
        "type": "node",
        "id": 632765288,
        "lat": 43.3171791,
        "lon": -1.9725742,
        "tags": {
          "amenity": "restaurant",
          "cuisine": "vegetarian",
          "diet:vegetarian": "only",
          "name": "Garraxi",
          "opening_hours": "Mo-Fr 13:00-15:30, Mo-We 20:00-22:30, Th,Fr 20:30-23:00, Sa,Su 13:30-15:30,20:30-23:00"
        }
      },
      {
        "type": "node",
        "id": 3359962808,
        "lat": 43.3221833,
        "lon": -1.9732955,
        "tags": {
          "amenity": "fast_food",
          "cuisine": "kebab",
          "name": "Doner Kebab"
        }
    },
];

function onEachFeature(feature, layer)
{
  var popupContent = "<p>I started out as a GeoJSON " +
      feature.geometry.type + ", but now I'm a Leaflet vector!</p>";

  if (feature.properties && feature.properties.popupContent) {
    popupContent += feature.properties.popupContent;
  }

  layer.bindPopup(popupContent);
}

    var featureArray = [];

    nodeArray.forEach(function (element)
    {
        var feature = new Object();
        var featureProperties = new Object();
        var featureGeometry = new Object();

        // featureProperties.name = "amenity";
        featureProperties.popupContent =  "Establecimiento";

        featureGeometry.type = "Point";
        var nodeCoord = [element.lon,element.lat];
        featureGeometry.coordinates = nodeCoord;

        feature.type = "Feature";
        feature.properties = featureProperties;
        feature.geometry = featureGeometry;
        feature.amenity = element.tags.amenity;
        featureArray.push(feature);

    });

    var featureCollection = new Object();
    featureCollection.type = "FeatureCollection";
    featureCollection.features = featureArray;

    console.log(featureCollection);

      var nodes = L.geoJSON(featureCollection, {

      pointToLayer: function (feature, latlng) {
        if(feature.amenity == 'bar')
        {
          return L.marker(latlng, {icon: pubIcon});
        }
        if(feature.amenity = 'restaurant')
        {
          return L.marker(latlng, {icon: dinnerIcon});

        }
      },

      onEachFeature: onEachFeature

    }).addTo(mymap);


    console.log(nodes);



////////////////////
// 	var baseballIcon = L.icon({
// 		iconUrl: 'baseball-marker.png',
// 		iconSize: [32, 37],
// 		iconAnchor: [16, 37],
// 		popupAnchor: [0, -28]
// 	});
//
//     var coorsField = {
//     "type": "Feature",
//     "properties": {
//         "popupContent": "Coors Field"
//     },
//     "geometry": {
//         "type": "Point",
//         "coordinates": [-1.9724221, 43.3236498]
//     }
// };
//
// console.log(coorsField);
//
// 	  var coorsLayer = L.geoJSON(coorsField, {
//
// 		pointToLayer: function (feature, latlng) {
// 			return L.marker(latlng, {icon: baseballIcon});
// 		},
//
// 		onEachFeature: onEachFeature
// 	}).addTo(mymap);
