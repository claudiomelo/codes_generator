<?php

class switchGenerator{


	public function createDefaultSwitch($var, $cases, $expressions, $default){
			$output = "";

			$output .= htmlspecialchars("<?php ");

			$output .= "<br>&emsp;&emsp; switch($".$var."){";

			for($i = 0; $i < count($cases); $i++){
				$output .= "<br>&emsp;&emsp;&emsp;&emsp; case ".$cases[$i].":";
				$output .= "<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".$expressions[$i];
				$output .= "<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;break;";
			}

			$output .= '<br>&emsp;&emsp;&emsp;&emsp;default:';
			$output .= "<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".$default;

			$output .= "<br>&emsp;&emsp; }<br>";

			$output .= htmlspecialchars("?> ");

			return $output;
			
	}
		
}