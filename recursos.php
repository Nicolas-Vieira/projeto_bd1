<?php
require 'header.php';
if($_GET['id']) $id = $_GET['id'];
?>

<h1>Bem-vindo ao Spotify</h1>

<h2>Recursos Principais</h2>
<ul>
    <li><a href="musica/read.php">Lista de Músicas</a></li>
    <li><a href="musica/create.php">Adicionar Música</a></li>
    <li><a href="artista/read.php">Lista de Artistas</a></li>
    <li><a href="artista/create.php">Adicionar Artista</a></li>
    <li><a href="user_premium/create.php?id=<?php echo $id; ?>">Tornar-se premium</a></li>
    <!-- Outros links para recursos principais -->
</ul>

<?php
require 'footer.php';
?>