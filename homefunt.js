function validarFormulario() {
    const nombre = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const mensaje = document.getElementById('message').value;

    if (nombre.length < 3) {
        alert('El nombre debe tener al menos 3 caracteres.');
        return false;
    }
    if (!email.includes('@')) {
        alert('Por favor, ingresa un correo válido.');
        return false;
    }
    if (mensaje.trim() === '') {
        alert('El mensaje no puede estar vacío.');
        return false;
    }
    return true;
}


const slider = document.querySelector('.testimonios-slider');
const formulario = document.getElementById('formulario-testimonio');

// Función para cargar testimonios desde el servidor
function cargarTestimonios() {
    fetch('subir_testimonio.php', {
        method: 'GET'
    })
    .then(response => response.json())
    .then(testimonios => {
        slider.innerHTML = ''; // Limpiar testimonios actuales
        testimonios.forEach(testimonio => {
            const nuevoTestimonio = document.createElement('div');
            nuevoTestimonio.classList.add('testimonio');
            nuevoTestimonio.innerHTML = `
                <div class="avatar">${testimonio.Autor.charAt(0).toUpperCase()}</div>
                <div class="detalles">
                    <div class="estrellas">
                        ${'<i class="fa fa-star"></i>'.repeat(testimonio.Calificacion)}
                    </div>
                    <p><strong>${testimonio.Autor}</strong></p>
                    <p>${new Date(testimonio.FechaPublicacion).toLocaleDateString()}</p>
                    <p>"${testimonio.Contenido}"</p>
                </div>
            `;
            slider.appendChild(nuevoTestimonio);
        });
    });
}

// Enviar un nuevo testimonio al servidor
formulario.addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(formulario);

    fetch('subir_testimonio.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            cargarTestimonios(); // Recargar testimonios dinámicamente
            formulario.reset(); // Limpiar el formulario
        } else {
            console.error(result.error);
        }
    });
});

// Cargar testimonios al iniciar la página
cargarTestimonios();
