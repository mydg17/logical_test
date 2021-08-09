
    <?php 
    $id_instansi = $_GET['id'];
    include('function.php');
    $func = new konektor();
    $func->delete($id_instansi);
    ?>