<?php
//array scalar (1 dimensi)
$m1 = ['nim'=>'1910031802098','nama'=>'Novri','nilai'=>95];
$m2 = ['nim'=>'1910031802099','nama'=>'Anam','nilai'=>85];
$m3 = ['nim'=>'1910031802100','nama'=>'Abdi','nilai'=>87];
$m4 = ['nim'=>'1910031802101','nama'=>'Tio','nilai'=>75];
$m5 = ['nim'=>'1910031802102','nama'=>'Nugi','nilai'=>84];
$m6 = ['nim'=>'1910031802103','nama'=>'Tomi','nilai'=>82];
$m7 = ['nim'=>'1910031802104','nama'=>'Rizky','nilai'=>65];
$m8 = ['nim'=>'1910031802105','nama'=>'Harizky','nilai'=>75];
$m9 = ['nim'=>'1910031802106','nama'=>'Udin','nilai'=>50];
$m10 = ['nim'=>'1910031802107','nama'=>'Cecep','nilai'=>45];

$ar_judul = ['No','NIM','Nama','Nilai','Keterangan',
'Grade','Predikat'];

//array assosiative (> 1 dimensi)
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

//aggregate function in array
$jumlah_mahasiswa = count($mahasiswa);
$jml_nilai = array_column($mahasiswa,'nilai');
$total_nilai = array_sum($jml_nilai);
$nilai_tertinggi = max($jml_nilai);
$nilai_terendah = min($jml_nilai);
$rata2 = $total_nilai / $jumlah_mahasiswa;
//keterangan
$hasilakhir = [
    'Nilai Tertinggi'=>$nilai_tertinggi,
    'Nilai Terendah'=>$nilai_terendah,
    'Nilai Rata-Rata'=>$rata2,
    'Jumlah Mahasiwsa'=>$jumlah_mahasiswa
];
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TUGAS 3 Array</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
        <h3 class="text-center">Daftar Nilai Mahasiswa by Novri Rizqullah</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php
                    foreach($ar_judul as $jdl){
                    ?>
                    <th><?= $jdl ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($mahasiswa as $mhs){
                //rumus2 Keterangan
                $ket = ($mhs['nilai'] >= 60)?"Lulus":"Gagal";
               //rumus2 mencari Grade
               if($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) $grade = 'A';
             else if($mhs['nilai'] >= 75 && $mhs['nilai'] < 85) $grade = 'B';
             else if($mhs['nilai'] >= 60 && $mhs['nilai'] < 75) $grade = 'C';
             else if($mhs['nilai'] >= 30 && $mhs['nilai']< 60) $grade = 'D';
             else if($mhs['nilai'] >= 0 && $mhs['nilai'] < 30) $grade = 'E';
             else $grade = '';
             //rumus2 mencari predikat
             switch ($grade) {
            case 'A': $predikat = 'Memuaskan'; break;
            case 'B': $predikat = 'Bagus'; break;
            case 'C': $predikat = 'Cukup'; break;
            case 'D': $predikat = 'Kurang'; break;
            case 'E': $predikat = 'Buruk'; break;
            default: $predikat = '';
        }
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['nilai'] ?></td>
                    <td><?= $ket ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
                <?php $no++; } ?>
            </tbody>
            <tfoot>
                <?php
                foreach ($hasilakhir as $hsl => $hasil) {
                ?>
                <tr>
                    <th colspan="6"><?= $hsl ?></th>
                    <th><?= $hasil ?></th>
                </tr>
                <?php } ?>
            </tfoot>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>

</html>