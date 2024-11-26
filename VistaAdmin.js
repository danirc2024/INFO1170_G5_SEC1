// Función para agregar un usuario
function addUser() {
    const username = document.getElementById("newUsername").value;
    const email = document.getElementById("newEmail").value;

    // Obtener todos los IDs de la tabla
    const rows = document.querySelectorAll("#userTable tr");
    let lastId = 0;

    // Encontrar el último ID usado
    rows.forEach(row => {
        const id = parseInt(row.cells[0].textContent);
        if (id > lastId) {
            lastId = id;
        }
    });

    // El siguiente ID será el último ID + 1
    const newId = lastId + 1;

    // Crear una nueva fila para el usuario
    const table = document.getElementById("userTable");
    const row = table.insertRow();
    row.id = `user-${newId}`;
    
    row.insertCell(0).textContent = newId;
    row.insertCell(1).textContent = username;
    row.insertCell(2).textContent = email;
    row.insertCell(3).innerHTML = `
        <button class="edit-btn" onclick="editUser(${newId})">Editar</button>
        <button class="delete-btn" onclick="deleteUser(${newId})">Eliminar</button>
    `;

    // Limpiar formulario
    document.getElementById("addUserForm").reset();
}

// Función para eliminar un usuario
function deleteUser(id) {
    const row = document.getElementById(`user-${id}`);
    row.remove();
}

// Función para editar un usuario
function editUser(id) {
    const row = document.getElementById(`user-${id}`);
    const username = row.cells[1].textContent;
    const email = row.cells[2].textContent;

    document.getElementById("userId").value = id;
    document.getElementById("usernameEdit").value = username;
    document.getElementById("emailEdit").value = email;

    document.getElementById("editModal").style.display = "flex";
}

// Función para guardar los cambios del usuario
function saveUser() {
    const id = document.getElementById("userId").value;
    const username = document.getElementById("usernameEdit").value;
    const email = document.getElementById("emailEdit").value;

    const row = document.getElementById(`user-${id}`);
    row.cells[1].textContent = username;
    row.cells[2].textContent = email;

    closeModal();
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById("editModal").style.display = "none";
}


