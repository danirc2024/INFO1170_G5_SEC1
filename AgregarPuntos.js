// Inicialización del mapa
const map = L.map('map').setView([-38.735, -72.595], 13);  // Coordenadas de Temuco, Chile

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Cargar puntos de reciclaje desde localStorage
let recyclingPoints = JSON.parse(localStorage.getItem('recyclingPoints')) || [];
let selectedMarker = null;

// Función para agregar puntos al mapa
function addPointsToMap() {
    recyclingPoints.forEach(point => {
        const marker = L.marker([point.lat, point.lon])
            .addTo(map)
            .bindPopup(`<b>${point.name}</b><br>${point.material}<br>${point.description}`)
            .on('click', () => selectMarker(marker, point));
    });
}

// Llamada inicial para agregar los puntos al mapa
addPointsToMap();

// Función para manejar doble clic en el mapa
map.on('dblclick', function(e) {
    const lat = e.latlng.lat;
    const lon = e.latlng.lng;

    // Desbloquear el formulario
    document.getElementById('add-point-form').classList.remove('hidden');
    document.getElementById('delete-button').classList.add('hidden');

    // Guardar la ubicación para agregar el punto
    window.selectedLat = lat;
    window.selectedLon = lon;
});

// Manejo del formulario
document.getElementById('add-point-form').addEventListener('submit', function (e) {
    e.preventDefault();

    // Obtener los datos del formulario
    const name = document.getElementById('recycling-point-name').value;
    const material = document.getElementById('recycling-material').value;
    const description = document.getElementById('description').value;

    // Crear un nuevo punto de reciclaje
    const newPoint = {
        name,
        material,
        description,
        lat: window.selectedLat,
        lon: window.selectedLon
    };

    // Agregar el punto al array
    recyclingPoints.push(newPoint);

    // Guardar en localStorage
    localStorage.setItem('recyclingPoints', JSON.stringify(recyclingPoints));

    // Agregar el punto al mapa
    const marker = L.marker([window.selectedLat, window.selectedLon])
        .addTo(map)
        .bindPopup(`<b>${name}</b><br>${material}<br>${description}`)
        .on('click', () => selectMarker(marker, newPoint));

    // Limpiar el formulario y ocultar el botón de eliminar
    document.getElementById('add-point-form').reset();
    document.getElementById('add-point-form').classList.add('hidden');
    document.getElementById('delete-button').classList.add('hidden');
});

// Botón de cancelar
document.getElementById('cancel-button').addEventListener('click', function() {
    document.getElementById('add-point-form').classList.add('hidden');
    document.getElementById('delete-button').classList.add('hidden');
});

// Función para seleccionar el marcador y habilitar la opción de eliminar
function selectMarker(marker, point) {
    selectedMarker = marker;  // Asignamos el marcador seleccionado
    selectedPoint = point;    // Guardamos el punto para eliminarlo
    document.getElementById('delete-button').classList.remove('hidden');
}

// Función para eliminar el punto seleccionado
document.getElementById('delete-button').addEventListener('click', function() {
    if (selectedMarker) {
        // Eliminar el marcador del mapa
        map.removeLayer(selectedMarker);

        // Eliminar el punto de reciclaje del array
        recyclingPoints = recyclingPoints.filter(point => point !== selectedPoint);

        // Guardar los puntos actualizados en localStorage
        localStorage.setItem('recyclingPoints', JSON.stringify(recyclingPoints));

        // Ocultar el botón de eliminar
        document.getElementById('delete-button').classList.add('hidden');
    }
});


