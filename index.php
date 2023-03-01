<?php

// Ambil data dari Json 
$data = file_get_contents('data/data.json');
// konversi data json menggunakan fungsi json_decode menjadi array
$rute = json_decode($data, true);

// var_dump($rute[0][0]);

// Buat Array yang berisikan masing-masing nama Bandara Asal, Bandara Tujuan
$bandaraAsal = ["Soekarno-Hatta (CGK)", "Husein Sastranegara (BDO)", 'Abdul Rachman Saleh (MLG)', 'Juanda (SUB)'];
$bandaraTujuan = ['Ngurah Rai (DPS)', 'Hasanuddin (UPG)', 'Inanwatan (INX)', 'Sultan Iskandarmuda (BTJ)'];

// Array Asosiatif yang berisikan key dan value berupa nama bandara dan pajak
$pajakRuteAsal = ["Soekarno-Hatta (CGK)" => 50000,
                    "Husein Sastranegara (BDO)" => 30000,
                    "Abdul Rachman Saleh (MLG)" => 40000,
                    "Juanda (SUB)" => 40000
                 ];
$pajakRuteTujuan = ["Ngurah Rai (DPS)" => 80000,
                    "Hasanuddin (UPG)" => 70000,
                    "Inanwatan (INX)" => 90000,
                    "Sultan Iskandarmuda (BTJ)" => 70000
];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiket Pesawat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>

    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="library/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1>Daftar Rute Penerbangan</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="maskapai" class="form-label">Maskapai:</label>
                        <input type="text" class="form-control" id="maskapai" placeholder="Nama Maskapai" name="maskapai">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="basal" class="form-label">Bandara Asal:</label>
                        <select class="form-select" name="basal">
                        <?php foreach($bandaraAsal as $asal) : ?>
                        <option><?= $asal;?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="btujuan" class="form-label">Bandara Tujuan:</label>
                        <select class="form-select" name="btujuan">
                        <?php foreach($bandaraTujuan as $tujuan)  : ?>
                        <option ><?= $tujuan;?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Tiket:</label>
                        <input type="number" class="form-control" id="harga" placeholder="Harga Tiket" name="harga">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- if(isset) di bawah ini berarti, jika tombol submit di klik maka akan menjalankan data yang diinput oleh user akan diproses-->

    <?php if(isset($_POST['submit'])){
        // Di bawah ini merupakan pendeklarasian variabel, yang dimana variabel" tersebut digunakan sebagai tempat untuk menyimpan data baru yang diinput melalui form
        $maskapai = $_POST['maskapai'];
        $basal = $_POST['basal'];
        $btujuan = $_POST['btujuan'];
        $hargaTiket = $_POST['harga'];
        // variabel totalPajakFix ini akan menjalankan fungsi totalPajak dengan parameter yang diambil dari data variabel $basal dan $btujuan
        $totalPajakFix= totalPajak($basal, $btujuan);
        $totalHargaTiket = totalHarga($totalPajakFix, $hargaTiket);

        // data-data baru yang berasal dari form, dibuat ke dalam bentuk array bernama $ruteBaru
        $ruteBaru = [$maskapai, $basal, $btujuan, $hargaTiket, $totalPajakFix, $totalHargaTiket];
        // tambah data baru yang diinput dari form ke data array $rute
        array_push($rute, $ruteBaru);

        // ubah kembali data inputan dari customer  (dari array php) menjadi Json dan simpan ke dalam data.json.
        $dataJson = json_encode($rute, JSON_PRETTY_PRINT);
        file_put_contents('data/data.json', $dataJson);

       
    }


     // Fungsi totalPajak dengan parameter yang berisikan program untuk menjumlahkan pajak bandara asal dan bandara tujuan
        
        function totalPajak($pajakAsal, $pajakTujuan){
            // global di bawah ini untuk menjadikan array $pajakRuteAsal dan $pajakRuteTujuan dapat digunakan di dalam fungsi. 
            global $pajakRuteAsal, $pajakRuteTujuan;
            
            // lakukan perulangan pada array $pajakRuteAsal. Perintah di bawah ini akan memanggil key dan value dari array.
            foreach($pajakRuteAsal as $ruteAwal => $hargaPajakAsal){
                // perulangan if yang dimana jika nilai parameter $pajakAsal (nama bandara asal) sama dengan $ruteAwal (nama bandara asal) maka, variabel $hargaPajakAsalFix akan bernilai sama dengan harga pajak dari bandara yang di-mention.
                if ($pajakAsal == $ruteAwal){
                    $hargaPajakAsalFix = $hargaPajakAsal;

                }
            }

            foreach($pajakRuteTujuan as $ruteTujuan => $hargaPajakTujuan){
                if ($pajakTujuan == $ruteTujuan){
                    $hargaPajakTujuanFix = $hargaPajakTujuan;

                }
            }

            // mengembalikan nilai dari hasil penjumlahan pajak penerbangan awal dan pajak penerbangan tujuan

            return $hargaPajakAsalFix + $hargaPajakTujuanFix;


        }

        
        // Fungsi totalHarga dengan parameter ini akan mengembalikan nilai dari hasil penjumlahan harga tiket dan total pajak .

        function totalHarga($hargaTiket, $totalPajak){
            return $hargaTiket + $totalPajak;
        }
    
    ?>

    <!-- Tampilan output dari Daftar Rute Penerbangan -->
    <div class="container mt-5">
        <h2 class="text-center">Daftar Rute Tersedia</h2>            
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th>Maskapai</th>
                <th>Asal Penerbangan</th>
                <th>Tujuan Penerbangan</th>
                <th>Harga Tiket</th>
                <th>Harga Pajak</th>
                <th>Total Harga Tiket</th>
            </tr>
            </thead>
            <tbody>
                <!-- Menampilkan data lama dari json ke  dalam tabel-->
            <?php foreach ($rute as $row) :?> 
                <tr>
                    <td><?= $row[0]?></td>
                    <td><?= $row[1]?></td>
                    <td><?= $row[2]?></td>
                    <td>Rp <?= $row[3]?></td>
                    <td>Rp <?= $row[4]?></td>
                    <td>Rp <?= $row[5]?></td>
                </tr>
            <?php endforeach; ?> 
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>