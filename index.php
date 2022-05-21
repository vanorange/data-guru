<?php
// Koneksi Ke Database
$host   ="localhost";
$user   ="root";
$pass   ="";
$db     ="latihan_crud";

$koneksi = mysqli_connect ($host,$user,$pass,$db);
if(!$koneksi){ // cek koneksi
    die("Tidak bisa terkoneksi ke database");
}


// Definisi Variabel
$nama       ="";
$lahir      ="";
$alamat     ="";
$jabatan    ="";
$sukses     ="";
$error      ="";

// Simpan Data
if(isset($_POST['simpan'])){
    $nama   = $_POST['nama'];
    $lahir  = $_POST['lahir'];
    $alamat = $_POST['alamat'];
    $jabatan= $_POST['jabatan'];

        if($nama && $lahir && $alamat && $jabatan){
        $sql1 = "INSERT INTO guru(nama,lahir,alamat,jabatan) values ('$nama','$lahir','$alamat','$jabatan')";
        $query = mysqli_query($koneksi,$sql1);
        if($query){
            $sukses = "Berhasil memasukan data baru";
        }else{
            $error = "Gagal memasukan data";
        }
        }else{
            $error = "Silahkan isi terlebih dahulu !";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS Native -->
    <style>
        .mx-auto{ width:800px}
        .card{ margin-top:10px}
    </style>
    <title>Data Guru</title>
</head>
<body>
 
    <div class="mx-auto">
        <!-- Untuk Memasukan data -->    
        <div class="card">
            <div class="card-header">
                Create / Edit
            </div>
            <div class="card-body">
                <!-- Pesan Error -->
                <?php
                if($error){
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>    
                <?php    
                }
                ?>
                <!-- Pesan Sukses -->
                <?php
                if($sukses){
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>    
                <?php    
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Guru</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value=" <?php echo $nama ?>"placeholder="Masuk Nama"> 
                        </div>                   
                    </div>
                    <div class="mb-3">
                        <label for="lahir" class="col-sm-2 col-form-label">Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lahir" name="lahir" value=" <?php echo $lahir ?>"placeholder="Masuk Tempat Lahir"> 
                        </div>                   
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value=" <?php echo $alamat ?>"placeholder="Masuk Tempat Lahir"> 
                        </div>                   
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="jabatan" id="jabatan">
                            <option value="">- Pilih Jabatan -</option>
                            <option value="mtk"<?php if($jabatan == "mtk") echo "selected" ?>>Guru MTK</option>
                            <option value="biologi"<?php if($jabatan == "biologi") echo "selected" ?>>Guru Biologi</option>
                           </select>
                        </div>                   
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>     
                </form>
            </div>
        </div>

        <!-- Untuk mengeluarkan Data  -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Guru
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
    
</body>
</html>