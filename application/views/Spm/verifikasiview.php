        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                &nbsp;
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Menu Verifikasi</a></li>
                <li><a href="#">Cek Verifikasi</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box box-solid'>
                <div class='box-header'>
                    <table class="table table-bordered">
                        <tr>
                            <td><img src="<?php echo base_url('assets/img/lamongan.png') ?>" width='60px'></td>
                            <td style='text-align:center;width:100%'>
                                <strong><font size="4">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KABUPATEN LAMONGAN</font><br>
                                <font size="3">VERIFIKASI SURAT PERINTAH MEMBAYAR (SPM)</font></strong><br>
                                <font size="4"><?php echo $org_nama ?></font>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <!-- <?php 
                    if($level_sess<>"pegawai") {
                        echo anchor('spm/create/','Tambah',array('class'=>'btn btn-success btn-flat'));
                    }
                    ?> -->
                    <!--
                    <div class="pull-right">
                        <?php echo anchor(site_url('spm/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-flat"'); ?>
                        <?php echo anchor(site_url('spm/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-flat"'); ?>
                        <?php echo anchor(site_url('spm/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-flat"'); ?>
                    </div>-->
                    <hr>
                    <div id="data_opd" class="table-responsive">
                        <table class="table table-bordered table-striped table-condensed" id="mytable" style="border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                        		    <!--<th>Jenis</th>-->
                                    <th>No SPM</th>
                                    <th>Tanggal<br>SPM</th>
                                    <th>Organisasi</th>
                                    <!--<th style="text-align:right">Nilai</th>-->
                        		    <th>Verifikator</th>
                                    <th>Keterangan<br>Pengajuan</th>
                                    <th style="text-align:center">Tipe</th>
                                    <th style="text-align:center">File</th>
                                    <th style="text-align:center">Status<br>Verifikasi</th>
                                    <th style="text-align:center">Approval<br>Kasubid</th>
                                    <th style="text-align:center">Approval<br>Kabid</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                	       <tbody>
                                <?php
                                $start = 0;
                                foreach ($spm_data as $spm)
                                {
                                    ?>
                                    <tr>
                            		    <td><?php echo ++$start ?></td>
                            		    <!--<td><?php echo $spm->Jenis ?></td>-->
                                        <td><?php echo $spm->NoSpm ?></td>
                                        <td><?php echo $spm->Tanggal ?></td>
                                        <td><?php echo $spm->NamaOrganisasi ?></td>
                                        <!--<td style="text-align:right"><?php echo number_format($spm->NilaiSpm,2,",",".") ?></td>-->
                                        <td><?php echo $spm->NamaPegawai ?></td>
                                        <td><?php echo $spm->Keterangan ?></td>
                                        <td><?php echo $spm->Tipe ?></td>
                                        <?php
                                            $tahun=$this->access->get_tahun();
                                            $filepath = 'filepdf';
                                            switch($tahun){
                                                 
                                                case 2020 :
                                                    $filepath = 'filepdf';
                                                    break;
                                                case 2021 :
                                                    $filepath = 'filepdf2021';
                                                    break;
                                                case 2022 :
                                                    $filepath = 'filepdf2022';
                                                    break;
                                                default :
                                                    $filepath = 'filepdf';
                                                    break;
                                            }
                                        ?>
                                        <td style="text-align:center"><?php echo anchor(site_url('upload/'.$filepath.'/'.$spm->FileUp),'<i class="fa fa-file-pdf-o"></i>',array('title'=>'File Upload','class'=>'btn btn-warning btn-xs','target'=>'_blank')); ?>
                                            <?php echo $spm->TanggalUp ?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php if($spm->StatusVerifikasi == 1) { 
                                                    if($spm->TanggalVerifikasi) { echo $spm->TanggalVerifikasi; } ?>
                                                <small class="label label-success"><i class="fa fa-check-circle"></i> Diterima</small>
                                            <?php } else if($spm->StatusVerifikasi == 2) { 
                                                    if($spm->TanggalVerifikasi) { echo $spm->TanggalVerifikasi; } ?>
                                                <small class="label label-danger"><i class="fa fa-ban"></i> Ditolak</small>
                                            <?php } else { ?>
                                                <small class="label label-default"><i class="fa fa-clock-o"></i> Pending</small>
                                            <?php } ?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php if($spm->StatusAppKasubid == 1) { 
                                                    if($spm->TanggalAppKasubid) { echo $spm->TanggalAppKasubid; } ?>
                                                <small class="label label-success"><i class="fa fa-check-circle"></i> Diterima</small>
                                            <?php } else if($spm->StatusAppKasubid == 2) { 
                                                    if($spm->TanggalAppKasubid) { echo $spm->TanggalAppKasubid; } ?>
                                                <small class="label label-danger"><i class="fa fa-ban"></i> Ditolak</small>
                                            <?php } else { ?>
                                                <small class="label label-default"><i class="fa fa-clock-o"></i> Pending</small>
                                            <?php } ?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php if($spm->StatusAppKabid == 1) { 
                                                    if($spm->TanggalAppKabid) { echo $spm->TanggalAppKabid; } ?>
                                                <small class="label label-success"><i class="fa fa-check-circle"></i> Diterima</small>
                                            <?php } else if($spm->StatusAppKabid == 2) { 
                                                    if($spm->TanggalAppKabid) { echo $spm->TanggalAppKabid; } ?>
                                                <small class="label label-danger"><i class="fa fa-ban"></i> Ditolak</small>
                                            <?php } else { ?>
                                                <small class="label label-default"><i class="fa fa-clock-o"></i> Pending</small>
                                            <?php } ?>
                                        </td>
                            		    <td style="text-align:center" width="120px">
                                			<?php 
                                            //echo anchor(site_url('spm_detail/index/'.$spm->ID_ANGGARAN_BELANJA),'<i class="fa fa-th"></i>',array('title'=>'detail','class'=>'btn btn-success btn-xs')); 
                                            //echo '  '; 
                                			//echo anchor(site_url('spm/read/'.$spm->ID_ANGGARAN_BELANJA),'<i class="fa fa-hand-paper-o"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-xs')); 
                                            //if($level_sess<>"admin") {
                                    			if($spm->StatusAppKasubid <> 1 and $spm->StatusAppKasubid <> 2){
                                                    echo '  '; 
                                        			echo anchor(site_url('spm/cekverifikasiupdate/'.$spm->IdSpm),'<i class="fa fa-pencil-square-o"></i> Edit',array('title'=>'edit','class'=>'btn btn-primary btn-xs')); 
                                        			echo '  '; 
                                                }
                                            //}
                                			?>
                    		            </td>
                    	        </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#mytable").DataTable({
                                "lengthMenu": [ [25, 50, 100, 500, -1], [25, 50, 100, 500, "All"] ]
                            });
                        });
                    </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        