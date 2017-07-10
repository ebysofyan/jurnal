<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title style="text-align: center"><h3>Transaksi</h3></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bs/css/bootstrap.min.css">
</head>

<body>
<h5>Data Jurnal : <?php echo $jurnal->nama ?> </h5>
<table id="tbl_trx" class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 4%;">No.</th>
        <th style="width: 12%;">Tanggal</th>
        <th style="width: 30%; max-width: 37%;">Uraian</th>
        <th style="width: 18%; max-width: 37%;">Debet</th>
        <th style="width: 18%; max-width: 37%;">Kredit</th>
        <th style="width: 18%; max-width: 37%;">Kas</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($list_transaksi as $key => $transaksi): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $transaksi->tanggal ?></td>
            <td><?php echo $transaksi->uraian ?></td>
            <td><?php echo money_formatter($transaksi->debet) ?></td>
            <td><?php echo money_formatter($transaksi->kredit) ?></td>
            <td><?php echo money_formatter($balance = $balance + ($transaksi->debet - $transaksi->kredit)) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<body/>
<footer>

</footer>
<html/>