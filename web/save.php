
    <?php 
    $ins = $_POST['pilihInstansi'];
    $des = $_POST['deskripsi'];
    include('function.php');
    $func = new konektor();
    $func->simpanDetail($ins,$des);
    ?>