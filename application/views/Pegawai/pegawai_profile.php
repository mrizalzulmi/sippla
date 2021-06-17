<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Manajemen Pegawai <small>Profile Pegawai</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manajemen Pegawai</a></li>
        <li class="active">Profile Pegawai</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-3">

          	<!-- Profile Image -->
          	<div class="box box-primary">
            	<div class="box-body box-profile">
              		<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>upload/pegawai/<?php echo $Foto; ?>" alt="User profile picture">

              		<h3 class="profile-username text-center"><?php echo $NamaPegawai; ?></h3>

              		<p class="text-muted text-center">Kabupaten Lamongan</p>

             		<!--
             		<ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b>Followers</b> <a class="pull-right">1,322</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Following</b> <a class="pull-right">543</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Friends</b> <a class="pull-right">13,287</a>
		                </li>
              		</ul>
              		-->

              		<!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
            	</div>
            	<!-- /.box-body -->
          	</div>
          	<!-- /.box -->

          	<!-- About Me Box -->
          	<!--
          	<div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">About Me</h3>
	            </div>
	            <div class="box-body">
	              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

	              <p class="text-muted">
	                B.S. in Computer Science from the University of Tennessee at Knoxville
	              </p>

	              <hr>

	              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

	              <p class="text-muted">Malibu, California</p>

	              <hr>

	              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

	              <p>
	                <span class="label label-danger">UI Design</span>
	                <span class="label label-success">Coding</span>
	                <span class="label label-info">Javascript</span>
	                <span class="label label-warning">PHP</span>
	                <span class="label label-primary">Node.js</span>
	              </p>

	              <hr>

	              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

	              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
	            </div>
          	</div>-->
          	<!-- /.box -->
        </div>

        <!-- /.col -->
        <div class="col-md-9">
          	<div class="nav-tabs-custom">
            	<ul class="nav nav-tabs">
              		<li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
            	</ul>
            	<div class="tab-content">
	              	<div class="active tab-pane" id="profile">
	              		<form action="<?php echo $action; ?>" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	              			<div class='box box-solid' style="height:auto;padding:10px;">
	              				<div class="box-body" style="padding:20px;">
				                	<div class="form-group">
			                            <label class="col-sm-2">NIP </label>
			                            <div class="col-sm-3">
			                                <input type="text" id="Nip" name="Nip" class="form-control" placeholder="NIP" value="<?php echo $Nip; ?>">
			                            </div>
			                            <div class="col-sm-3"><?php echo form_error('Nip') ?></div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-2">Nama </label>
			                            <div class="col-sm-7">
			                                <input type="text" id="NamaPegawai" name="NamaPegawai" class="form-control" placeholder="Nama Pegawai" value="<?php echo $NamaPegawai; ?>">
			                            </div>
			                            <div class="col-sm-3"><?php echo form_error('NamaPegawai') ?></div>
			                        </div>              
			                        <div class="form-group">
			                            <label class="col-sm-2">Tempat Lahir</label>
			                            <div class="col-sm-7">
			                                <input type="text" id="TempatLahir" name="TempatLahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $TempatLahir; ?>">
			                            </div>
			                            <div class="col-sm-3"><?php echo form_error('TempatLahir') ?></div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-2">Tanggal Lahir </label>
			                            <div class="col-sm-3">
			                                <div class="input-group">
			                                    <input type="text" id="TanggalLahir" name="TanggalLahir" class="form-control datepicker" placeholder="" value="<?php if($TanggalLahir <> '') { echo $TanggalLahir; } else { echo ''; } ?>">
			                                    <div class="input-group-addon">
			                                        <i class="fa fa-calendar"></i>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="col-sm-3"><?php echo form_error('TanggalLahir') ?></div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-2">Organisasi</label>
			                            <div class="col-sm-7">
			                                <select data-placeholder="Pilih Organisasi..." class="select2" style="width: 100%;" tabindex="2" name="IdOrganisasi" id="IdOrganisasi" >
			                                    <option value=""></option> 
			                                    <?php
			                                        foreach($data_organisasi->result_array() as $dp)
			                                        {
			                                        $pilih='';
			                                        if($dp['IdOrganisasi']==$this->session->userdata("IdOrganisasi") or $dp['IdOrganisasi']==$IdOrganisasi)
			                                        {
			                                        $pilih='selected="selected"';
			                                    ?>
			                                        <option value="<?php echo $dp['IdOrganisasi']; ?>" <?php echo $pilih; ?>><?php echo $dp['KodeOrganisasi']." - ".$dp['NamaOrganisasi']; ?></option>
			                                    <?php
			                                    }
			                                    else
			                                    {
			                                    ?>
			                                        <option value="<?php echo $dp['IdOrganisasi']; ?>"><?php echo $dp['KodeOrganisasi']." - ".$dp['NamaOrganisasi']; ?></option>
			                                    <?php
			                                    }
			                                        }
			                                    ?>
			                                </select>
			                                <?php echo form_error('IdOrganisasi') ?>
			                            </div>
			                        </div>  
			                        <div class="form-group">
			                            <label class="col-sm-2">Alamat</label>
			                            <div class="col-sm-7">
			                                <textarea id="Alamat" name="Alamat" class="form-control" placeholder="Alamat"><?php echo $Alamat; ?></textarea>
			                            </div>
			                            <div class="col-sm-3"><?php echo form_error('Alamat') ?></div>
			                        </div>    
			                        <div class="form-group">
			                            <label class="col-sm-2">Email</label>
			                            <div class="col-sm-7">
			                                <input type="text" id="Email" name="Email" class="form-control" placeholder="Email" value="<?php echo $Email; ?>">
			                            </div>
			                            <div class="col-sm-3"><?php echo form_error('Email') ?></div>
			                        </div>
			                        <div class="form-group"> 
			                            <label class="col-sm-2">Foto </label>
			                            <div class="col-sm-5">                               
			                                <input type="file" name="Foto" id="Foto">
			                                <input type="hidden" name="Foto" value="<?php echo $Foto; ?>">
			                                <p class="help-block">Max. 1MB</p>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <div class="col-sm-2"></div>
			                            <div class="col-sm-5">
			                                <div id="image_preview"><img id="previewing" src="<?php echo base_url().'upload/pegawai/'.$Foto ?>" width="100" alt=" " /></div>
			                                <span id='loading'></span>
			                                <div id="message"></div>
			                            </div>
			                        </div>
			                        <div class="form-group"> 
			                            <label class="col-sm-2">Username </label>
			                            <div class="col-sm-7">
			                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" <?php if(!empty($pegawai)) { echo "readonly"; } ?> >
			                            </div>
			                            <div class="col-sm-3"><?php echo form_error('username') ?></div>
			                        </div>
			                        <div class="form-group"> 
			                            <label class="col-sm-2">Password </label>
			                            <div class="col-sm-7">
			                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
			                                <!--<input type="checkbox" onclick="myFunction()">Show Password-->
			                            </div>
			                            <div class="col-sm-3"><?php echo form_error('password') ?></div>
			                        </div>
			                    </div>
			                    <div class="box-footer">
			                        <div class="row">
			                            <div class="col-sm-2"></div>
			                            <input type="hidden" name="IdPegawai" value="<?php echo $IdPegawai; ?>" />
			                            <button type="submit" class="btn btn-primary btn-flat"><?php echo $button ?></button>
			                            <a href="<?php echo site_url('pegawai/profile/'.$IdPegawai) ?>" class="btn btn-default btn-flat">Cancel</a>
			                        </div>
			                    </div>
		                    </div>
	                    </form>
	              	</div>
            	</div>
            	<!-- /.tab-content -->
          	</div>
          	<!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
	</div>
</section>

<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    } 
</script>