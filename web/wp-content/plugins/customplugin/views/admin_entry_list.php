<?php $testListTable = CustomPlugin::prepare_table(); ?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo CustomPlugin::title(); ?></h1>
    <a href=<?php echo CustomPlugin::get_new_entry_link() ?> class="page-title-action button-secondary button">
        <?php CustomPlugin::_('Agregar'); ?>
    </a>

    <h3><?php CustomPlugin::_('Registros'); ?></h3>
    <p><?php CustomPlugin::_('Listado de registros realizados en este sitio.'); ?></p>

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
</div>
