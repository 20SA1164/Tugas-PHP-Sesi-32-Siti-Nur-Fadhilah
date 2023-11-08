<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Penjualan</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <?php
            include 'koneksi.php';
            $query = mysqli_query($conn, "SELECT * FROM produk as p join supplier as s ON p.id_supplier = s.id_sup join kategori_produk as kp on p.id_produk_kategori = kp.id_kategori");
            ?>
            <center><h1>DATA PRODUK</h1> </center>
            <a href="tambah.php" class="btn btn-light" style="margin-bottom:5px"><i class="fa-solid fa-user-plus"></i></a>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>
                        No
                    <th>
                        Gambar
                    </th>
                    <th>
                        Nama Produk
                    </th>
                    <th>
                        Deskripsi
                    </th>
                    <th>
                        Kategori
                    </th>
                    <th>
                        Harga Satuan
                    </th>
                    <th>
                        Stok Barang 
                    </th>
                    <th>
                        Supplier
                    </th>
                    <th>
                        Created at
                    </th>
                    <th>
                        Updated at
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
                <?php 
                if(mysqli_num_rows($query)>0){
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $no?></td>
                    <td><img src="<?php echo $data["gambar"] ?>" width="100"></td>
                    <td><?php echo $data["nama_produk"]?></td>
                    <td><?php echo $data["deskripsi"]?></td>
                    <td><?php echo $data["nama_kategori"]?></td>
                    <td><?php echo $data["harga"]?></td>
                    <td><?php echo $data["stok"]?></td>
                    <td><?php echo $data["nama"]?></td>
                    <td><?php echo $data["created_at"]?></td>
                    <td><?php echo $data["updated_at"]?></td>
                    <td><a href="edit.php?id=<?php  echo $data["id"]?>"><button type="button" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a>
                    <br> 
                    <a href="proses_delete.php?id=<?php  echo $data["id"]?>"><button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button></a></td>
                </tr>
                <?php $no++; } ?>
                <?php } ?>
            </table>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/6beb2a82fc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>