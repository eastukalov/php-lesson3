<?php
	$continents = [
		'Africa'=>['Taurotragus oryx', 'Hippotragus equinus', 'Tragelaphus scriptus', 'Oreotragus oreotragus', 'Sylvicapra grimmia'],
		'Eurasia'=>['Panthera tigris altaica', 'Cervus nippon', 'Lepus mandshuricus', 'Prionailurus bengalensis euptilurus'],
		'South America'=>['Panthera onca', 'Eunectes murinus', 'Hydrochoerus hydrochaeris'],
		'North America'=>['Puma concolor', 'Grizzly bear', 'Crotalinae'],
		'Australia'=>['Tachyglossidae', 'Ornithorhynchus anatinus', 'Phascolarctos cinereus', 'Oxyuranus scutellatus'],
		'Antarctica'=>['Pygoscelis antarctica', 'Aptenodytes forsteri', 'Euphausia superba']
	];

	echo '<pre>';
	print_r ($continents);
	echo '</pre>';

	$two_word=[];
	$first_part_name=[];
	$second_part_name=[];
	$two_word_rand=[];

	foreach ($continents as $continent => $animals) {
		foreach ($animals as $animal) {
			if (substr_count($animal, ' ') == 1)
			{
				$two_word []=$animal;
				$first_part_name []=$continent . '&&&' . substr($animal, 0, strpos($animal, ' '));
				$second_part_name[]=substr($animal, strpos($animal, ' ') + 1);
			}
		}
	}
  
	shuffle($first_part_name);
	shuffle($second_part_name);

	while (count($first_part_name) > 0) {
		$two_word_rand[]=array_shift($first_part_name) . ' ' . array_shift($second_part_name);
	}

	sort($two_word_rand);
	$region_old='';
	$animals_str='';

	foreach ($two_word_rand as $animal) {
		
		if (substr($animal, 0, strpos($animal, '&&&')) <> $region_old) {
			
			if ($animals_str<>'') {
				echo '<p>' . $animals_str . '</p>';
				$animals_str='';
			}

			echo '<h2>' . substr($animal, 0, strpos($animal, '&&&')) . '</h2>';
		}

		$animals_str.= (($animals_str=='') ? '' : ', ') . substr($animal, strpos($animal, '&&&')+3);
		$region_old=substr($animal, 0, strpos($animal, '&&&'));
	}

	echo '<p>' . $animals_str . '</p>';
	
	
	foreach ($two_word_rand as $key_animal => $animal) {
		$two_word_rand[$key_animal]=substr($animal, strpos($animal, '&&&')+3);
	}

	echo '<pre>';
	print_r ($two_word_rand);
	echo '</pre>';
?>