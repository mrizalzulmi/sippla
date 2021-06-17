        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                &nbsp;
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Menu Arsip</a></li>
                <li><a href="#">Arsip Dokumen SPM</a></li>
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
                            <td style='text-align:center;width:100%'><strong><font size="4">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KABUPATEN LAMONGAN</font><br><font size="3">ARSIP DOKUMEN SPM</font></strong></td>
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
                        <div class="col-sm-6">
                            <select data-placeholder="Pilih Organisasi..." class="select2" style="width: 100%;" tabindex="2" name="IdOrganisasi" id="IdOrganisasi" <?php if(!empty($organisasi)) echo "disabled"; ?> >
                                <option value=""></option> 
                                <?php
                                    foreach($data_organisasi->result_array() as $dp)
                                    {
                                    $pilih='';
                                    if($dp['IdOrganisasi']==$IdOrganisasi or $dp['IdOrganisasi']==$organisasi or $dp['IdOrganisasi']==$organisasi2)
                                    {
                                    $pilih='selected="selected"';
                                ?>
                                    <option value="<?php echo $dp['IdOrganisasi']; ?>" <?php echo $pilih; ?>><?php echo $dp['NamaOrganisasi']; ?></option>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <option value="<?php echo $dp['IdOrganisasi']; ?>"><?php echo $dp['NamaOrganisasi']; ?></option>
                                <?php
                                }
                                    }
                                ?>
                            </select>
                            <?php echo form_error('IdOrganisasi') ?>
                        </div>
                        <div class="col-sm-8">
                        </div>
                    </div>
                    <hr>
                    <div id="data_arsip" class="table-responsive">
                        <table class="table table-bordered table-striped table-condensed" id="mytable" style="border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                        		    <!--<th>Jenis</th>-->
                                    <th>No SPM</th>
                                    <th>Tanggal SPM</th>
                                    <th>Organisasi</th>
                                    <!--<th style="text-align:right">Nilai</th>-->
                        		    <th>Verifikator</th>
                                    <th>File</th>
                                    <th>Nomor SP2D</th>
                                    <th>Tanggal SP2D</th>
                                    <!--<th style="text-align:center">Action</th>-->
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
                                        <td><?php echo $spm->NoSp2d ?></td>
                                        <td><?php echo $spm->TanggalSp2d ?></td>
                            		    <!--<td style="text-align:center" width="80px">
                                			<?php 
                                            echo '  ';
                                            echo anchor(site_url('spm/cekpenomoran/'.$spm->IdSpm),'<i class="fa fa-check"></i> Cek',array('title'=>'cek','class'=>'btn btn-primary btn-xs')); 
                                			?>
                                        </td>-->
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

        <script type="text/javascript">
            $("#IdOrganisasi").change(function(){ 
                var IdOrganisasi = $("#IdOrganisasi").val(); 
                    $.ajax({ 
                    url: "<?php echo base_url(); ?>spm/ambil_data_spmarsip", 
                    data: "IdOrganisasi="+IdOrganisasi, 
                    cache: false, 
                    success: function(msg){ 
                    $("#data_arsip").html(msg); 
                    //window.location.assign("<?php echo base_url(); ?>teknikal/teknisi");
                    } 
                    })
                });

            //$('#data_pembbu').load('<?php echo base_url(); ?>belanja/ambil_data_outlet_session');
        </script>
        