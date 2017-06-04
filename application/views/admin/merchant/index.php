<div class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <a href="<?= base_url().'admin/merchant/add'?>" class="btn btn-info btn-fill  pull-left"><i class="fa fa-plus"></i>&nbsp; Tambah Merchant</a>
          <small>
            <table class="table table-bordered table-striped table-hover dataTable table1" style="font-size: 13px;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Pemilik</th>
                  <th>Update Terakhir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                if ($records['status'] == "available") {
                  foreach ($records['data'] as $item) {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>" . $item->name . "</td>";
                    echo "<td>" . $item->owner. "</td>";
                    echo "<td>" . $item->update_at . "</td>";
                    echo "<td><a href='" . base_url() . 'admin/artikel/detail/' . $item->id . "' class='btn btn-fill btn-sm btn-success'>Detail</a>"
                    . "&nbsp;<button class='btn btn-danger btn-fill btn-sm ' onclick='Delete(" . $item->id . ")'>Hapus</button></td>";
                    echo "</tr>";
                    $no++;
                  }
                } else {
                  echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </small>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
$('.table1').DataTable({
  dom: 'Bfrtip',
  buttons: [

  ]
});
</script>
