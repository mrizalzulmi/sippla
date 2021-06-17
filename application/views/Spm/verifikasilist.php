        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                &nbsp;
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Menu Verifikasi</a></li>
                <li><a href="#">Verifikasi Dokumen SPM</a></li>
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
                            <td style='text-align:center;width:100%'><strong><font size="4">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KABUPATEN LAMONGAN</font><br><font size="3">VERIFIKASI DOKUMEN SURAT PERINTAH MEMBAYAR (SPM)</font></strong></td>
                        </tr>
                    </table>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <?php 
                    if($level_sess<>"pegawai") {
                        //echo anchor('spm/create/','Tambah',array('class'=>'btn btn-success btn-flat'));
                    }
                    ?>
                    <!--
                    <div class="pull-right">
                        <?php echo anchor(site_url('spm/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-flat"'); ?>
                        <?php echo anchor(site_url('spm/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-flat"'); ?>
                        <?php echo anchor(site_url('spm/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-flat"'); ?>
                    </div>-->
                    <hr>
                    <table class="table table-bordered table-striped table-condensed" id="mytable" style="border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                    		    <!--<th>Jenis</th>-->
                                <th>No SPM</th>
                                <th>Tanggal<br>SPM</th>
                                <th>Tanggal<br>Upload</th>
                                <th>Organisasi</th>
                                <!--<th style="text-align:right">Nilai</th>-->
                    		    <th>Verifikator</th>
                                <th>Status</th>
                                <th style="text-align:center">File</th>
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
                                    <td><?php echo $spm->TanggalUp ?></td>
                                    <td><?php echo $spm->NamaOrganisasi ?></td>
                                    <!--<td style="text-align:right"><?php echo number_format($spm->NilaiSpm,2,",",".") ?></td>-->
                                    <td><?php echo $spm->NamaPegawai ?></td>
                                    <td>
                                        <?php if($spm->IsRevisi == 1) { 
                                            if($spm->StatusAppKabidt==2) {
                                                echo "Revisi oleh Kabid, alasan : ".$spm->AlasanTolakKabidt."";
                                            } else if($spm->StatusAppKasubidt==2) {
                                                echo "Revisi oleh Kasubid, alasan : ".$spm->AlasanTolakKasubidt."";
                                            } else if($spm->StatusVerifikasit==2) {
                                                echo "Revisi oleh Verifikator, alasan : ".$spm->AlasanTolakVert."";
                                            }
                                            ?>
                                        <?php } else { ?>
                                            <!--<small class="label label-success"><i class="fa fa-new"></i>--> Baru
                                        <?php } ?>
                                    </td>
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
                                    <td style="text-align:center"><?php echo anchor(site_url('upload/'.$filepath.'/'.$spm->FileUp),'<i class="fa fa-file-pdf-o"></i>',array('title'=>'File Upload','class'=>'btn btn-warning btn-xs','target'=>'_blank')); ?></td>
                        		    <td style="text-align:center" width="80px">
                        			<?php                             
                                    echo '  ';
                                    echo anchor(site_url('spm/cekverifikasi/'.$spm->IdSpm),'<i class="fa fa-check"></i> Cek',array('title'=>'cek','class'=>'btn btn-primary btn-xs')); 
                        			?>
                        		    </td>
                	        </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
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
        