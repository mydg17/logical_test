<?php
class konektor{
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $db = 'instansi';
    var $conn = '';

    function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass,$this->db);
        $check = $this->conn->connect_error?die("Connection Failed"):"Connection Success";
        // var_dump($check);
    }

    function login($user,$pass){
        $koneksi = $this->conn;
        $data = $koneksi->query( "select * from user where username='$user' and password='$pass' " );
       if( $data->num_rows > 0 ){
           header('location:home.php');
       }
       else{
           header('location:index.php');
       }
    }

    function tampil(){
        $koneksi = $this->conn;
        $query = "SELECT nama_instansi,deskripsi,detail.id_instansi FROM instansi
            LEFT JOIN detail ON
            detail.id_instansi = instansi.id_instansi WHERE detail.id_instansi IS NOT NULL";
        $data = $koneksi->query($query);
        return $data;
    }

    function simpanInstansi($name){
        $koneksi = $this->conn;
        $query = "INSERT INTO `instansi` (`id_instansi`, `nama_instansi`) VALUES (NULL, '$name') ";
        $data = $koneksi->query($query);
        if( $data === TRUE ){
            echo "<script>window.location.href='home.php'</script>";
        }
        else{
            header('location:index.php');
        }
    }

    function tampilInstansi(){
        $koneksi = $this->conn;
        $query = "SELECT nama_instansi,id_instansi FROM instansi";
        $data = $koneksi->query($query);
        return $data;
    }

    function simpanDetail($id,$desk){
        $koneksi = $this->conn;
        $query = "INSERT INTO `detail` (`id_detail`, `id_instansi`, `deskripsi`) VALUES (NULL, '$id', '$desk' ) ";
        $data = $koneksi->query($query);
        if( $data === TRUE ){
            header('location:home.php');
        }
        else{
            header('location:index.php');
        }
    }

    function delete($id){
        $koneksi = $this->conn;
        $query = "DELETE from detail WHERE id_instansi = $id ";
        $query2= "DELETE from instansi WHERE id_instansi = $id ";
        $data = $koneksi->query($query);
        $data2 = $koneksi->query($query2);
        if( ($data === TRUE) and ($data2 === TRUE) ){
            header('location:home.php');
        }
        else{
            header('location:index.php');
        }
    }
}

?>