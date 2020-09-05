<?php require 'admin/config.php'; ?>
<?php require 'Views/header.php'; ?>

	<div class="contenedor">
		<div class="post">
			<article>
				<h2 class="titulo">Ha introducido una clave no válida</h2>
				<h3 class="titulo">Cambiar la clave</h3>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="post">
                    <input type="password" name="password" placeholder="Ingrese contraseña nueva">
					<input type="submit" value="Confirmar">
				</form>
			</article>
		</div>
	</div>

<?php require 'Views/footer.php'; ?>