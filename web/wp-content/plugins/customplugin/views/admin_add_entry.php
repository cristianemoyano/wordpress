<?php $testListTable = CustomPlugin::submit_handler(); ?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php CustomPlugin::_('Custom Plugin'); ?></h1>
    <a href=<?php echo get_admin_url() . 'admin.php?page=allentries' ?> class="page-title-action button-secondary button">Ver entradas</a>

    <h3><?php CustomPlugin::_('Añadir registro'); ?></h3>
    <p><?php CustomPlugin::_('Crear un nuevo registro en este sitio.'); ?></p>
    

    <form class="form-table" method='post' action=''>
    <table>
        <tr class="form-required">
            <th scope="row">
                <label for="txt_name"><?php CustomPlugin::_('Nombre'); ?></label>
                <br>
                <span class="description">(<?php CustomPlugin::_('requerido'); ?>)</span>
            </th>
            <td><input class="regular-text validate[required]" name="txt_name" type="text" aria-required="true" autofocus required/></td>
        </tr>

        <tr class="form-required">
            <th scope="row">
                <label for="txt_uname"><?php CustomPlugin::_('Usuario'); ?></label>
                <br>
                <span class="description">(<?php CustomPlugin::_('requerido'); ?>)</span>
            </th>
            <td><input class="regular-text validate[required]" name="txt_uname" type="text" aria-required="true" autofocus required/></td>
        </tr>

        <tr class="form-required">
            <th scope="row">
                <label for="user_name"><?php CustomPlugin::_('Email'); ?></label>
                <br>
                <span class="description">(<?php CustomPlugin::_('requerido'); ?>)</span>
            </th>
            <td><input class="regular-text validate[required]" name="txt_email" type="text" aria-required="true" autofocus required/></td>
        </tr>
        
        <td>&nbsp;</td>
        <td><input class="button-primary button" type='submit' name='but_submit' value='<?php CustomPlugin::_('Añadir registro'); ?>'></td>
        </tr>
    </table>
    </form>
</div>