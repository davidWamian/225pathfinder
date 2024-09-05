<!-- Conteneur pour la carte -->
<div id="map" style="height: 400px;"></div>

<!-- Charger l'API Google Maps avec votre clé API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY"></script>
<script>
    // Initialiser la carte avec les coordonnées de l'entreprise
    function initMap() {
        var location = {
            lat: {{ $company->latitude }}, // Latitude de l'entreprise
            lng: {{ $company->longitude }} // Longitude de l'entreprise
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15, // Définir le niveau de zoom de la carte
            center: location // Centrer la carte sur l'emplacement de l'entreprise
        });
        var marker = new google.maps.Marker({
            position: location, // Positionner le marqueur sur l'emplacement de l'entreprise
            map: map // Afficher le marqueur sur la carte
        });
    }
    // Charger la carte lorsque la fenêtre se charge
    google.maps.event.addDomListener(window, 'load', initMap);
</script>

