document.getElementById("profileForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío tradicional del formulario

    const formData = new FormData(this);

    fetch("actualizar_perfil.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.text())
    .then((data) => {
        alert(data); // Mostrar mensaje del servidor
    })
    .catch((error) => {
        console.error("Error:", error);
    });
});
