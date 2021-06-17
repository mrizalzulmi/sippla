<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu OPD</a></li>
        <li><a href="#">Upload Dokumen SPM</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class='box box-solid'>
                <form action="<?php echo $action; ?>" method="post">
                <div class='box-header'>
                    <table class="table table-bordered">
                        <tr>
                            <td><img src="<?php echo base_url('assets/img/lamongan.png') ?>" width='60px'></td>
                            <td style='text-align:center;width:100%'>
                                <strong><font size="4">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KABUPATEN LAMONGAN</font><br>
                                <font size="3">PENOMORAN SURAT PERINTAH PENCAIRAN DANA (SP2D)</font></strong><br>
                                <font size="4"><?php echo $org_nama ?></font>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box-header -->
                <div class="box-body">  
                    <table class="table table-condensed">
                    <tbody>
                        <tr>                            
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Nomor SP2D</label></td>
                            <td>
                                <div class="col-sm-12">          
                                    <input type="text" class="form-control" id="NoSp2d" name="NoSp2d" value="" placeholder="Isikan Nomor SP2D"> 
                                    <?php echo form_error('NoSp2d') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Tanggal SP2D</label></td>
                            <td>
                                <div class="col-sm-3">
                                    <div class="input-group">             
                                        <input type="text" class="form-control datepicker" id="TanggalSp2d" name="TanggalSp2d" value="" placeholder=""> 
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>

                                    </div><!-- /.input group -->
                                    <?php echo form_error('TanggalSp2d') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding-left:20px"></td>
                            <td>
                                <div class="col-sm-5">
                                <?php if(empty($disable)) { ?>
                                    <input type="hidden" name="IdSpm" value="<?php echo $IdSpm; ?>" />
                                    <input type="hidden" name="IdOrganisasi" value="<?php if(!empty($org_sess)) { echo $org_sess; } else { echo $IdOrganisasi; } ?>" />
                                    <button type="submit" class="btn btn-primary btn-flat"><?php echo $button1 ?></button>
                                <?php } ?>
                                    <a href="<?php echo site_url('spm/verifikasi') ?>" class="btn btn-default btn-flat">Batal</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    <br>
                    <div class='box box-info'>
                        <div class="box-header with-border">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title">Preview Pengajuan SPM</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                    <!--<table class="table table-condensed" style="border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;">-->
                    <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Nomor SPM</label></td>
                            <td>
                                <div class="col-sm-8">          
                                    <input type="text" class="form-control" id="NoSpm" name="NoSpm" value="<?php echo $NoSpm; ?>" placeholder="Nomor SPM" disabled> 
                                    <?php echo form_error('NoSpm') ?>
                                </div>
                            </td>
                        </tr>
                        <!--
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Tipe</label></td>
                            <td>
                                <div class="col-sm-12">
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
                                            <option value="<?php echo $dp['Tipe']; ?>" <?php echo $pilih; ?>><?php echo $dp['Tipe'].' - '.$dp['Keterangan']; ?></option>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <option value="<?php echo $dp['Tipe']; ?>"><?php echo $dp['Tipe'].' - '.$dp['Keterangan']; ?></option>
                                        <?php
                                        }
                                            }
                                        ?>
                                    </select>
                                    <?php echo form_error('Tipe') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Program</label></td>
                            <td>
                                <div class="col-sm-12">
                                    <select data-placeholder="Pilih Program Kerja..." class="select2" style="width: 100%;" tabindex="2" name="IdProgram" id="IdProgram" >
                                        <option value=""></option> 
                                        <?php
                                            foreach($data_program->result_array() as $dp)
                                            {
                                            $pilih='';
                                            if($dp['IdProgram']==$IdProgram)
                                            {
                                            $pilih='selected="selected"';
                                        ?>
                                            <option value="<?php echo $dp['IdProgram']; ?>" <?php echo $pilih; ?>><?php echo $dp['KodeProgram'].' - '.$dp['NamaProgram']; ?></option>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <option value="<?php echo $dp['IdProgram']; ?>"><?php echo $dp['KodeProgram'].' - '.$dp['NamaProgram']; ?></option>
                                        <?php
                                        }
                                            }
                                        ?>
                                    </select>
                                    <?php echo form_error('IdProgram') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Kegiatan</label></td>
                            <td>
                                <div class="col-sm-12">
                                    <select data-placeholder="Pilih Kegiatan..." class="select2" style="width: 100%;" tabindex="2" name="IdKegiatan" id="IdKegiatan" >
                                        <option value=""></option> 
                                        <?php
                                            foreach($data_kegiatan->result_array() as $dp)
                                            {
                                            $pilih='';
                                            if($dp['IdKegiatan']==$IdKegiatan)
                                            {
                                            $pilih='selected="selected"';
                                        ?>
                                            <option value="<?php echo $dp['IdKegiatan']; ?>" <?php echo $pilih; ?>><?php echo $dp['KodeKegiatan'].' - '.$dp['NamaKegiatan']; ?></option>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <option value="<?php echo $dp['IdKegiatan']; ?>"><?php echo $dp['KodeKegiatan'].' - '.$dp['NamaKegiatan']; ?></option>
                                        <?php
                                        }
                                            }
                                        ?>
                                    </select>
                                    <?php echo form_error('IdKegiatan') ?>
                                </div>
                            </td>
                        </tr>
                        -->
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Tanggal</label></td>
                            <td>
                                <div class="col-sm-3">
                                    <div class="input-group">             
                                        <input type="text" class="form-control datepicker" id="Tanggal" name="Tanggal" value="<?php echo $Tanggal; ?>" placeholder="" disabled> 
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>

                                    </div><!-- /.input group -->
                                    <?php echo form_error('Tanggal') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Verifikator</label></td>
                            <td>
                                <div class="col-sm-8">
                                    <select data-placeholder="Pilih Verifikator" class="select2" style="width: 100%;" tabindex="2" name="IdVerifikator" id="IdVerifikator" disabled>
                                        <option value=""></option> 
                                        <?php
                                            foreach($data_verifikator->result_array() as $dp)
                                            {
                                            $pilih='';
                                            if($dp['IdPegawai']==$IdVerifikator)
                                            {
                                            $pilih='selected="selected"';
                                        ?>
                                            <option value="<?php echo $dp['IdPegawai']; ?>" <?php echo $pilih; ?>><?php echo $dp['NamaPegawai']; ?></option>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <option value="<?php echo $dp['IdPegawai']; ?>"><?php echo $dp['NamaPegawai']; ?></option>
                                        <?php
                                        }
                                            }
                                        ?>
                                    </select>
                                    <?php echo form_error('IdVerifikator') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">File PDF</label></td>
                            <td>
                                <div class="col-sm-12">
                                    <?php 
                                    if(!empty($FileUp)) { 
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
                                        <embed src="<?php echo site_url('upload/'.$filepath.'/'.$FileUp) ?>" type="application/pdf" width="100%" height="600px" />
                                    <?php } ?>
                                    <?php echo form_error('FileUp') ?>
                                </div>
                            </td>
                        </tr>
                        <!--
                        <tr>
                            <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Kasubid</label></td>
                            <td>
                                <div class="col-sm-8">
                                    <select data-placeholder="Pilih Kasubid" class="select2" style="width: 100%;" tabindex="2" name="IdKasubid" id="IdKasubid">
                                        <option value=""></option> 
                                        <?php
                                            foreach($data_kasubid->result_array() as $dp)
                                            {
                                            $pilih='';
                                            if($dp['IdPegawai']==$IdKasubid)
                                            {
                                            $pilih='selected="selected"';
                                        ?>
                                            <option value="<?php echo $dp['IdPegawai']; ?>" <?php echo $pilih; ?>><?php echo $dp['NamaPegawai']; ?></option>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <option value="<?php echo $dp['IdPegawai']; ?>"><?php echo $dp['NamaPegawai']; ?></option>
                                        <?php
                                        }
                                            }
                                        ?>
                                    </select>
                                    <?php echo form_error('IdKasubid') ?>
                                </div>
                            </td>
                        </tr>
                        -->           
                        </div>
                        </div>         
                        
                    </tbody>
                    </table>
                </div>
                <!--
                <div class="box-footer">
                        <?php if(empty($disable)) { ?>
                            <input type="hidden" name="IdKegiatan" value="<?php echo $IdKegiatan; ?>" />
                            <button type="submit" class="btn btn-primary btn-flat"><?php echo $button ?></button>
                        <?php } ?>
                            <a href="<?php echo site_url('spm') ?>" class="btn btn-default btn-flat">Kembali</a>
                        <?php if($button=='Update') { ?>
                            <a href="<?php echo site_url('spm_detail/index/'.$IdKegiatan) ?>" class="btn btn-success btn-flat">Ke Pintu 2</a>
                        <?php } ?>
                </div>      
                -->
                </form>
            </div>
        </div>
    </div>
</section>
