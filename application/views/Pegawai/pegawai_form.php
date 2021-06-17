<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Manajemen Pegawai <small>Data Pegawai</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manajemen Pegawai</a></li>
        <li class="active">Data Pegawai</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class='box box-solid' style="height:auto;padding:10px;">
                <form action="<?php echo $action; ?>" method="post" class="form-horizontal" accept-charset="utf-8" enctype="multipart/form-data">
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
                            <div class="col-sm-5">
                                <input type="text" id="TempatLahir" name="TempatLahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $TempatLahir; ?>">
                            </div>
                            <div class="col-sm-3"><?php echo form_error('TempatLahir') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Tanggal Lahir </label>
                            <div class="col-sm-2">
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
                            <div class="col-sm-5">
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
                        <?php 
                        //if(empty($pegawai)) {
                        ?>
                        <div class="form-group"> 
                            <label class="col-sm-2">Username </label>
                            <div class="col-sm-5">
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" <?php if(!empty($pegawai)) { echo "readonly"; } ?> >
                            </div>
                            <div class="col-sm-3"><?php echo form_error('username') ?></div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-sm-2">Password </label>
                            <div class="col-sm-5">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
                                <!--<input type="checkbox" onclick="myFunction()">Show Password-->
                            </div>
                            <div class="col-sm-3"><?php echo form_error('password') ?></div>
                        </div>
                        <?php
                        //}
                        ?>        
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <input type="hidden" name="IdPegawai" value="<?php echo $IdPegawai; ?>" />
                            <button type="submit" class="btn btn-primary btn-flat"><?php echo $button ?></button>
                            <a href="<?php echo site_url('pegawai') ?>" class="btn btn-default btn-flat">Cancel</a>
                        </div>
                    </div>      
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function (e) {
        // Function to preview image after validation
        $(function() {
            $("#Foto").change(function() {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                {
                    $('#previewing').attr('src','noimage.png');
                    $("#message").html("<p id='error'>Hanya File Gambar yang bisa diupload (jpeg, jpg dan png) </p>");
                    return false;
                }else{
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            $("#Foto").css("color","#FFFFFF");
            $('#image_preview').css("display", "block");
            $('#previewing').attr('src', e.target.result);
            $('#previewing').attr('width', '100px');
            /*$('#previewing').attr('height', '140px');*/
        };

    });
</script>

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