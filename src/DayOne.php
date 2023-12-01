<?php declare(strict_types=1);

class DayOne 
{

	public function problemOne(array $items): int 
	{
		$sum = 0; 
		foreach ($items as $key => $value) {
			$justNums = preg_replace("/[^0-9]/", "", $value);
			$num = $justNums[0] . $justNums[strlen($justNums)-1]; 
			$iNum = intval($num);
			$sum = $sum + $iNum;
		}
		return $sum;
	}

	public $alphaMap = array(
		"zero" => "0",	
		"one" => "1",	
		"two" => "2",	
		"three" => "3",	
		"four" => "4",	
		"five" => "5",	
		"six" => "6",	
		"seven" => "7",	
		"eight" => "8",	
		"nine" => "9"	
	);

	public function hasNumberWord($word, $keys): string 
	{
		$o = "";
		foreach ($keys as $num) 
		{
			if (str_contains($word, $num)) 
			{
				$o = $num;
			}
		}
		return $o;
	}
	
	public function problemTwo(array $items): int 
	{
		$this->alphaMap;
		$keys = array_keys($this->alphaMap);	
		foreach ($items as $key => $input)
	       	{
			$arr = array();
			$letters = array();
			foreach ($str_split($input) as $c)
		       	{
				if (is_numeric($c))
				{
					array_push($arr, $c);
					$letters = array();
				}
				else 
				{
					array_push($letters, $c);	
				}	

				$word = implode("", $letters);
				$maybeNumberWord = $this->hasNumberWord($word, $keys);

				if (!empty($maybeNumberWord)) 
				{
					array_push($arr, $this->alphaMap[$maybeNumberWord]);
					$letters = array(end($letters));		
				}
			}
			$items[$key] = implode("", $arr);
		}
		return $this->problemOne($items);
	}


	public function run() 
	{
		echo "RUNNING DAY ONE" . PHP_EOL;
		$array = file("resources/dayone.txt");
		$result = $this->problemOne($array);
		echo "PART 1: ";
		print_r($result . PHP_EOL);


		$array = file("resources/dayone_part_two.txt");
		$result = $this->problemTwo($array);
		echo "PART 2: ";
		print_r($result);
	}
}

