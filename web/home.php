<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css" type="text/css">
</head>
<body>
    <div class="container">
    <div class="form-group row mt-5 form p-3">
    <label class="col-12 col-form-label"><b>Referensi > Instansi</b></label>
        <form method="post" action="" class="col-12">
        <div class="form-group form-in row form p-3">
            <label class="col-2 col-form-label">Instansi</label>
            <div class="col-sm-10">
                <div class="form-group">
                    <input type="text" name="nama_instansi" class="form-control" placeholder="masukan instansi disini">
                </div> 
                    <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-primary" value="simpan">
                </div>
                </div>
        </div>
        </form> 
    <div class="col-12">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addInstansi" > Tambah </button>      
    </div>  
    <div class="form-group form-in row col-12 form p-3 m-2">
       <table class=" col-12 table w-100" border="1" style="border-color:#a0a0a0;">
        <thead  style="background-color:#ffc638">
          <tr>
               <td>No</td>
               <td>Aksi</td>
               <td>Instansi</td>
               <td>Deskripsi</td>
           </tr>
        </thead> 
        <tbody style="background-color:#ffe83f">
       <?php 
        include('function.php');
        $func = new konektor();
        $show = $func->tampil();
        $no = 1;
        while( $row = $show->fetch_assoc()){
        ?>
        <tr>
            <td><?= $no; ?></td>
            <td>
              <a class="btn btn-sm btn-success" href="edit.php?id=<?= $row['id_instansi'];?>" > Edit</a>
              <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row['id_instansi'];?>" > Delete</a>
            </td>
            <td><?= $row["nama_instansi"];?></td>
            <td><?= $row["deskripsi"];?></td>
        </tr>
        <?php $no++; } ?>
        </tbody>
       </table>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addInstansi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header form">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Instansi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form-in">
      <form method="post" action="save.php" class="col-12">
        <div class="form-group row p-3">
            <label class="col-2 col-form-label">Instansi</label>
            <div class="col-sm-10">
                <div class="form-group">
                  <select class="form-control" name="pilihInstansi">
                    <?php 
                    $showIns = $func->tampilInstansi();
                    while( $showing = $showIns->fetch_assoc()){
                    ?>
                    <option value='<?= $showing['id_instansi'];?>'><?= $showing['nama_instansi'];?></option>
                    <?php } ?>
                  </select>
                    
                </div> 
            </div>
            <label class="col-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <div class="form-group">
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div> 
            </div>
        </div>
      </div>
      <div class="modal-footer form">
        <input type="submit" class="btn btn-primary" value="Simpan">
        <input type="reset" class="btn btn-secondary" value="Reset">
      </div>
    </form> 
    </div>
  </div>
</div>

<?php 
if(!empty($_POST['nama_instansi'])){
  $name = $_POST['nama_instansi'];
  $func->simpanInstansi($name);
}


?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>