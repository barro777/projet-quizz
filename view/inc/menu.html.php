<?php 
require_once (ROUTE_DIR.'view/inc/menu1.html.php');

?>

<br/>
<?php if(est_admin()): ?> 
           <div class="bord">  </div>
          <h2> <p class="tête">CREER ET PARAMETRER VOS QUIZZ </p></h2><br/><br/>
          <div class="card-body" style="background-color:white;margin-top:-5%;margin-left:2%;margin-right:2%;height:650px;">
          
                
                <li class="nav-item active">
                      <a class="nav-link" href="<?=WEB_ROUTE.'?controlleurs=security&view=connexion'?>">DECONNEXION</a><br/><br/><br/><br/><br/>
                  </li>
           

        <?php endif; ?>
        <div class="bord">  </div>
        <?php if(est_admin()):?>
<div class="vertical-menu">
  <div class="positive"><h4 class="text-center" style="font-style: Monserrat;"> <?php echo (isset ($_SESSION['userConnect'])) ? ($_SESSION['userConnect']["prenom"]):""; ?></br><?php echo (isset ($_SESSION['userConnect'])) ? ($_SESSION['userConnect']["nom"]):""; ?></h4> </div>
  <li class="nav-item amber">
  <div class="">
  <a class="icon" style="font-size:20px;"href="<?=WEB_ROUTE.'?controlleurs=admin&view=liste.question'?>">Liste Questions<i class="fa fa-edit offset-11" style="font-size:36px "></i></a>
  </div>
<div>
<a class=""style="font-size:20px;"href="<?=WEB_ROUTE.'?controlleurs=admin&view=create.admin'?>">Créer Admin<em><i><i class="fa fa-plus-square-o offset-11" style="font-size:36px;"></i></i></em></i></i></em></a>
</div>
<div>
<a  style="font-size:20px;"href="<?=WEB_ROUTE.'?controlleurs=admin&view=liste.joueur'?>">Liste joueurs<i class="fa fa-edit offset-11" style="font-size:36px"></i></a>
</div>
  <div>
  <a class=""style="font-size:20px;" href="<?=WEB_ROUTE.'?controlleurs=admin&view=create.question'?>">Créer Questions <em><i><i class="fa fa-plus-square-o offset-11" style="font-size:36px;"></i></i></em></a>
  </div>
  <div>
  <a class=""style="font-size:20px;" href="<?=WEB_ROUTE.'?controlleurs=admin&view=Tabeau'?>">Tableau de Bord<em><i><i class="fa fa-edit offset-11" style="font-size:36px;"></i></i></em></a>
  </div>
  </li>
</div> 
</div>
 

  
  <?php endif; ?>
    </div>
</nav>

