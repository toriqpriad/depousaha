<div class="call-action call-action-boxed call-action-style1 no-descripton clearfix">
  <div class="container">
    <form  method="post" action="<?=base_url().'search'?>">
       <div class="input-group">
               <div class="input-group-btn search-panel">
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="category">
                     <span id="search_concept">Pilih Kategori</span> <span class="caret"></span>
                   </button>
                     <?php
                     if(isset($menu)){
                       echo '<ul class="dropdown-menu">';                       
                       foreach($menu_category as $each){
                         echo '<li><a href="#" value="'.$each->id.'">'.$each->name.'</a></li>';
                       }
                       echo '</ul>';
                     }
                     ?>

               </div>

               <input type="hidden" name="category" id="category">
               <input type="text" class="form-control"  placeholder="Pencarian" name="keyword" >
               <span class="input-group-btn">
                   <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
               </span>
           </div>
      </form>
    </div>

</div>

<script>
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
    var value = $(this).attr("value");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
    $('#category').val(value);
	});
});
</script>
