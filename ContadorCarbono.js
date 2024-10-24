document.getElementById("recycling-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita el envío del formulario

    const material = document.getElementById("material").value;
    const amount = parseFloat(document.getElementById("amount").value);
    let reduction = 0;

    // Cálculo de la reducción de CO2
    switch (material) {
        case "Botellas":
            reduction = amount * 1.5; // kg de CO2 por kg de Botellas PET
            break;
        case "Carton":
            reduction = amount * 0.9; // kg de CO2 por kg de Cartón
            break;
        case "Papel":
            reduction = amount * 1.2; // kg de CO2 por kg de Papel
            break;
        case "Aluminio":
            reduction = amount * 1.1; // kg de CO2 por kg de Latas de aluminio
            break;
        case "Revistas":
            reduction = amount * 0.8; // kg de CO2 por kg de Revistas
            break;
        case "Diarios":
            reduction = amount * 0.7; // kg de CO2 por kg de Diarios
            break;
        case "Pilas":
            reduction = amount * 2.0; // kg de CO2 por kg de Pilas
            break;
    }

    // Mensaje 
    const message = `Al reciclar ${amount} kg de ${material}, has contribuido a reducir aproximadamente ${reduction.toFixed(2)} kg de CO2 en nuestra atmósfera. 
    Esto es importante porque cada vez que reciclamos, ayudamos a disminuir la cantidad de desechos que van a los vertederos y reducimos la contaminación. 
    Cada pequeño esfuerzo cuenta y tu acción hoy puede marcar una gran diferencia para el medio ambiente. ¡Gracias por cuidar nuestro planeta!`;

    // Mostrar el resultado
    document.getElementById("result").innerText = message;
});