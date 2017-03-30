<?php
	/* Licensed under GNU Affero General Public License v3 */
	function infoprog(){
		$versionarray = array(
			"version" => "1.0",
			"versiondislines" => "2.0",
			"lang" => "PHP",
			"author" => "Giovanni Alfredo Garciliano Diaz",
			"basedon" => "Based on a work of Daniel Clemente Laboreo (http://danielclemente.com/dislines)",
			"license" => "GNU Affero General Public License v3",
			"url" => "https://github.com/giobeatle1794/dislines-php",
			"createdusing" => "gedit, Firefox, FileZilla",
		);
		return $versionarray;
	}
	function dislines($filename,$lang){
		$counter = 0; 
		$file = fopen($filename, "r");
		while(!feof($file)) {
			$line[$counter] = fgets($file);
			$counter++;
		}
		fclose($file);
		/* The parsing process begins here */
		$tag = "@".$lang."{";
		$endtag = "@}";
		$lines = count($line) - 1;
		$iminsidetag = false;
		$i = 0;
		while ($i <= $lines) {
			if ($iminsidetag == true) {
				$tagtoanalyze2 = substr($line[$i], 0, 2);
				while ($tagtoanalyze2 != $endtag){
					echo $line[$i];
					$i++;
					$tagtoanalyze2 = substr($line[$i], 0, 2);
				}
				$iminsidetag = false;
			} else {
				$tagtoanalyze = substr($line[$i], 0, 4);
				if ($tagtoanalyze == $tag){
					$iminsidetag = true;
				}
			}
			$i++;
		}
	}
?>
