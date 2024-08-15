<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller 2 Laravel</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #1e1e1e; color: #f0f0f0; }
        .container { width: 80%; margin: 0 auto; padding: 20px; }
        h1 { color: #00ff99; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #333; }
        th { background-color: #333; }
        tr:nth-child(even) { background-color: #2a2a2a; }
        button { background-color: #00ff99; color: #000; border: none; padding: 10px 15px; cursor: pointer; }
        button:hover { background-color: #00cc99; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 8px; border: 1px solid #333; background-color: #2a2a2a; color: #f0f0f0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Categorías</h1>
        <form id="category-form">
            <div class="form-group">
                <label for="name">Nombre de la Categoría</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Añadir Categoría</button>
        </form>
        <table id="categories-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <h1>Observaciones</h1>
        <form id="observation-form">
            <div class="form-group">
                <label for="category_id">ID de la Categoría</label>
                <input type="number" id="category_id" name="category_id" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" id="description" name="description" required>
            </div>
            <button type="submit">Añadir Observación</button>
        </form>
        <table id="observations-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID de la Categoría</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script>

        // Obtener el token CSRF del meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Configurar las solicitudes fetch para incluir el token CSRF
        async function fetchCategories() {
            const response = await fetch('/categories', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            const data = await response.json();
            // Procesar los datos...
        }

        // Obtener y mostrar categorías
        async function fetchCategories() {
            const response = await fetch('/categories');
            const data = await response.json();
            const tableBody = document.querySelector('#categories-table tbody');
            tableBody.innerHTML = '';
            data.forEach(category => {
                tableBody.innerHTML += `
                    <tr>
                        <td>${category.id}</td>
                        <td>${category.name}</td>
                        <td>
                            <button onclick="deleteCategory(${category.id})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
        }

        // Obtener y mostrar observaciones
        async function fetchObservations() {
            const response = await fetch('/observations');
            const data = await response.json();
            const tableBody = document.querySelector('#observations-table tbody');
            tableBody.innerHTML = '';
            data.forEach(observation => {
                tableBody.innerHTML += `
                    <tr>
                        <td>${observation.id}</td>
                        <td>${observation.categories_id}</td>
                        <td>${observation.description}</td>
                        <td>
                            <button onclick="deleteObservation(${observation.id})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
        }

        // Manejar el envío del formulario de categorías
        document.getElementById('category-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            await fetch('/categories', {
                method: 'POST',
                body: formData,
            });
            fetchCategories();
        });

        // Manejar el envío del formulario de observaciones
        document.getElementById('observation-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            await fetch('/observations', {
                method: 'POST',
                body: formData,
            });
            fetchObservations();
        });

        // Eliminar categoría
        async function deleteCategory(id) {
            await fetch(`/categories/${id}`, {
                method: 'DELETE',
            });
            fetchCategories();
        }

        // Eliminar observación
        async function deleteObservation(id) {
            await fetch(`/observations/${id}`, {
                method: 'DELETE',
            });
            fetchObservations();
        }

        // Carga inicial
        fetchCategories();
        fetchObservations();
    </script>
</body>
</html>
