        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                &nbsp;
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Menu Kasubid</a></li>
                <li><a href="#">Approval Dokumen SPM</a></li>
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
                            <td style='text-align:center;width:100%'><strong><font size="4">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KABUPATEN LAMONGAN</font><br><font size="3">APPROVAL DOKUMEN SURAT PERINTAH MEMBAYAR (SPM)</font></strong></td>
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
                    <div class="row">
                        <div class="col-sm-4">
                            <select data-placeholder="Pilih Tipe..." class="select2" style="width: 100%;" tabindex="2" name="Tipe" id="Tipe" >
                                <option value=""></option> 
                                <?php
                                    foreach($data_tipe->result_array() as $dp)
                                    {
                                    $pilih='';
                                    if($dp['Tipe']==$Tipe)
                                    {
                                    $pilih='selected="selected"';
                                ?>
                                    <option value="<?php echo $dp['Tipe']; ?>" <?php echo $pilih; ?>><?php echo $dp['Keterangan']; ?></option>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <option value="<?php echo $dp['Tipe']; ?>"><?php echo $dp['Keterangan']; ?></option>
                                <?php
                                }
                                    }
                                ?>
                            </select>
                            <?php echo form_error('Tipe') ?>
                        </div>
                        <div class="col-sm-8">
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <div id="data_kasubid" class="table-responsive">
                            <table class="table table-bordered table-striped table-condensed" id="mytable" style="border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                            		    <!--<th>Jenis</th>-->
                                        <th>No SPM</th>
                                        <th>Tanggal<br>SPM</th>
                                        <th>Tanggal<br>Verifikasi</th>
                                        <th>Organisasi</th>
                                        <!--<th style="text-align:right">Nilai</th>-->
                            		    <th>Verifikator</th>
                                        <th>Keterangan<br>Pengajuan</th>
                                        <th style="text-align:center">File</th>
                                        <th style="text-align:center">Tipe</th>
                                        <th>Status</th>
                                        <th style="text-align:center">Status<br>Verifikasi</th>
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
                                            <td><?php echo $spm->TanggalVerifikasi ?></td>
                                            <td><?php echo $spm->NamaOrganisasi ?></td>
                                            <!--<td style="text-align:right"><?php echo number_format($spm->NilaiSpm,2,",",".") ?></td>-->
                                            <td><?php echo $spm->NamaPegawai ?></td>
                                            <td><?php echo $spm->Keterangan ?></td>
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
                                            <td><?php echo $spm->Tipe ?></td>
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
                                            <td style="text-align:center">
                                                <?php if($spm->StatusVerifikasi == 1) { ?>
                                                    <small class="label label-success"><i class="fa fa-check-circle"></i> Diterima</small>
                                                <?php } else if($spm->StatusVerifikasi == 2) { ?>
                                                    <small class="label label-danger"><i class="fa fa-ban"></i> Ditolak</small>
                                                <?php } else { ?>
                                                    <small class="label label-default"><i class="fa fa-clock-o"></i> Pending</small>
                                                <?php } ?>
                                            </td>
                                		    <td style="text-align:center" width="80px">
                                    			<?php 
                                                echo '  ';
                                                echo anchor(site_url('spm/cekapprovalkasubid/'.$spm->IdSpm),'<i class="fa fa-check"></i> Cek',array('title'=>'cek','class'=>'btn btn-primary btn-xs')); 
                                    			?>
                                		    </td>
                        	           </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
        
        <script type="text/javascript">
            $("#Tipe").change(function(){ 
                var Tipe = $("#Tipe").val(); 
                    $.ajax({ 
                    url: "<?php echo base_url(); ?>spm/ambil_data_spmkasubid", 
                    data: "Tipe="+Tipe, 
                    cache: false, 
                    success: function(msg){ 
                    $("#data_kasubid").html(msg); 
                    //window.location.assign("<?php echo base_url(); ?>teknikal/teknisi");
                    } 
                    })
                });

            //$('#data_pembbu').load('<?php echo base_url(); ?>belanja/ambil_data_outlet_session');
        </script>