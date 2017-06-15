<div class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <a href="<?= base_url().'admin/product/add'?>" class="btn btn-info btn-fill  pull-left"><i class="fa fa-plus"></i>&nbsp; Tambah Produk</a>
          <small>
            <table class="table table-bordered table-striped table-hover dataTable table1" style="font-size: 13px;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Kategori</th>
                  <th>Merchant</th>
                  <th>Update Terakhir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
      </tbody>
    </table>
  </small>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade"  aria-labelledby="myModalLabel" id="deleteModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <p>Menghapus produk ini berarti menghapus juga beberapa data terkait. Yakin menghapus ?</p>
        <input type="hidden" id="del_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="Delete()">Ya</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>

  </div>
</div>
<script>
var detail = url + "product";
var table = $('.table1').DataTable({
  ajax : url+"product/json",
  columns: [
    {data : null},
    { data: 'name' },
    { data: 'price' },
    { data: 'product_category' },
    { data: 'merchant_name' },
    { data: 'update_at' },
    {data: 'id'},
  ],
  dom: 'Bfrtip',
  buttons: [

  ],
  columnDefs: [
    {
      "render": function ( data, type, row ) {
        return '<a href="'+detail+'/'+data+'"  class="btn btn-fill btn-sm btn-success">Detail</a>&nbsp<button  class="btn btn-fill btn-sm btn-warning" onclick="DeleteModal(\''+data+'\')">Hapus</button>';
      },
      "targets": 6
    },
  ]
});

table.on( 'order.dt search.dt', function () {
  table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    cell.innerHTML = i+1;
  } );
} ).draw();


</script>
