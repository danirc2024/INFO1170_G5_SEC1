document.getElementById('recoverForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const messageElement = document.getElementById('message');

    if (!validateEmail(email)) {
        messageElement.textContent = 'Por favor, ingresa un correo válido.';
        messageElement.style.color = 'red';
        return;
    }

    fetch('/api/recover-password', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email: email }),
    })
    .then(response => {
        if (response.ok) {
            messageElement.textContent = 'Enlace de recuperación enviado a tu correo.';
            messageElement.style.color = 'green';
        } else {
            messageElement.textContent = 'Error al enviar el enlace de recuperación.';
            messageElement.style.color = 'red';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        messageElement.textContent = 'Error en la conexión con el servidor.';
        messageElement.style.color = 'red';
    });
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
