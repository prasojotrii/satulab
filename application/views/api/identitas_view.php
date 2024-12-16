<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas dan Spec</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Data Identitas</h1>
    <table border="1" id="identitas-table">
        <thead>
            <tr>
                <th>Spec</th>
                <th>ID</th>
                <th>Month</th>
                <th>Years</th>
                <th>ID Req</th>
                <th>Plant</th>
                <th>Sloc</th>
                <th>Zyear</th>
                <th>Material</th>
                <th>Description</th>
                <th>Batch</th>
                <th>No Karantina</th>
                <th>Batch Lapangan</th>
                <th>Manuf Date</th>
                <th>ED</th>
                <th>Uji Ulang</th>
                <th>Tgl Karantina</th>
                <th>Zmasalah</th>
                <th>Desc Mslh</th>
                <th>Nama QC</th>
                <th>Nama Koor</th>
                <th>Nama KA</th>
                <th>DQC</th>
                <th>DLAB</th>
                <th>DRND</th>
                <th>ZIND</th>
                <th>Status Kar</th>
                <th>Insplot</th>
                <th>Order</th>
                <th>Matdoc</th>
                <th>Matyears</th>
                <th>Ztransaksi</th>
                <th>Quantity</th>
                <th>UOM</th>
                <th>Reff</th>

            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <h1>Data Spec</h1>
    <table border="1" id="spec-table">
        <thead>
            <tr>
                <th>Master Character</th>
                <th>Short Text</th>
                <th>Opr Shrttxt</th>
                <th>Spec</th>
                <th>Result</th>
                <th>Manual Add</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        $(document).ready(function() {
            // Load identitas data
            $.get('<?php echo base_url('api/karantina/get_all_identitas'); ?>', function(data) {
                const identitasTable = $('#identitas-table tbody');
                data.forEach(row => {
                    const rowHtml = `
                        <tr>
                            <td><button class="view-spec" data-id-kar="${row.id_kar}">View Spec</button></td>
                            <td>${row.id_kar}</td>
                            <td>${row.month}</td>
                            <td>${row.years}</td>
                            <td>${row.id_req}</td>
                            <td>${row.plant}</td>
                            <td>${row.sloc}</td>
                            <td>${row.zyear}</td>
                            <td>${row.material}</td>
                            <td>${row.desc}</td>
                            <td>${row.batch}</td>
                            <td>${row.no_karantina}</td>
                            <td>${row.batch_lapangan}</td>
                            <td>${row.manuf_date}</td>
                            <td>${row.ed}</td>
                            <td>${row.uji_ulang}</td>
                            <td>${row.tgl_karantina}</td>
                            <td>${row.zmasalah}</td>
                            <td>${row.desc_mslh}</td>
                            <td>${row.nama_qc}</td>
                            <td>${row.nama_koor}</td>
                            <td>${row.nama_ka}</td>
                            <td>${row.dqc}</td>
                            <td>${row.dlab}</td>
                            <td>${row.drnd}</td>
                            <td>${row.zind}</td>
                            <td>${row.status_kar}</td>
                            <td>${row.insplot}</td>
                            <td>${row.order}</td>
                            <td>${row.matdoc}</td>
                            <td>${row.matyears}</td>
                            <td>${row.ztransaksi}</td>
                            <td>${row.quantity}</td>
                            <td>${row.uom}</td>
                            <td>${row.reff}</td>
                        
                        </tr>
                    `;
                    identitasTable.append(rowHtml);
                });

                // Attach click event to view spec buttons
                $('.view-spec').click(function() {
                    const id_kar = $(this).data('id-kar');
                    $.get('<?php echo base_url('api/karantina/get_spec_by_id_kar'); ?>?id_kar=' + id_kar, function(data) {
                        const specTable = $('#spec-table tbody');
                        specTable.empty(); // Clear previous spec data
                        data.forEach(row => {
                            const rowHtml = `
                                <tr>
                                    <td>${row.mstrchar}</td>
                                    <td>${row.short_text}</td>
                                    <td>${row.oprshrttxt}</td>
                                    <td>${row.spec}</td>
                                    <td>${row.result}</td>
                                    <td>${row.manual_add}</td>
                                </tr>
                            `;
                            specTable.append(rowHtml);
                        });
                    });
                });
            });
        });
    </script>
</body>

</html>