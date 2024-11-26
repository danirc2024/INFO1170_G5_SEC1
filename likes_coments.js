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

// Incrementar el contador de likes y actualizar data-likes
function incrementLike(button) {
    const likeCount = button.nextElementSibling;
    const heartIcon = likeCount.nextElementSibling;
    const newsContainer = button.closest('.col-md-4 mb-4');

    if (heartIcon.style.display === "none") {
        // Activa el like
        heartIcon.style.display = "inline";
        likeCount.textContent = parseInt(likeCount.textContent) + 1;
    } else {
        // Quita el like
        heartIcon.style.display = "none";
        likeCount.textContent = parseInt(likeCount.textContent) - 1;
    }

    // Actualizar data-likes con el nuevo conteo de likes
    newsContainer.dataset.likes = likeCount.textContent;
}

// Función para mostrar/ocultar el formulario de comentarios
function toggleCommentForm(id) {
    var form = document.getElementById(id);
    form.style.display = (form.style.display === "none") ? "block" : "none";
}

// Función para agregar un comentario a la lista
function addComment(commentListId, commentTextId) {
    var commentText = document.getElementById(commentTextId).value;

    if (commentText.trim() !== "") {
        var newComment = document.createElement("li");
        newComment.textContent = commentText;

        var commentList = document.getElementById(commentListId);
        commentList.appendChild(newComment);

        document.getElementById(commentTextId).value = "";
    } else {
        alert("Por favor, escribe un comentario antes de enviarlo.");
    }
}

