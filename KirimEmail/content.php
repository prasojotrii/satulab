<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>Daftar Instrumen Yang Perlu Dikalibrasi</h2>

    <?php
    $db_host = 'localhost'; // Nama Server
    $db_user = 'root'; // User Server
    $db_pass = ''; // Password Server
    $db_name = 'db_labsm'; // Nama Database

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die('Gagal terhubung MySQL: ' . mysqli_connect_error());
    }

    $sql = 'UPDATE `tb_daftar_instrumen` SET `status_kalibrasi`=2 WHERE `selanjutnnya_kalibrasi` = CURDATE()';
    $sqldua = 'SELECT * FROM `tb_daftar_instrumen` WHERE `selanjutnnya_kalibrasi` =CURDATE();';

    $query2 = mysqli_query($conn, $sql);
    $query = mysqli_query($conn, $sqldua);

    if (!$query) {
        die('SQL Error: ' . mysqli_error($conn));
    }

    echo '
    <table>
		<thead>
			<tr>
				<th>Id Instrumen</th>
                <th>Tipe Instrumen</th>
				<th>Lokasi</th>
		
			</tr>
		</thead>
		<tbody>';

    while ($row = mysqli_fetch_array($query)) {
        echo '<tr>
			<td>' . $row['id_aset'] . '</td>
            <td>' . $row['tipe_instrumen'] . '</td>
			<td>' . $row['lokasi'] . '</td>
         
		</tr>';
    }
    echo '

	</tbody>
</table>';

    // // Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
    // mysqli_free_result($query);

    // // Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
    // mysqli_close($conn);
