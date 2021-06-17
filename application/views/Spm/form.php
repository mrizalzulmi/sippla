<?php
  $app=$this->access->get_aplikasi();
  $level=$this->access->get_level();
  $nama=$this->access->get_nama();
?>
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
                <form action="<?php echo $action; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class='box-header'>
                    <table class="table table-bordered">
                        <tr>
                            <td><img src="<?php echo base_url('assets/img/lamongan.png') ?>" width='60px'></td>
                            <td style='text-align:center;width:100%'>
                                <strong><font size="4">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KABUPATEN LAMONGAN</font><br>
                                <font size="3">UPLOAD SURAT PERINTAH MEMBAYAR (SPM)</font></strong><br>
                                <font size="4"><?php echo $org_nama ?></font>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box-header -->
                <div class="box-body">  
                    <div class="col-sm-8">
                        <!--<table class="table table-condensed" style="border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;">-->
                        <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <td colspan="2" ><h3><u><label class="col-xs-12 control-label"><?php if($button=='Revisi') {echo 'REVISI';} else if($button=='Update') {echo 'UPDATE';} else {echo '';} ?> UPLOAD SURAT PERINTAH MEMBAYAR</label></u></h3></td>
                            </tr>
                            <tr>
                                <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Nomor SPM</label></td>
                                <td>
                                    <div class="col-sm-12">          
                                        <input type="text" class="form-control" id="NoSpm" name="NoSpm" value="<?php echo $NoSpm; ?>" placeholder="Nomor SPM"> 
                                        <?php echo form_error('NoSpm') ?>
                                    </div>
                                </td>
                            </tr>
                            <!--
                            <tr>
                                <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Jenis SPM</label></td>
                                <td>
                                    <div class="col-sm-6">
                                        <select data-placeholder="Pilih Jenis SPM..." class="select2" style="width: 100%;" tabindex="2" name="Jenis" id="Jenis" >
                                            <option value=""></option> 
                                            <?php
                                                foreach($data_jenis->result_array() as $dp)
                                                {
                                                $pilih='';
                                                if($dp['Jenis']==$Jenis)
                                                {
                                                $pilih='selected="selected"';
                                            ?>
                                                <option value="<?php echo $dp['Jenis']; ?>" <?php echo $pilih; ?>><?php echo $dp['Jenis'].' - '.$dp['Keterangan']; ?></option>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <option value="<?php echo $dp['Jenis']; ?>"><?php echo $dp['Jenis'].' - '.$dp['Keterangan']; ?></option>
                                            <?php
                                            }
                                                }
                                            ?>
                                        </select>
                                        <?php echo form_error('Jenis') ?>
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
                                    <div class="col-sm-4">
                                        <div class="input-group">             
                                            <input type="text" class="form-control datepicker" id="Tanggal" name="Tanggal" value="<?php echo $Tanggal; ?>" placeholder=""> 
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
                                    <div class="col-sm-12">
                                        <select data-placeholder="Pilih Verifikator" class="select2" style="width: 100%;" tabindex="2" name="IdVerifikator" id="IdVerifikator" >
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
                                <td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Upload File</label></td>
                                <td>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" id="FileUp" name="FileUp" accept="application/pdf" />
                                                <label class="custom-file-label">Silakan Upload File PDF</label>
                                            </div>
                                        </div>
                                        <?php echo form_error('FileUp') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <!--<td width="25%" style="padding-left:20px"><label class="col-sm-12 control-label">Upload File</label></td>-->
                                <td colspan="2">
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
                                        <input type="hidden" id="FileUp" name="FileUp" value="<?php echo $FileUp; ?>" />
                                        <embed src="<?php echo site_url('upload/'.$filepath.'/'.$FileUp) ?>" type="application/pdf" width="100%" height="600px" />
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%" style="padding-left:20px"></td>
                                <td>
                                    <div class="col-sm-5">
                                    <?php if(empty($disable)) { ?>
                                        <input type="hidden" name="IdSpm" value="<?php echo $IdSpm; ?>" />
                                        <input type="hidden" name="IdOrganisasi" value="<?php if(!empty($org_sess)) { echo $org_sess; } else { echo $IdOrganisasi; } ?>" />
                                        <button type="submit" class="btn btn-primary btn-flat"><?php echo $button ?></button>
                                    <?php } ?>
                                        <a href="<?php echo site_url('spm/upload') ?>" class="btn btn-default btn-flat">Kembali</a>
                                    </div>
                                </td>
                            </tr>                        
                            
                        </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <section class="sidebar">
                            <ul class="sidebar-menu" style="background-color:#33f;">
                                <li class="treeview-active" style="background-color:#a33;">
                                    <a href="#">
                                        <span>DONWLOAD CHECK LIST & ADOBE ACROBAT</span>
                                    </a>
                                </li>
                                <li class="treeview">
                                    <a href="<?php echo site_url('download/CHECK_LIST.xlsx') ?>">
                                        <i class="fa fa-file"></i>
                                        <span>CHECK LIST</span>
                                        <i class="fa fa-download pull-right"></i>
                                    </a>
                                </li>
                                <li class="treeview">
                                    <a href="<?php echo site_url('download/Adobe_Acrobat_10.1.2_Pro.exe') ?>">
                                        <i class="fa fa-file"></i>
                                        <span>ADOBE ACROBAT PRO 10</span>
                                        <i class="fa fa-download pull-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <br>
                            <ul class="sidebar-menu" style="background-color:#33f;">
                                <li class="treeview-active" style="background-color:#334;">
                                    <a href="#">
                                        <span>FILE YANG HARUS DIUPLOAD (dalam 1 File PDF)</span>
                                    </a>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM LSG</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. e-Billing</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. e-SPT</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. Bukti Setor BAZNAS</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 7. Rekap Kulit SIM Gaji</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 8. Daftar Mutasi Pegawai</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 9. DPA/DPPA (halaman terkait & berstabilo)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM HR</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. Daftar Penerima Honorarium</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Daftar Uraian Mutasi Pegawai</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. DPA/DPPA (halaman terkait & berstabilo)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM BTLNG</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. e-Billing</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Daftar Penerima Honorarium</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. SPTJB Mutlak (TPP)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 7. SK (Lampiran SK Nama Penerima)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 8. Rekom BKD (TPP)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 9. DPA/DPPA (halaman terkait & berstabilo)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM UP</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. Perhitungan UP</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Surat Pernyataan Tanggung Jawab PA/KPA</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. Rekom Akuntansi & Aset</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM GU</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. SPTJB Manual (ada kolom penerima/toko)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Pertanggungjawaban UP/GU</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. Surat Pernyataan Pengajuan SPP-GU (ttd PA/KPA)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 7. Rekening Koran (halaman saldo)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 8. Rekom Akuntansi & Aset</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 9. Menyerahkan Fotocopy SPJ GU (tdk discan)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM LSP</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. e-Billing</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Daftar Penerima Honorarium/Rekap</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. SK (Lampiran SK Nama Penerima)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 7. DPA/DPPA (halaman terkait & berstabilo)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM LSB Barang</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. Referensi Bank</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. e-Billing</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. Faktur</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 7. Nota/Kwitansi</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 8. BAST + Lampiran</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 9. DPA/DPPA (halaman terkait & berstabilo)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM LSB Jasa</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. e-Billing</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Daftar Penerima Honorarium & Rekap</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. SK (Lampiran SK Nama Penerima)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 7. DPA/DPPA (halaman terkait & berstabilo)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM LSB Rutin (BBM, Listrik dll)</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. e-Billing</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Tagihan & Rekap</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. Kwitansi (BBM)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 7. DPA/DPPA (halaman terkait & berstabilo)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM LSPT</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. Referensi Bank</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. e-Billing</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. SKB & bukti pembayaran pajak</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 6. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 7. Faktur (jika ada)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 8. Nota/Kwitansi</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 9. BAST + Lampiran</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 10. Jaminan Bank / Asuransi (jika ada)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 11. DPA/DPPA (halaman terkait & berstabilo)</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-copy"></i>
                                        <span>SPM TU</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-file"></i> 1. SPM (bertandatangan dan stempel)</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 2. Surat Pernyataan Tanggung Jawab</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 3. Check List</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 4. Surat Pernyataan TU</a></li>
                                        <li><a href="#"><i class="fa fa-file"></i> 5. Surat keterangan Penjelasan Keperluan TU</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </section>
                    </div>
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
