<div id="content">
  <div class="container">
    <div class="call-action call-action-boxed call-action-style1 clearfix">
      <h4 class="primary"><strong>Beranda / Semua Merchant  </strong> (<?=count($merchant_data)?>) </h4>
    </div>
    <br>
    <?php
    if(isset($merchant_data)){
      foreach($merchant_data as $each){
    ?>
    <div class="col-md-6 " style="margin-right:2px;">
      <div class="lib-panel">
        <div class="row box-shadow">
          <div class="col-md-6">
            <img class="lib-img-show" src="">
          </div>
          <div class="col-md-6">
            <div class="lib-row lib-header">
              Example library
              <div class="lib-header-seperator"></div>
            </div>
            <div class="lib-row lib-desc">
              Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      }
    }?>

  </div>
</div>


<style>


.lib-panel {
  margin-bottom: 20Px;
}
.lib-panel img {
  width: 100%;
  background-color: transparent;
}

.lib-panel .row,
.lib-panel .col-md-6 {
  padding: 0;
  background-color: #FFFFFF;
}


.lib-panel .lib-row {
  padding: 0 20px 0 20px;
}

.lib-panel .lib-row.lib-header {
  background-color: #FFFFFF;
  font-size: 20px;
  padding: 10px 20px 0 20px;
}

.lib-panel .lib-row.lib-header .lib-header-seperator {
  height: 2px;
  width: 26px;
  background-color: #d9d9d9;
  margin: 7px 0 7px 0;
}

.lib-panel .lib-row.lib-desc {
  position: relative;
  height: 100%;
  display: block;
  font-size: 13px;
}
.lib-panel .lib-row.lib-desc a{
  position: absolute;
  width: 100%;
  bottom: 10px;
  left: 20px;
}

.row-margin-bottom {
  margin-bottom: 20px;
}

.box-shadow {
  -webkit-box-shadow: 0 0 4px 0 rgba(0,0,0,.10);
  box-shadow: 0 0 4px 0 rgba(0,0,0,.10);
}

.no-padding {
  padding: 0;
}

</style>
