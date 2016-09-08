<?php

class voGenerator{


	public function createDefaultVo($vars, $varTitles, $varTypes, $className, $varDefaults){
			$output = "";
// 			$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
// echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;  
			$output .= htmlspecialchars("<?php ");

			$output .= "<br>class ".$className." {<br>";			

			for($i = 0; $i < count($vars); $i++):
				$output .= '
				 <br>&emsp;&emsp;/** 
				 <br>&emsp;&emsp;* '.$varTitles[$i].'
				 <br>&emsp;&emsp;*
				 <br>&emsp;&emsp;* @var '.$varTypes[$i].'
				 <br>&emsp;&emsp;*/
				 <br>&emsp;&emsp;private $'.$vars[$i].';<br>';
			endfor;	
								

			$output .= '<br><br>&emsp;&emsp;function __construct('; for($i = 0; $i < count($vars); $i++): $output .= '$'.$vars[$i].' = '.$varDefaults[$i].', '; endfor;$output .= ') {';
					foreach ($vars as $var) {
						$output .= '<br> &emsp;&emsp;&emsp;$this->'.$var.' = $'.$var.';';
					}
					
					
				$output .= '<br>&emsp;&emsp;}<br>';

			$output .= '<br>//Gets';
			foreach ($vars as $var) {
				$output .= '<br> &emsp;&emsp;function get_'.$var.'() { <br>
					&emsp;&emsp;&emsp;return $this->'.$var.';<br>
				&emsp;&emsp;}<br>';
			}	
				
				
			$output .= '// sets';
			foreach ($vars as $var) {
				$output .= '<br>&emsp;&emsp;function set_'.$var.'($v) {<br>
					&emsp;&emsp;&emsp;$this->'.$var.' = $v;<br>
				&emsp;&emsp;}<br>';
			}	
				
			$output .= '<br> } <br>';

			$output .= htmlspecialchars(";?> ");

			return $output;
	}
		
}