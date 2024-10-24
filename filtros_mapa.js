document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([-38.7359, -72.5904], 13);

    // Limitar el área de movimiento del mapa a Temuco
    var bounds = L.latLngBounds(
        L.latLng(-38.77, -72.67), // Suroeste
        L.latLng(-38.70, -72.51)  // Noreste
    );
    map.setMaxBounds(bounds);

    // Evitar que el usuario se desplace fuera de los límites
    map.on('drag', function() {
        map.panInsideBounds(bounds, { animate: false });
    });

    // Establecer los niveles de zoom mínimo y máximo
    map.setMinZoom(12);
    map.setMaxZoom(18);

    // Añadir mapa base desde OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Definir el icono personalizado para los puntos móviles
    var recycleIcon = L.icon({
        iconUrl: '/imagenes/IconoVerde.webp',  // Icono de reciclaje limpio
        iconSize: [30, 30],  // Tamaño del icono
        iconAnchor: [15, 30],  // Anclar el icono al centro
        popupAnchor: [0, -30]  // Anclar el popup arriba del icono
    });

    // Lista de puntos móviles con sus datos
    var puntosReciclaje = [
        {
            name: "Punto Móvil de reciclaje Pedro de Valdivia",
            coords: [-38.7282068124852, -72.61523605518013],
            direccion: "Av. Gabriela Mistral con Calle Recreo, Temuco.",
            horario: "Primera y Segunda semana de cada mes",
            materiales: "Botellas PET, cartón, papel, latas de aluminio, revistas, diarios, y pilas."
        },
        {
            name: "Punto Móvil de reciclaje Costanera del Cautín",
            coords: [-38.72638033747407, -72.55784957055222],
            direccion: "Río Rhin con Av. Costanera, Temuco.",
            horario: "Primera y Segunda semana de cada mes",
            materiales: "Botellas PET, cartón, papel, latas de aluminio, revistas, diarios, y pilas."
        },
        {
            name: "Punto Móvil de reciclaje Fundo El Carmen",
            coords: [-38.715113801368354, -72.64814096768472],
            direccion: "Los Químicos con Los Fundadores, Temuco.",
            horario: "Primera y Segunda semana de cada mes",
            materiales: "Botellas PET, cartón, papel, latas de aluminio, revistas, diarios, y pilas."
        },
        {
            name: "Punto Móvil de reciclaje Amanecer",
            coords: [-38.75755280048922, -72.63717901190932],
            direccion: "Calle Géminis entre Venus y Neptuno, Temuco.",
            horario: "Primera y Segunda semana de cada mes",
            materiales: "Cartón, papel, revistas, diarios."
        },
        {
            name: "Punto Móvil de reciclaje Labranza",
            coords: [-38.76701236507645, -72.75945304579575],
            direccion: "Calle 1 Norte a un costado del Colegio NewHarvest, Temuco.",
            horario: "Primera y Segunda semana de cada mes",
            materiales: "Cartón, papel, revistas, diarios."
        },
        {
            name: "Punto Móvil de reciclaje Centro",
            coords: [-38.72633155659468, -72.59874640374868],
            direccion: "Monte Ararat con Prieto Norte, Temuco.",
            horario: "Primera y Segunda semana de cada mes",
            materiales: "Cartón, papel, revistas, diarios."
        },
        {
            name: "Punto Móvil de reciclaje Pueblo Nuevo",
            coords: [-38.72650528285448, -72.57335760603661],
            direccion: "Bascuñán Santa María con Valdivia y David Perry, Temuco.",
            horario: "Primera y Segunda semana de cada mes",
            materiales: "Botellas PET, latas de aluminio, y pilas."
        },
        {
            name: "Punto Móvil de reciclaje Pedro de Valdivia",
            coords: [-38.68952148931034, -72.6548629285696],
            direccion: "Ayelen con Circunvalación Francisco Huenchumilla, Temuco.",
            horario: "Tercera y Cuarta semana de cada mes",
            materiales: "Botellas PET, latas de aluminio, y pilas."
        },
        {
            name: "Punto Móvil de reciclaje Costanera de Cautín",
            coords: [-38.73147056738875, -72.55978313359098],
            direccion: "Av. Costanera con Av. Pircunche, Temuco.",
            horario: "Tercera y Cuarta semana de cada mes",
            materiales: "Botellas PET, latas de aluminio, y pilas."
        },
        {
            name: "Punto Móvil de reciclaje Fundo El Carmen",
            coords: [-38.71022091404364, -72.65980665767205],
            direccion: "Calle Jorge Teillier con Los Escritores, Temuco.",
            horario: "Tercera y Cuarta semana de cada mes",
            materiales: "Botellas PET, cartón, papel."
        },
        {
            name: "Punto Móvil de reciclaje Sector Poniente",
            coords: [-38.74169524946602, -72.62089435926406],
            direccion: "Interior Parque Estadio Germán Becker, Temuco.",
            horario: "Tercera y Cuarta semana de cada mes",
            materiales: "Botellas PET, cartón, papel."
        },
        {
            name: "Punto Móvil de reciclaje Amanecer",
            coords: [-38.755846561300864, -72.62222009631267],
            direccion: "Venecia con Garibaldi, Temuco.",
            horario: "Tercera y Cuarta semana de cada mes",
            materiales: "Botellas PET, cartón, papel."
        },
        {
            name: "Punto Móvil de reciclaje Centro",
            coords: [-38.73886374950443, -72.61157229622266],
            direccion: "Estacionamiento Unimarc San Martín, Temuco.",
            horario: "Tercera y Cuarta semana de cada mes",
            materiales: "Latas de aluminio, y pilas."
        },
        {
            name: "Punto Móvil de reciclaje Pueblo Nuevo",
            coords: [-38.71247454664176, -72.56250294505583],
            direccion: "Rudecindo Ortega 01780, Al interior del Outlet Easton, Temuco.",
            horario: "Tercera y Cuarta semana de cada mes",
            materiales: "Latas de aluminio, y pilas."
        }
    ];

    // Función para agregar los marcadores al mapa
    function agregarMarcadores(puntos) {
        puntos.forEach(function(punto) {
            L.marker(punto.coords, { icon: recycleIcon }).addTo(map)
                .bindPopup("<b>" + punto.name + "</b><br>" + 
                           "<b>Dirección:</b> " + punto.direccion + "<br>" +
                           "<b>Horario:</b> " + punto.horario + "<br>" +
                           "<b>Materiales aceptados:</b> " + punto.materiales);
        });
    }

    var iconoUser = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/149/149071.png',  // Icono de ubicación
        iconSize: [35, 35],  // Tamaño del icono
        iconAnchor: [17, 35],  // Punto de anclaje (la punta del ícono)
        popupAnchor: [0, -35]  // Punto donde se mostrará el popup relativo al ícono
    });

    // Función para mostrar la ubicación actual del usuario
    function showUserLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLat = position.coords.latitude;
                var userLon = position.coords.longitude;

                console.log("Ubicación obtenida", userLat, userLon);

                // Añadir un marcador con el icono de ubicación del usuario
                var userMarker = L.marker([userLat, userLon], { icon: iconoUser }).addTo(map);
                userMarker.bindPopup("<strong>¡Estás aquí!</strong>").openPopup();

                // Centramos el mapa en la ubicación del usuario
                map.setView([userLat, userLon], 13);
            }, function(error) {
                console.error(error);
                alert("No se pudo obtener la ubicación actual.");
            });
        } else {
            alert("La geolocalización no está disponible en este navegador.");
        }
    }

    // Agregar todos los puntos de reciclaje inicialmente
    agregarMarcadores(puntosReciclaje);

    // Filtrar puntos según el material seleccionado
    document.getElementById('material-filter').addEventListener('change', function() {
        var materialSeleccionado = this.value.toLowerCase();

        // Eliminar todos los marcadores antes de agregar los nuevos
        map.eachLayer(function(layer) {
            if (layer instanceof L.Marker) {
                map.removeLayer(layer);
            }
        });

        // Filtrar los puntos de reciclaje
        var puntosFiltrados = puntosReciclaje.filter(function(punto) {
            return punto.materiales.toLowerCase().includes(materialSeleccionado);
        });

        // Agregar los puntos filtrados al mapa
        if (puntosFiltrados.length > 0) {
            agregarMarcadores(puntosFiltrados);
        } else {
            // Si no se selecciona ningún material, mostrar todos los puntos
            agregarMarcadores(puntosReciclaje);
        }
    });

    // Función para calcular la distancia entre dos coordenadas
    function getDistance(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radio de la Tierra en km
        var dLat = (lat2 - lat1) * Math.PI / 180;
        var dLon = (lon2 - lon1) * Math.PI / 180;
        var a = Math.sin(dLat / 2) * Math.sin(dLon / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var distance = R * c;
        return distance; // Distancia en km
    }

    // Función para obtener la ubicación actual del usuario y filtrar los puntos cercanos
    function filterByLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLat = position.coords.latitude;
                var userLon = position.coords.longitude;

                // Filtrar puntos de reciclaje a menos de 5 km del usuario
                var puntosCercanos = puntosReciclaje.filter(function(punto) {
                    var distance = getDistance(userLat, userLon, punto.coords[0], punto.coords[1]);
                    return distance <= 5; // Filtrar los que estén a 5 km o menos
                });

                // Limpiar el mapa de los marcadores anteriores
                map.eachLayer(function(layer) {
                    if (layer instanceof L.Marker) {
                        map.removeLayer(layer);
                    }
                });

                // Añadir los puntos cercanos al mapa
                puntosCercanos.forEach(function(punto) {
                    var marker = L.marker(punto.coords, { icon: recycleIcon }).addTo(map);
                    marker.bindPopup(`
                        <strong>${punto.name}</strong><br>
                        <b>Dirección:</b> ${punto.direccion}<br>
                        <b>Horarios:</b> ${punto.horario}<br>
                        <b>¿Qué se puede reciclar aquí?:</b> ${punto.materiales}
                    `);
                });

                if (puntosCercanos.length === 0) {
                    alert("No se encontraron puntos de reciclaje cercanos.");
                }
            }, function() {
                alert("No se pudo obtener la ubicación actual.");
            });
        } else {
            alert("La geolocalización no está disponible en este navegador.");
        }
    }
});
