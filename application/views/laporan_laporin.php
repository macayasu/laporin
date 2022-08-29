<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kasus</title>
    <style>
    td {
        padding-top: 20px;
        padding-bottom: 20px;
        padding-right: 5px;
    }

    td:first-child {
        padding-left: 5px;
        padding-right: 0;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <h2 style="text-align: center;">LAPORAN KASUS</h2>
    <h3 style="text-align: center;">SD Kristen Sokaraja</h3>
    <h3 style="text-align: center;">Tahun Ajaran <?= date("Y"); ?>/<?=date('Y', strtotime(date("Y"). ' + 1 years'))?></h3>
    <h3 style="text-align: center;"><?=$jenis_laporan?></h3>
    <table style="height: 197px; width: 1033px;">
        <tbody>
            <tr style="height: 8.95px;">
                <td style="width: 35px; height: 8.95px;text-align:center"><strong>NO</strong></td>
                <td style="width: 70px; height: 8.95px;text-align:center"><strong>NISN</strong></td>
                <td style="width: 85px; height: 8.95px;text-align:center"><strong>NAMA</strong></td>
                <td style="width: 97.4875px; height: 8.95px;text-align:center"><strong>EMAIL</strong></td>
                <td style="width: 95.5125px; height: 8.95px;text-align:center"><strong>ALAMAT</strong></td>
                <td style="width: 108px; height: 8.95px;text-align:center"><strong>JENIS MASALAH</strong></td>
                <td style="width: 50px; height: 8.95px;text-align:center"><strong>STATUS</strong></td>
                <td style="width: 130px; height: 8.95px;text-align:center"><strong>TANGGAL MELAPOR</strong></td>
            </tr>
            <?php
                $id = 0;
                foreach($laporin as $i)
                :
                $id++;
                $id_laporin = $i['id_laporin'];
                $nisn = $i['nisn'];
                $nama = $i['nama'];
                $email = $i['email'];
                $alamat = $i['alamat'];
                $id_jenis_masalah = $i['id_jenis_masalah'];
                $nama_jenis_masalah = $i['nama_jenis_masalah'];
                $status = $i['nama_status_laporin'];
                $tgl_melapor = $i['tgl_melapor'];
                $foto = $i['foto'];
                ?>
            <tr style="height: 91px;">
                <td style="width: 35px; height: 20px;text-align:center"><?=$id?></td>
                <td style="width: 70px; height: 20px;text-align:center"><?=$nisn?></td>
                <td style="width: 85px; height: 20px;text-align:center"><?=$nama?></td>
                <td style="width: 97.4875px; height: 20px;text-align:center"><?=$email?></td>
                <td style="width: 95.5125px; height: 20px;text-align:center"><?=$alamat?></td>
                <td style="width: 79px; height: 20px;text-align:center"><?=$nama_jenis_masalah?></td>
                <td style="width: 50px; height: 20px;text-align:center"><?=$status?></td>
                <td style="width: 130px; height: 20px;text-align:center"><?=$tgl_melapor?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>