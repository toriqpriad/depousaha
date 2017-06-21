<div class="call-action call-action-boxed call-action-style1 no-descripton clearfix">
  <div class="container">
    <form action="#">
      <div class="col-md-10 pull-left">
        <input type="search" placeholder="Pencarian ... " class="form-control input-lg">
      </div>
      <div class="col-md-2">
        <div class="dropdown">
          <button class="btn btn-block btn-green btn-success btn-lg border-btn dropdown-toggle" type="button" data-toggle="dropdown">Pilih Kategori
          </button>
          <?php
          if(isset($menu)){
            echo '<ul class="dropdown-menu">';
            foreach($menu_category as $each){
              echo '<li><a href="#">'.$each->name.'</a></li>';
            }
            echo '</ul>';
          }
          ?>
        </div>
      </div>
    </div>
  </form>
</div>
