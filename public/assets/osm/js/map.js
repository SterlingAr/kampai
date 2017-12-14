window.onload = initmap;
/*MAP section BEGIN*/
var bbox,mapBounds;
function initmap()
{
    mymap = L.map('mapid').setView([ 43.30932,-1.97711], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/marborav/cj9x42mma6cqq2sp7e7gadryt/tiles/256/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoibWFyYm9yYXYiLCJhIjoiY2o5eDJrbTV0N2NncjJxcXljeDR3cXNhMiJ9.igTamTLm4nLiAN6w8NFS6Q'
    }).addTo(mymap);

    mymap.on('moveend', function() {
        mapBounds = mymap.getBounds();
        currentBBOX();
    });
    currentBBOX();
}
/* To get the bounding box for the query, it should be in this order
   (s,w,n,e)
 */
function currentBBOX()
{
    var  s, w, n, e;
    mapBounds = mymap.getBounds();
    s = mapBounds['_southWest']['lat'];
    w = mapBounds['_southWest']['lng'];
    n = mapBounds['_northEast']['lat'];
    e = mapBounds['_northEast']['lng'];
    bbox = s + ',' + w + ',' + n + ',' + e;
    console.log('*DEBUGGER* : BBOX coordinates : '+bbox);
}