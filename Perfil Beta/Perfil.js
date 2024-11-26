document.addEventListener('DOMContentLoaded', () => {
    const editarPerfilBtn = document.getElementById('editarPerfil');
    const verMisionBtn = document.getElementById('verMision');
    
    // Acciones para editar perfil
    editarPerfilBtn.addEventListener('click', () => {
        alert('Redirigiendo a la página de edición de perfil...');
        window.location.href = 'editarPerfil.html'; // Redirige a la página de edición de perfil
    });

    // Acciones para ver misiones disponibles
    verMisionBtn.addEventListener('click', () => {
        alert('Redirigiendo a la página de misiones disponibles...');
        window.location.href = 'EventosSoli.html'; // Redirige a la página de eventos
    });
});
