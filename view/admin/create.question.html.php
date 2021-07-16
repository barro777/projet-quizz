
<?php

if (isset($_SESSION['arrayError'])){
  $arrayErrors = $_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
require_once(ROUTE_DIR."view/inc/header.html.php");
require_once(ROUTE_DIR."view/inc/menu1.html.php");
require_once(ROUTE_DIR.'view/inc/menu.html.php');
require_once(ROUTE_DIR."view/inc/footer.html.php");     
  
?>






<form action="POST">  
    <input type="hidden"  name="controlleurs" value="admin">
        <input type="hidden" name="action" value="cree">
    
 <div class=" container-fluid borne ">
             <div class="row">
              <label for=""></label><h5>Question</h5>
              <textarea class="form-control mt-2" name="quest" id="Question" rows="2"></textarea>
              <small><?php echo isset($arrayErrors['quest']) ? $arrayErrors['quest'] : ''; ?></small>
            </div> 

            <div class="row mt-3 ">
              <label for=""></label><h5> Nbr de point</h5>
              <input type="number"
                class="col-2" name="point" id="Question" >
              <small class="form-text text-muted"><?php echo isset($arrayErrors['point']) ? $arrayErrors['point'] : ''; ?></small>
            </div>
            <div class="row mt-3 ">
              <label for=""></label><h5>type de réponse</h5>
              <select class="col-5" name="choice" id="Question">
                <option value="checkbox"> multiple
                </option>
                <option value="radio">unique
                </option>
                <option value="text">saisis
            </option>
            <small id="helpId" class="form-text text-muted"><?php echo isset($arrayErrors['choice']) ? $arrayErrors['choice'] : ''; ?></small>
              </select>
              <div class="row mt-3">
                <label for=""></label><h5 class="ml-3">Nbr de réponse</h5>
                <input type="text"
                  class="ml-4" name="nbr_de_champ" id="Question" aria-describedby="helpId" placeholder=""><button><i class="fa fa-plus-square-o" name="ok" style="font-size:36px;"></i></button>
                <small id="helpId" class="form-text text-muted"><?php echo isset($arrayErrors['nbr_de_champ']) ? $arrayErrors['nbr_de_champ'] : ''; ?></small>
              </div>
            </div>
            <?php $choice = $_SESSION['choice']?>
               <?php $rep = $_SESSION['nbr_de_champ']?>
               <?php for ($i=0; $i < $rep ; $i++):?>
            <div class="container-fluid row">
                  <input type="text" name="" id="">

                <?php if ($choice == ['checkbox']):?>
                  <label for="">reponse<?= $i ?></label>
                  <input type="checkbox" name="reponse"<?= $i ?>>
                  <input type="text" name="reponse"<?= $i ?>>
                <?php endif ;?>

                  <?php if ($choice == ['radio']):?>
                    <label for="">reponse<?= $i ?></label>
                    <input type="radio" name="reponse"<?= $i ?>>
                   <input type="text" name="reponse"<?= $i ?>>
                  <?php endif;?>
                    
                  <?php if ($choice == ['text']):?>
                      <label for="">reponse<?= $i ?></label>
                      <input type="text" name="reponse"<?= $i ?>>
                      <input type="text" name="reponse"<?= $i ?>>
                  <?php endif;?>
                  
                  <?php endfor; ?>

            <button  type ="submit" name="btn_submit"> enregistré </button>
             
            
</div>







</form>