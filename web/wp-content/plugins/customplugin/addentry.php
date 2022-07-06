<?php

global $wpdb;

// Add record
if(isset($_POST['but_submit'])){

  $name = $_POST['txt_name'];
  $uname = $_POST['txt_uname'];
  $email = $_POST['txt_email'];
  $tablename = $wpdb->prefix."customplugin";

  if($name != '' && $uname != '' && $email != ''){
     $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE username='".$uname."' ");
     if(count($check_data) == 0){
       $insert_sql = "INSERT INTO ".$tablename."(name,username,email) values('".$name."','".$uname."','".$email."') ";
       $wpdb->query($insert_sql);
       echo "
       <div class='alert success'>Registro guardado exitosamente.</div>
       ";
     }
   }
}

?>
<h1 class="wp-heading-inline">Agregar una nueva entrada <a href=<?php echo get_admin_url() . 'admin.php?page=allentries' ?> class="button-secondary button">Ver entradas</a></h1>

<form method='post' action=''>
  <table>
    <tr>
      <td>Nombre</td>
      <td><input type='text' name='txt_name' autofocus></td>
    </tr>
    <tr>
     <td>Usuario</td>
     <td><input type='text' name='txt_uname'></td>
    </tr>
    <tr>
     <td>Email</td>
     <td><input type='text' name='txt_email'></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><input class="woocommerce-BlankState-cta button-primary button" type='submit' name='but_submit' value='Agregar'></td>
    </tr>
 </table>
</form>