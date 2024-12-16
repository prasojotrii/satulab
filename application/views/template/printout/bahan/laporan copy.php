<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv=”refresh” content=”1″>

    <title>Print Label Asset</title>


    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }
    </style>

</head>

<body>

<table>
    <tr>
        <td></td>
        <td style="text-align: center; width: 60%;">
            <span style="font-size: 14px; font-weight: bold;">LABORATORIUM ANALISA PT.SIDO MUNCUL</span><br>
            <span style="font-size: 8px;">Laboratorium Penguji</span><br>
            <span style="font-size: 8px;">Jl. Soekarno Hatta Km. 28 Kec. Bergas-Klepu, Semarang Indonesia</span><br>
            <span style="font-size: 8px;">Telp. (62-298)523515 (Hunting); Fax. (62-298)523509; E-mail: laboratkimia.sm@gmail.com</span>
        </td>
        <td style="text-align: center; width: 10%;">
        
                <span style="font-size: 8px; display: inline-block; border: 1px solid black; padding: 5px;">FR/PR/PM.6-4/6/6</span>
        
        </td>
    </tr>
    <tr style="vertical-align: top;">
        <td></td>
        <td style="font-size: 12px;">
        <table>
                    <thead>
                        <tr>
                            <th style="width: 90px; border-top: 0; border-left: 0; border-bottom: 0;"> </th>
                            <th>No</th>
                            <th>Nama Bahan Kimia</th>
                            <th>Kemasan</th>
                            <th>Jumlah Awal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Sisa Ahkir</th>
                            <th>Tanggal ED</th>
                            <th>Nomor Batch</th>
                            <th>Merek</th>
    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $counter = 1; // Inisialisasi variabel hitungan

                        foreach ($list_bahan as $list) :
                        ?>
                            <tr>
                                <td style="border-top: 0; border-left: 0; border-bottom: 0;"></td>
                                <td><?php echo $counter; ?></td> <!-- Nomor Urut -->
                                <td><?php echo $list['nama_bahan']; ?></td>
                                <td><?php echo $list['kemasan']; ?> <?php echo $list['satuan']; ?></td>
                                <td><?php echo $list['jumlah_bahan_awal']; ?></td>
                                <td><?php echo $list['jumlah_bahan']; ?></td>
                                <td><?php echo $list['jumlah_bahan']; ?></td>
                                <td><?php echo $list['jumlah_bahan_sisa']; ?></td>
                                <td><?php echo $list['tanggal_ed']; ?></td>
                                <td><?php echo $list['nomor_batch']; ?></td>
                                <td><?php echo $list['merek']; ?></td>
                            </tr>
                        <?php
                            $counter++; // Increment hitungan setiap kali perulangan berikutnya
                        endforeach;
                        ?>
                    </tbody>
                </table>
        </td>
        <td></td>
 
    </tr>
</table>


    <span style="font-size: 10px;margin-bottom:2px">Di print pada tanggal
        <?php
        $nama_hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        $indeks_hari = date('w'); // 'w' mengembalikan indeks hari (0-6)
        $nama_hari_ini = $nama_hari[$indeks_hari];
        $tanggal_hari_ini = date('d M Y');
        echo $nama_hari_ini . ', ' . $tanggal_hari_ini;
        ?>
    </span>


</body>

</html>