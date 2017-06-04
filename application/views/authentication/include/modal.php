<?php //$this->load->view('admin/pages/include/main');   ?>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Keluar</h4>
            </div>
            <div class="modal-body">                
                Anda yakin untuk keluar ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="logoutProcess()">Ya</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

