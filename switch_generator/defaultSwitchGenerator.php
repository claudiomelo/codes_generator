<?php 
 include_once("switchGeneratorController.php");
?>

<div class="container">

  <form method="post">

    <div class="row">   
        <div class="col-lg-12">  
            <div class="form-inline">
              <label for="className">Switch Var:</label>
              <input type="text" class="form-control" id="switchVar" name="switchVar" value="<?php echo @$_POST['switchVar'];?>" placeholder="Switch Var">

              <label for="varAmount">Cases Amount:</label>
              <input type="text" class="form-control" id="caseAmount" name="caseAmount" value="<?php echo @$_POST['caseAmount'];?>" placeholder="Amount of Cases">

              <label for="default">Switch Default:</label>
              <input type="text" class="form-control" id="default" name="default" value="<?php echo @$_POST['default'];?>" placeholder="Switch default">

              <input type="submit" class="btn btn-default" name="submit" value="Submit">
            </div>          
        </div>
    </div> 

  </form>

<br>

<?php if(isset($_POST['submit'])):?>
  <form method="post">

    <input type="hidden" name="switchVar" value="<?php echo $_POST['switchVar'];?>">
    <input type="hidden" name="default" value="<?php echo $_POST['default'];?>">
    <div class="row"> 

        <div class="col-lg-3">

          <div class="form-group">
            <label>Cases</label>
              <?php for($i = 0; $i < $_POST['caseAmount'];$i++):?>           
                <input type="text" class="form-control" id="cases" name="cases[]" placeholder="Cases">
               <?php endfor;?>    
           </div>
        
        </div>

        <div class="col-lg-9">
          <div class="form-group">
            <label >Expression</label>
              <?php for($i = 0; $i < $_POST['caseAmount'];$i++):?>
                 <input type="text" class="form-control" id="expressions" name="expressions[]" placeholder="Expression">
              <?php endfor;?>  
           </div>
          
        </div>       
         
          <input type="submit" class="btn btn-primary" name="create" value="Create Switch">

      </div>

    </form>

<?php endif;?>   

  </div>   

<br>

<?php 

  if(isset($_POST['create'])):
    $create = new switchGenerator();
    $output = $create->createDefaultSwitch($_POST['switchVar'], $_POST['cases'], $_POST['expressions'], $_POST['default']);

?>
   <div class="container">
      <div class="row well">
          Arquivo:<br>
          <?php echo $output;?>
      </div>
<?php endif;?>      
  </div>


