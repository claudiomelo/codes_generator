
<?php 
 include_once("VoGeneratorController.php");
?>

<div class="container">

  <form method="post">

    <div class="row">   
        <div class="col-lg-8">  

            <div class="form-inline">
              <label for="className">Class Name:</label>
              <input type="text" class="form-control" id="className" name="className" value="<?php echo @$_POST['className'];?>" placeholder="Class Name">

              <label for="varAmount">Variables Amount:</label>
              <input type="text" class="form-control" id="varAmount" name="varAmount" value="<?php echo @$_POST['varAmount'];?>" placeholder="Amount of Variables">
              <input type="submit" class="btn btn-default" name="submit" value="Submit">
            </div>
        </div>
    </div> 

  </form>

<br>

<?php if(isset($_POST['submit'])):?>
  <form method="post">

    <input type="hidden" name="className" value="<?php echo $_POST['className'];?>">
    <div class="row"> 

        <div class="col-lg-3">

          <div class="form-group">
            <label for="">Variables</label>
              <?php for($i = 0; $i < $_POST['varAmount'];$i++):?>           
                <input type="text" class="form-control" id="className" name="vars[]" placeholder="Variable Name">
               <?php endfor;?>    
           </div>
        
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label >Variable Types</label>
              <?php for($i = 0; $i < $_POST['varAmount'];$i++):?>
                 <input type="text" class="form-control" id="className" name="varTypes[]" value="array" placeholder="Variable type">
              <?php endfor;?>  
           </div>
          
        </div>

        <div class="col-lg-3">
        <div class="form-group">
            <label >Variable Titles</label>
             <?php for($i = 0; $i < $_POST['varAmount'];$i++):?>           
                <input type="text" class="form-control" id="varTitles" name="varTitles[]" value="Representa o "placeholder="Title of the variable">
             <?php endfor;?>   
          </div>
             
        </div>

        <div class="col-lg-3">
         <div class="form-group">
            <label >Variable Defaults</label>
             <?php for($i = 0; $i < $_POST['varAmount'];$i++):?>
                <input type="text" class="form-control" id="varDefaults" name="varDefaults[]" value="array()" placeholder="Default value of the variable">
            <?php endfor;?>   
          </div>          
        </div>
         
          <input type="submit" class="btn btn-primary" name="createVo" value="Create VO">

      </div>

    </form>

<?php endif;?>   

  </div>   

<br>

<?php 

  if(isset($_POST['createVo'])):
    $createVo = new voGenerator();
   // createDefaultVo($vars, $varTitles, $varTypes, $className, $varDefaults){
    $output = $createVo->createDefaultVo($_POST['vars'], $_POST['varTitles'], $_POST['varTypes'], $_POST['className'], $_POST['varDefaults']);

?>
   <div class="container">
      <div class="row well">
          Arquivo:<br>
          <?php echo $output;?>
      </div>
<?php endif;?>      
  </div>

