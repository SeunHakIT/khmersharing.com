<?php ob_start(); ?>
      <?php  
      $find="";
      if(isset($_GET['filter'])){
        $find=$_GET['find'];
        header("Location:search.php?s=$find");
      }
      ?>
      <div id="search">
        <div class="search-content">
          <form method="get" id="searchform" action="">
            <input type="hidden" value="search" name="rs">
            <input class="form-control search-input" type="text" placeholder="Searching..." name="find" id="s" value="">
            <button type="submit" name ="filter">
              <i class="fa fa-search"></i>
            </button>

          </form>
        </div>
      </div>
