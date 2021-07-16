<?php
if (isset($_SESSION['arrayError'])){
  $arrayErrors = $_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
require_once(ROUTE_DIR."view/inc/header.html.php"); 
require_once(ROUTE_DIR."view/inc/menu1.html.php"); 
?>
      <body class="">

 
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-8 col-sm-12 offset-md-2">
        <div class="card text-left w-100">
          <div class="" >
            <h4  class="card-title text-center text-red" style="height:50px; padding:10px;" >Login form</h4><br/> 
            </div>
            <form action="<?=WEB_ROUTE ?>" method="POST">
            <input type="hidden" name="controlleurs" value="security" />
        <input type="hidden" name="action" value="connexion" />
        <?php if (isset($arrayError['arrayConnexion'])) :?>
            <div class="alert alert-danger" role="alert">
            <small><?php echo isset($arrayError['arrayConnexion']) ? $arrayError['arrayConnexion'] : ''; ?></small>
              <?php endif;?>
                <div class="form-group">
                    <label for=""></label>
                    <input style="max-width:98%;margin-left:1%;background-color:white;" type="text" name="login" class="form-control" placeholder="email@.com">
                    <small>
                    <?php echo isset($arrayErrors['login']) ? $arrayErrors['login'] : ''; ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input  style="background-color:white;max-width:98%;margin-left:1%;" type="password" name="password" class="form-control" placeholder=".....">
                    <small>
                    <?php echo isset($arrayErrors['password']) ? $arrayErrors['password'] : ''; ?>
                    </small>              
              </div>
              <button style="margin-left:1%; background-color:red; border:0px;margin-bottom:3%;"type="submit" name="connexion" class="btn btn-primary">Connexion</button>
              <a  style="color:black;margin-left:30%;" href=" <?= WEB_ROUTE.'?controlleurs=security&view=inscription'?>">S'inscrire en tant que joueur</a>
             
            </form>
          </div>
        </div>
        </div>
        </div>
      </div>
     
      
        
      </body>
      <?php 
          require_once(ROUTE_DIR.'view/inc/footer.html.php');
      ?>