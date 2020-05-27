
function plusSlides( step ) {
	index += step;
	index = index % photos.length;
	slide();
}

function slide() {

	document.getElementById( "slideshowImg" ).src = photos[index];
	pageNumber();

}

function pageNumber() {
	document.getElementById( "pageNum" ).innerHTML = ( index + 1 ) + '/' + photos.length;
}

function propertyIndex() {
	if ( index2 < 10 )
		localStorage.setItem( "index", index2 );
	else if ( index2 === 10 ) {
		localStorage.setItem( "index", 18 );
	}
}

function initMap() {
	var location = { lat: lat, lng: lng };
	var map = new google.maps.Map( document.getElementById( "map" ), {
		zoom: 10,
		center: location
	} );
	var marker = new google.maps.Marker( {
		position: location,
		map: map
	} );


}

document.addEventListener( "onload", slide() );
document.addEventListener( "onload", initMap() );