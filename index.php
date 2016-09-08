<?php

include_once("header.php");

	
	@$path = explode('/', $_GET['path']);

	switch ($path[0]) {
		case '':
          include_once("welcome.php");
          break;

        case 'vo':
          include_once("vo_generator/defaultVoGenerator.php");
          break; 

        case 'switch':
          include_once("switch_generator/defaultSwitchGenerator.php");
          break;
    
        default:
          echo '<div class="alert alert-warning" role="alert">
  					<strong>Warning!</strong> Page does not exist.
				</div>';
          
          break;
      }    

include_once("footer.php");  