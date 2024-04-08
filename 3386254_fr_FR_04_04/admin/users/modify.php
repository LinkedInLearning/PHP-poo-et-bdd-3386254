<?php

require_once '../../config/config.php';

use Classes\User;
$title ="modifier un utilisateur";

if(!$_GET['id']){
  header('Location: show.php');
}

require_once INCLUDES_ROOT.'/header.php';

if(!empty($_POST)){

    $parameters = [];
    $parameters['firstname'] = ($_POST['firstname'])? $_POST['firstname'] : null;
    $parameters['lastname'] = ($_POST['lastname'])? $_POST['lastname'] : null;
    $parameters['email'] = ($_POST['email'])? $_POST['email'] : null;
    $parameters['password'] = ($_POST['password'])? $_POST['password'] : null;

    $user = new User($parameters);
    $user->merge_attributes();
    $user->validation();
    $user->update($_GET['id']);
    
}

$user = User::find_by_id($_GET['id']);


?>
<form action="#" method="POST">
  <div class="form-group">
    <label for="title">firstname</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user->firstname; ?>">
  </div>
  <div class="form-group">
    <label for="lastname">lastname</label>
    <input type="text" id="lastname" rows="3" name="lastname" class="form-control" value="<?php echo $user->lastname; ?>">
  </div>
  <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" id="email" name="email"  value="<?php echo $user->email; ?>">
  </div>
  <div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <input type="submit" name="submit">
  </div>
</form>


<?php
require_once INCLUDES_ROOT.'/footer.php';
?>