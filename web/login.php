
    <?php 
    $username = $_POST['username'];
    $password = $_POST['password'];
    include('function.php');
    $func = new konektor();
    $func->login($username,$password);
    ?>