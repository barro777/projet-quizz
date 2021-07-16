<?php

if (isset($_SESSION['arrayError'])){
  $arrayErrors = $_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
require_once(ROUTE_DIR."view/inc/header.html.php");
if (est_admin()) {
    require_once(ROUTE_DIR.'view/inc/menu.html.php');
  }
?>
 <header class="head mb-2"style="height:60px; background-color:red">
  <h2 class="row-2"><img class="img"src=<?=WEB_ROUTE."img/logo.jpeg"?>><span id="marq" class="col-xs-6 col-md-4 offset-3 text-aligne-center col-sm-4 " style="color: white;margin:none">Le plaisir de jouer au QuizZ 221</span>
 </h2>
  </header>
       <div class="container mt-5" >
        <div class="row" style="max-width:80%;margin-left:9%;height:auto;">
        <div class="col-md-8 col-sm-12 offset-md-2">
        <div class="card text-left w-100">
          <div class="card-body" >
            <h4 class="card-title text-left text-black">S'INSCRIRE</h4>
            <p id="yu">Pour tester votre niveau de culture générale</p>
            
            <form action="<?=WEB_ROUTE ?>" method="POST">
                <input type="hidden" name="controlleurs" value="security" />
                <input type="hidden" name="action" value="inscription" />
                <?php if (isset($arrayError['arrayConnexion'])) :?>
            <div class="alert alert-danger" role="alert">
           
              <strong> <?php echo isset($arrayError['arrayConnexion']) ? $arrayError['arrayConnexion'] : ''; ?>danger</strong>
              <?php endif;?>
                <div class="form-group">
                <div>
                <div class="form-group">
    <label style="font-size:15px;" for="">Prenom</label>
    <input style= "background-color:white;max-width:65%;" type="text" class="form-control" name="prenom" 
    placeholder="Mamadou">
    <small><?php echo isset($arrayErrors['prenom']) ? $arrayErrors['prenom'] : ''; ?></small>
  </div>
  <div class="form-group">
    <label style="font-size:15px;" for="">Nom</label>
    <input style= "background-color:white;max-width:65%;" type="text" class="form-control" name="nom"  placeholder="Barro">
    <small><?php echo isset($arrayErrors['nom']) ? $arrayErrors['nom'] : ''; ?></small>
  </div>
           
  <div class="form-group">
    <label style="font-size:15px;" for="">login</label>
    <input style= "background-color:white;max-width:65%;" type="email" class="form-control" name="login"  placeholder="">
    <small>
            <?php echo isset($arrayErrors['login']) ? $arrayErrors['login'] : ''; ?>
            </small>
  </div>
  <div class="form-group">
        <label style="font-size:15px;" for="">password</label>
        <input style= "max-width:65%;background-color:white;" type="password" class="form-control" name="password" id="" placeholder=".........">
        <small>
            <?php echo isset($arrayErrors['password']) ? $arrayErrors['password'] : ''; ?></small>
      </div>
      <div class="form-group ">
        <label style="font-size:15px;" for="">confirmer password</label>
        <input style= "max-width:65%;background-color:white;" type="password" class="form-control" name="confirmpassword" id="" placeholder=".........">
        <small>
            <?php echo isset($arrayErrors['confirmpassword']) ? $arrayErrors['confirmpassword'] : ''; ?>
            </small>
      </div><br/>
            <div>
            <label style="font-size:15px;" for="">Avatar</label>
            <input style="margin-left:10%;"type="file" name="avatar" value="" /></div><br/><br/>
           
                </div>
                <div class="col-md-2 offset-md-2" style="text-align:center;background-color:red;border-radius:10px 10px 10px 10px;max-width:40%">
                    <button style="color:white;"type="submit" name="inscription" class="btn btn-red">Creer un compte</button>
                </div>
            </form>
          </div>
        </div>
        </div>
        </div>
      </div>
      
      <?php 
          require_once(ROUTE_DIR.'view/inc/footer.html.php');
      ?>