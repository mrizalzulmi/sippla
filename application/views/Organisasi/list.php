        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin
                <small>Organisasi</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Admin</a></li>
                <li class="active">Organisasi</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box box-solid box-primary'>
                <div class='box-header'>
                    Daftar Organisasi
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <?php 
                    if($level_sess<>"teknisi") {
                        echo anchor('organisasi/create/','Tambah',array('class'=>'btn btn-sm btn-primary btn-flat'));
                    }
                    ?>
                    <!--
                    <div class="pull-right">
                        <?php echo anchor(site_url('organisasi/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-flat"'); ?>
                        <?php echo anchor(site_url('organisasi/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-flat"'); ?>
                        <?php echo anchor(site_url('organisasi/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-flat"'); ?>
                    </div>-->
                    <hr>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                    		    <th>Kode Organisasi</th>
                    		    <th>Nama Organisasi</th>
                    		    <th>Action</th>
                            </tr>
                        </thead>
            	       <tbody>
                            <?php
                            $start = 0;
                            foreach ($organisasi_data as $organisasi)
                            {
                                ?>
                                <tr>
                        		    <td><?php echo ++$start ?></td>
                        		    <td><?php echo $organisasi->KodeOrganisasi ?></td>
                        		    <td><?php echo $organisasi->NamaOrganisasi ?></td>
                        		    <td style="text-align:center" width="140px">
                			<?php 
                			echo anchor(site_url('organisasi/read/'.$organisasi->IdOrganisasi),'<i class="fa fa-hand-paper-o"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-xs')); 
                            if($level_sess<>"teknisi") {
                    			echo '  '; 
                    			echo anchor(site_url('organisasi/update/'.$organisasi->IdOrganisasi),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-success btn-xs')); 
                    			echo '  '; 
                    			echo anchor(site_url('organisasi/delete/'.$organisasi->IdOrganisasi),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                            }
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
        