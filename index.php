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

	$string_array=[];
	$first_part_name=[];
	$first_part_name_rand=[];
	$second_part_name=[];
	$array_count=[];

	foreach ($continents as $continent => $animals) {
		foreach ($animals as $animal) {
			if (substr_count($animal, ' ') == 1)
			{
				$string_array=explode(' ', $animal);
				$first_part_name [$string_array[0]]=$continent;
				$second_part_name[]=$string_array[1];
			}
		}
	}

	shuffle($second_part_name);

	while (count($first_part_name) > 0) {
		$key=array_rand($first_part_name);
		$first_part_name_rand[$key . ' ' . array_shift($second_part_name)] = $first_part_name[$key];
		unset($first_part_name[$key]);
	}

	asort($first_part_name_rand);
  $array_count = array_count_values($first_part_name_rand);
	$first_part_name_rand = array_keys($first_part_name_rand);
	echo 'Основное задание: </br>';
	echo '<pre>';
	print_r ($first_part_name_rand);
	echo '</pre>';
	echo '</br>Дополнительное задание: </br>';

	foreach ($array_count as $region => $count) {
		echo '<h2>' . $region . '</h2>';
		echo '<p>' . implode(', ',array_slice($first_part_name_rand,0,$count)) . '</p>';
		array_splice($first_part_name_rand,0,$count);
	}
?>