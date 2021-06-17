<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Admin <small> Organisasi</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Organisasi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class='box box-solid box-primary'>
                <div class='box-header'>
                    Form Organisasi
                </div><!-- /.box-header -->
                <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body" style="padding:20px;">  
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Organisasi </label>
                        <div class="col-sm-4">
                            <input type="text" id="KodeOrganisasi" name="KodeOrganisasi" class="form-control input-sm" placeholder="Kode organisasi" value="<?php echo $KodeOrganisasi; ?>" <?php echo $disable; ?>>
                        </div>
                        <div class="col-sm-3"><?php echo form_error('KodeOrganisasi') ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Organisasi </label>
                        <div class="col-sm-7">
                            <input type="text" id="NamaOrganisasi" name="NamaOrganisasi" class="form-control input-sm" placeholder="Nama organisasi" value="<?php echo $NamaOrganisasi; ?>" <?php echo $disable; ?>>
                        </div>
                        <div class="col-sm-3"><?php echo form_error('NamaOrganisasi') ?></div>
                    </div>              
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <?php 
                        if(empty($disable)) { ?>
                            <input type="hidden" name="IdOrganisasi" value="<?php echo $IdOrganisasi; ?>" />
                            <button type="submit" class="btn btn-primary btn-sm btn-flat"><?php echo $button ?></button>
                        <?php } ?>
                            <a href="<?php echo site_url('organisasi') ?>" class="btn btn-default btn-sm btn-flat">Cancel</a>
                    </div>
                </div>      
                </form>
            </div>
        </div>
    </div>
</section>