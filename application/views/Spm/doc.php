<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('AdminLTE3/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Plant List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>No SPM</th>
        		<th>Tanggal</th>
        		<th>No SP2D</th>
		
            </tr><?php
            foreach ($spm_data as $spm)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $spm->NoSpm ?></td>
		      <td><?php echo $spm->Tanggal ?></td>
		      <td><?php echo $spm->NoSp2d ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>