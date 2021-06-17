        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manajemen Pegawai
                <small>Data Pegawai</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Manajemen Pegawai</a></li>
                <li class="active">Data Pegawai</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box box-solid' style="height:auto;padding:10px;">
                <div class='box-header'>
                </div><!-- /.box-header -->
                <div class='box-body table-responsive'>
                    <?php 
                    if(empty($sales_sess)) {
                        echo anchor('pegawai/create/','Tambah',array('class'=>'btn btn-success btn-flat'));
                    }
                    ?>
                    <div class="pull-right">
                        <?php echo anchor(site_url('pegawai/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-flat"'); ?>
                        <?php echo anchor(site_url('pegawai/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-flat"'); ?>
                        <!--<?php echo anchor(site_url('pegawai/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-flat"'); ?>-->
                    </div>
                    <hr>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                    		    <th>NIP</th>
                    		    <th>Nama</th>
                                <th>OPD</th>
                                <th>Email</th>
                                <th>Foto</th>
                    		    <th>Action</th>
                            </tr>
                        </thead>
            	       <tbody>
                            <?php
                            $start = 0;
                            foreach ($pegawai_data as $pegawai)
                            {
                                ?>
                                <tr>
                        		    <td><?php echo ++$start ?></td>
                        		    <td><?php echo $pegawai->Nip ?></td>
                        		    <td><?php echo $pegawai->NamaPegawai ?></td>
                                    <td><?php echo $pegawai->KodeOrganisasi."-".$pegawai->NamaOrganisasi ?></td>
                                    <td><?php echo $pegawai->Email ?></td>
                                    <td><a href="<?php echo base_url(); ?>upload/pegawai/<?php echo $pegawai->Foto; ?>" target="_blank"><img style="width:100px;" src="<?php echo base_url(); ?>upload/pegawai/<?php echo $pegawai->Foto; ?>" class="img-circl" alt=" " /></a></td>
                        		    <td style="text-align:center" width="140px">
                        			<?php 
                        			//echo anchor(site_url('pegawai/read/'.$pegawai->IdPegawai),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-xs')); 
                                    if(empty($teknisi_sess)) {
                            			echo '  '; 
                            			echo anchor(site_url('pegawai/update/'.$pegawai->IdPegawai),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-xs')); 
                            			echo '  '; 
                            			echo anchor(site_url('pegawai/delete/'.$pegawai->IdPegawai),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                    }
                        			?>
                        		    </td>
                	        </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>-->
                    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#mytable").DataTable({"aLengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ] });
                        });
                    </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        