<?php
if (isset($_SESSION['arrayError'])){
  $arrayErrors = $_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
?>
<?php require_once(ROUTE_DIR."view/inc/header.html.php"); ?>
<?php require_once(ROUTE_DIR."view/inc/menu.html.php"); ?>
<?php require_once(ROUTE_DIR."view/inc/footer.html.php"); ?>

<form action="<?=WEB_ROUTE ?>" method="POST">

<input type="hidden" name="controlleurs" value="admin"/>
<input type="hidden" name="action" value="create.admin"/>

      <div class="borne">
          <div class="bon">
    <h1 style="font-size:20px;">S'INSCRIRE</h1>
    <p style="border-bottom:2px solid grey;max-width:60%;margin-left:-0.8%;">Pour proposer des quizz</p>
    <div class="form-group">
    <?php if (isset($arrayError['arrayConnexion'])) :?>
            <div class="alert alert-danger" role="alert">
            <small><?php echo isset($arrayError['arrayConnexion']) ? $arrayError['arrayConnexion'] : ''; ?></small>
              <?php endif;?>
      <label for="">Prenom</label>
      <input type="text" class="form-control" name="prenom" id="" aria-describedby="helpId" placeholder="">
      <small><?php echo isset($arrayErrors['prenom']) ? $arrayErrors['prenom'] : ''; ?></small>
    </div>
    
    <div class="form-group">
      <label for="">Nom</label>
      <input type="text" class="form-control" name="nom" id="" aria-describedby="helpId" placeholder="">
      <small><?php echo isset($arrayErrors['nom']) ? $arrayErrors['nom'] : ''; ?></small>
      <div class="form-group">
      <div class="form-group">
    <label style="font-size:15px;" for="">login</label>
    <input style= "background-color:white;max-width:65%;" type="email" class="form-control" name="login"  placeholder="">
    <small>
            <?php echo isset($arrayErrors['login']) ? $arrayErrors['login'] : ''; ?>
            </small>
  </div>
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" id="" placeholder=""><small><?php echo isset($arrayErrors['nom']) ? $arrayErrors['nom'] : ''; ?></small>
      </div>
      <div class="form-group">
        <label for="">Confirmer password</label>
        <input type="password" class="form-control" name="confirmpassword" id="" placeholder=""><small><?php echo isset($arrayErrors['confirmpassword']) ? $arrayErrors['confirmpassword'] : ''; ?></small>
        <div class="form-group">
          <label for="">Avatar</label>
          <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
          <small id="fileHelpId" class="form-text text-muted"></small><br/>
          <button type="submit" name="" class="btn btn-primary">créer un compte</button>
        </div>
     </div>
      </div>
    </div>
      </div>
</form>