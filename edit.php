<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include 'koneksi.php';
    $query = mysqli_query($conn, "SELECT * FROM `produk` as p join supplier as s ON p.id_supplier = s.id_sup join kategori_produk as kp on p.id_produk_kategori = kp.id_kategori where id = '$_GET[id]'");

    while ($p = mysqli_fetch_array($query)) {
        $id = $p["id"];
        $gambar = $p["gambar"];
        $produk = $p["nama_produk"];
        $deskripsi = $p["deskripsi"];
        $kategori = $p["nama_kategori"];
        $harga = $p["harga"];
        $stok = $p["stok"];
        $supplier = $p["nama"];
    }
    ?>
    <center>
        <div class="card text-bg-light mb-3 mt-5" style="max-width: 50rem;">
            <div class="card-header">
                <h3>EDIT PAGE</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Produk</h5>
                <form action="proses_edit.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                    <img src="<?php echo $gambar ?>" width="100">
                    <input class="form-control mb-3" type="file" name="fileToUpload" id="fileToUpload">
                    <input class="form-control mb-3" type="text" value="<?php echo $produk ?>" name="nama_produk">
                    <input class="form-control mb-3" type="text" value="<?php echo $deskripsi ?>" name="deskripsi">
                    <select class="form-control mb-3" name="kategori" id="kategori">
                        <?php
                        // Fetch data from the "items" table
                        $query = mysqli_query($conn, "SELECT * FROM kategori_produk");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='" . $data["id_kategori"] . "'>" . $data["nama_kategori"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>
                    <input class="form-control mb-3" type="number" value="<?php echo $harga ?>" name="harga">
                    <input class="form-control mb-3" type="number" value="<?php echo $stok ?>" name="stok">
                    <select class="form-control mb-3" name="supplier" id="supplier">
                        <?php
                        // Fetch data from the "items" table
                        $query = mysqli_query($conn, "SELECT * FROM supplier");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='" . $data["id_sup"] . "'>" . $data["nama"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-info left">Submit</button>
                    </div>

                </form>
            </div>
        </div>

    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>