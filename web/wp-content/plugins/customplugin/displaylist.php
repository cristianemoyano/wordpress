<?php

include( plugin_dir_path(__FILE__) . 'table.php');

//Create an instance of our package class...
$testListTable = new Entry_Table();
//Fetch, prepare, sort, and filter our data...
$testListTable->prepare_items();


?>
<h1>Entradas <a href=<?php echo get_admin_url() . 'admin.php?page=addnewentry' ?> class="button-secondary button">Agregar</a></h1>


<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
<form id="entry-filter" method="get" style="width: 90%;">
    <!-- For plugins, we also need to ensure that the form posts back to our current page -->
    <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
    <!-- Now we can render the completed list table -->
    <?php 
        $testListTable->search_box("Buscar", "name");
        $testListTable->display();
        
    ?>
    
</form>
