<?php
$testListTable = CustomPlugin::submit_handler();
$entry = CustomPlugin::get_entry();

$name = $entry ? $entry[0]->name : "";
$username = $entry ? $entry[0]->username : "";
$email = $entry ? $entry[0]->email : "";
$lbl_btn_submit = $entry ? CustomPlugin::_r('Editar registro') : CustomPlugin::_r('Añadir registro');
$description = $entry ? CustomPlugin::_r('Editar un registro previamente seleccionado.') : CustomPlugin::_r('Crear un nuevo registro en este sitio.');

?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo CustomPlugin::title(); ?></h1>
    <a href=<?php echo CustomPlugin::get_all_entries_link() ?> class="page-title-action button-secondary button">
        <?php CustomPlugin::_('Ver entradas'); ?>
    </a>

    <h3><?php echo $lbl_btn_submit; ?></h3>
    <p><?php echo $description; ?></p>
    

    <form class="form-table" method='post' action=''>
    <table>
        <tr class="form-required">
            <th scope="row">
                <label for="txt_name"><?php CustomPlugin::_('Nombre'); ?></label>
                <br>
                <span class="description">(<?php CustomPlugin::_('requerido'); ?>)</span>
            </th>
            <td><input class="regular-text validate[required]" name="txt_name" type="text" aria-required="true" value="<?php echo $name;?>" autofocus required /></td>
        </tr>

        <tr class="form-required">
            <th scope="row">
                <label for="txt_uname"><?php CustomPlugin::_('Usuario'); ?></label>
                <br>
                <span class="description">(<?php CustomPlugin::_('requerido'); ?>)</span>
            </th>
            <td><input class="regular-text validate[required]" name="txt_uname" type="text" aria-required="true" value="<?php echo $username;?>" autofocus required/></td>
        </tr>

        <tr class="form-required">
            <th scope="row">
                <label for="user_name"><?php CustomPlugin::_('Email'); ?></label>
                <br>
                <span class="description">(<?php CustomPlugin::_('requerido'); ?>)</span>
            </th>
            <td><input class="regular-text validate[required]" name="txt_email" type="text" aria-required="true" value="<?php echo $email;?>" autofocus required/></td>
        </tr>
        
        <td>&nbsp;</td>
        <td><input class="button-primary button" type='submit' name='but_submit' value='<?php echo $lbl_btn_submit; ?>'></td>
        </tr>
    </table>
    </form>
</div>