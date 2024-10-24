const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;

darkModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        darkModeToggle.textContent = 'Modo Claro';
    } else {
        darkModeToggle.textContent = 'Modo Oscuro';
    }
});


function incrementLike(button) {
    // Busca el span que muestra el contador de likes al lado del botón clicado
    const likeCount = button.nextElementSibling;
    // Convierte el texto del contador en un número y lo incrementa
    likeCount.textContent = parseInt(likeCount.textContent) + 1;
}

// Función para mostrar/ocultar el formulario de comentarios
function toggleCommentForm(id) {
    var form = document.getElementById(id);
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}

// Funcion para agregar un comentario a la lista
function addComment(commentListId, commentTextId) {
    // Obtener el texto del comentario
    var commentText = document.getElementById(commentTextId).value;

    // Si el comentario no esta vacio
    if (commentText.trim() !== "") {
        // Crear un nuevo elemento <li> para el comentario
        var newComment = document.createElement("li");
        newComment.textContent = commentText;

        // Agregar el nuevo comentario a la lista
        var commentList = document.getElementById(commentListId);
        commentList.appendChild(newComment);

        // Limpiar el campo de texto del comentario
        document.getElementById(commentTextId).value = "";
    } else {
        alert("Por favor, escribe un comentario antes de enviarlo.");
    }
}
