<?php

	if(isset($_POST['submit'])){
		$name=$_POST['search'];

		$search = 'https://google.com/search?q='.$name.'' ;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $name);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$html = curl_exec($ch);
		curl_close($ch);

		$DOM = new DOMDocument ;
		libxml_use_internal_errors(true);
		$DOM->loadHTML($html);


	echo "<h2> Titles</h2>";

		$elements = $DOM->getElementsByTagName('h3');

		for ($i=0; $i<10 ; $i++) { 
			echo $elements->item($i)->nodeValue."<br>" ;
		}

		echo "<br>";
		echo "<h2> Links</h2>";
		echo "<br>";

		$elements1 = $DOM->getElementsByTagName('a');

		for ($i=0; $i<10 ; $i++) { 
			echo $elements1->item($i)->getAttribute('href')."<br>" ;
		}

		echo "<br>";
		echo "<h2> Description</h2>";
		echo "<br>";

		$elements2 = $DOM->getElementsByTagName('span');

		for ($i=0; $i<10 ; $i++) { 
			echo $elements2->item($i)->nodeValue."<br>" ;
		}
	}


?>