<h1>Personas</h1>

<form method="POST" action="?action=create">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="direccion" placeholder="Dirección" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <button type="submit">Guardar</button>
</form>

<br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Dirección</th>
    <th>Teléfono</th>
    <th>Acciones</th>
</tr>

<?php if(isset($personas)) { ?>
    <?php while($row = $personas->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['direccion']; ?></td>
        <td><?php echo $row['telefono']; ?></td>
        <td>
            <a href="?action=edit&id=<?php echo $row['id']; ?>">Editar</a>
            <a href="?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
<?php } ?>
</table>