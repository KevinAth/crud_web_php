<?php
include("db.php");
$nombre = '';
$cat = '';
$des = '';
$precio = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM products WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
  $nombre= $row['nombre'];
  $cat = $row['categoria'];
  $des = $row['descripcion'];
  $precio = $row['precio'];
  }
}

if (isset($_POST['actualizar'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $cat = $_POST['categoria'];
  $des = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $query = "UPDATE products set nombre = '$nombre', categoria = '$cat' ,descripcion = '$des', precio = '$precio' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Productos actualizado exitosamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('src/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-ground">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-ground ">
            <input type="text" name="categoria" class="form-control" placeholder="Categortia" style="margin-top: 10px;">
          </div>
          <div class="form-ground">
            <textarea name="descripcion" class="form-control" placeholder="descripcion" style="margin-top: 10px;"></textarea> 
          </div>
          <div class="form-ground">
            <input type="text" name="precio" class="form-control" placeholder="Precio" style="margin-top: 10px;">
          </div>
          <button class="btn-success" name="actualizar" style="margin-top: 10px; background-color: #007C0D; color:white;">Modificar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('src/footer.php'); ?>