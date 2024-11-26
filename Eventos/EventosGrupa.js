document.addEventListener('DOMContentLoaded', () => {
    const botonesAceptar = document.querySelectorAll('.aceptar-btn');

    botonesAceptar.forEach(boton => {
        boton.addEventListener('click', () => {
            const mision = boton.getAttribute('data-mision');
            const cuposElemento = boton.parentElement.querySelector('.cupos');
            let cupos = parseInt(cuposElemento.textContent); // Obtener el número de cupos

            if (cupos > 0) {
                cupos--; // Disminuir el número de cupos
                cuposElemento.textContent = cupos; // Actualizar el texto de cupos

                // Mostrar la alerta
                alert(`${mision}\nAceptado\nCupos restantes: ${cupos}\nPuntos: 1000`);
            } else {
                alert(`Lo sentimos, no hay cupos disponibles para "${mision}".`);
            }
        });
    });
});
