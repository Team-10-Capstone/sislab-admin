<!DOCTYPE html>
<html>

<head>
    <title>All FPPC Data</title>
</head>

<body>
    <h1>All FPPC Data</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No FPPC</th>
                <th>No PPK</th>
                <th>Tanggal PPK</th>
                <th>Trader Name</th>
                <th>NIP Baru</th>
                <th>Tanggal Monsur</th>
                <th>Petugas Monsur</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($fppcData)): ?>
                <?php foreach ($fppcData as $fppc): ?>
                    <tr>
                        <td>
                            <?= $fppc['no_fppc']; ?>
                        </td>
                        <td>
                            <?= $fppc['no_ppk']; ?>
                        </td>
                        <td>
                            <?= $fppc['tgl_ppk']; ?>
                        </td>

                        <td>
                            <?= $fppc['nip_baru']; ?>
                        </td>
                        <td>
                            <?= $fppc['tgl_monsur']; ?>
                        </td>
                        <td>
                            <?= $fppc['petugas_monsur']; ?>
                        </td>
                        <td>
                            <?= $fppc['status']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No FPPC data found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>