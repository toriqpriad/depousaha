<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group btn-breadcrumb ">
          <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
          <a href="<?=base_url().'merchant'?>" class="btn btn-default btn-sm">Semua Merchant</a>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <?php
      if(isset($merchant_data)){
        foreach($merchant_data as $each){
          ?>
          <div class="col-lg-3">
            <div class="card hovercard" >
              <div class="cardheader" style="background: url('<?=$each->cover?>');">

              </div>
              <div class="avatar">
                <img alt="" src="<?=$each->logo?>">
              </div>
              <div class="info">
                <div class="title">
                  <a target="_blank" href="<?=$each->link?>"><?=$each->name?></a>
                </div>
                <div class="desc">
                  <?php
                  if(isset($each->description)){
                    if(strlen($each->description) > 20){
                      echo mb_substr($each->description, 0, 100).'.....';
                    } else if($each->description == ''){
                      echo '<br><br><br>';
                    }
                  }
                ?></div>
              </div>
            </div>

          </div>
          <?php
        }
      }?>

    </div>
    <center><?=$pagination?></center>
  </div>
</div>

<
