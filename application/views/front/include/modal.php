<script>
    function searchModal() {
        jQuery('#searchModal').modal('show');
    }

</script>
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content ">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                
                <h4 class="modal-title">Pencarian</h4>
            </div>
            <form method="post" action="<?= base_url() . 'search_result' ?>">
                <div class="modal-body">                                                
                    <input type="text" class="form-control input-lg" id="key" name="key">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Cari">                
                </div>
            </form>
        </div>
    </div>
</div>



