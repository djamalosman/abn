<?php echo $this->session->flashdata('message'); ?>
<style type="text/css">
/* CDN Font Awesome :
https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css */

.open-modal {
    cursor: pointer;
    /*color:#;*/
    font-size: 15px;
}

#mask {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none;
    background: black;
    z-index: 98;
    opacity: 0.8;
}

.modal {
    background-color: #fff;
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    width: 400px;
    height: 300px;
    margin-left: -200px;
    margin-top: -150px;
    padding: 50px;
    z-index: 99;
}

.close-modal {
    color: #000;
    text-decoration: none;
    float: right;
    position: absolute;
    top: 10px;
    right: 20px
}

@media (max-width : 37.500rem) {
    .modal {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 1.250rem
    }

    .close-modal {
        display: block;
        position: relative;
        padding: 5px 10px 20px 0
    }

    .modal-content {
        clear: both;
        padding-right: 1.25rem
    }
}

input:valid {
    color: black;
}

input:invalid {
    color: red;
}
a {
    color: white;
}

</style>

<div class="container-fluid">
    <?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'") ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <div class="panel-heading" style="background-color :#1f3983;">
                    <h4 class="panel-title"><?php echo $pagename ?></h4>
                </div>
                <div class="panel-body">
                   
                        <div class=" form-group">
                            <?php if($welcome !=null){ ?>
                            
                            <?php } else {?>
                                <div class="btn-group mr10 mb10 col-lg-3">
                                    <button class="btn" style="background-color: #1f3983;"><a href="<?php echo base_url('welcomecreate')?>">Create</a></button>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <table id="example"
                                        class="table table-bordered table-striped table-hover dt-responsive non-responsive">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>Aksi</th>
                                                <th>Text slide atas</th>
                                                <th>Text slide bawah</th>
                                                <th>Tanggal input data</th>
                                                <th>Nama file</th>

                                            </tr>
                                        </thead>

                                        <?php foreach ($welcome as $item) { ?>
                                        <tr>
                                            <td>
                                                <a title="Edit"
                                                    href="<?php echo base_url("welcome/veditwelcome/" . $item->code_image . '-' . $item->id_welcome) ?>"><i
                                                        class="fa fa-pencil"  style="color: #1f3983;" aria-hidden="true"></i></a>
                                            </td>
                                            
                                            <td><?php echo $item->textslidesatu ?></td>
                                            <td><?php echo $item->textslidedua ?></td>
                                            <td><?php echo $item->tanggal_insert ?></td>
                                            <td><?php echo $item->name_file ?></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                   
                </div>
            </div>
        </div>
        <div class="col-lg-12">

        </div>
    </div>
    <br>
    <br>

    <?php echo form_close() ?>
</div>
<br>
<br>

<div class="tmpl-loading" style="
     /*min-width: 240px;*/ 
     display: none;
     position: fixed;
     width: 100%; 
     height: 100%; 
     left: 0px;
     /*background: gray;*/
     /*opacity: 0.5;*/
     top: 0px;
     ">
    <div style="
          border: 2px solid black; 
          margin: 0px auto 0px auto;
          padding-top: 35px;
          position: absolute;
          /*opacity: 0.99;*/
          background: white;
          width: 240px;
          height: 100px;
          position: fixed;
          left: calc(50% - 120px);
          top: calc(50% - 150px);    

          -webkit-border-radius: 10px; 

          /* Firefox 1-3.6 */
          -moz-border-radius: 10px; 

          /* Opera 10.5, IE 9, Safari 5, Chrome, Firefox 4, iOS 4, Android 2.1+ */
          border-radius: 10px;             
          ">
        <p class="text-center" style="font-size: 21pt"><strong><i class="fa fa-spinner fa-spin"></i> Sending...
            </strong></p>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                //"scrollX": true,   
                "columnDefs": [{
                        "targets": [0], //first column / numbering column
                        "orderable": false //set not orderable

                    }],
                "order": [[1, "asc"]]
            });
        });
    </script>






<script type="text/javascript">

		function delet() {
            //event.preventDefault(); // prevent form submit
            var form = $('#delet');//event.target.form; // storing the form
            Swal.fire({
                title: 'Anda Yakin ?',
                text: "Ingin Menghapus Data Ini ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                } else {
                    swal({
                        position: 'top',
                        title: 'Cancel',
                        text: 'Anda Tidak Jadi Menghapus',
                        type: 'error',
                        showConfirmButton: false,
                        timer: 1500,
                        onOpen: function () {
                            setTimeout(function () {
                                swal.close()
                            }, 2000)
                        }
                    });

                }
            })

        }

</script>