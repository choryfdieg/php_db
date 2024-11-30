<?php
// Conectar a la base de datos SQLite
$db = new SQLite3('tienda_base_datos.db');

// Consultar la tabla cliente
$result = $db->query('SELECT * FROM cliente');

// Mostrar la tabla HTML
echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Lista de Clientes</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>";

// Iterar sobre los resultados y crear filas en la tabla
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nombre']}</td>
            <td>{$row['email']}</td>
          </tr>";
}

echo "    </table>
</body>
</html>";

// Cerrar la conexión
$db->close();
?>