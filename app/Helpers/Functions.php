<?php

namespace App\Helpers;

class Functions {

	/**
	 * @param string $style
	 *
	 * @return array
	 */
	public static function monthSelectData($style = 'full')
	{
		$month_param = (in_array($style, ['short', 'abbreviated', 'abbrev'])) ? 'M' : 'F';
		$monthList = [];
		for($i=1; $i < 13; $i++)
		{
			$date = date('Y') . '-' . $i . '-01';
			$monthList[$i] = date($month_param, strtotime($date));
		}

		return $monthList;
	}

	/**
	 * @param int $range
	 * @param string $style
	 *
	 * @return array
	 */
	public static function yearSelectData($range = 7, $style = 'asc')
	{
		$yearList = [];
		for($i=0; $i <= $range; $i++)
		{
			$val = date('Y') + $i;
			$yearList[$val] = $val;
		}
		if ($style == 'desc')
		{
			krsort($yearList);
		}

		return $yearList;
	}

	public static function getStateList($country='US')
	{
		$stateList = \CountryState::getStates($country);

		/* Trim out territories so its only 50 states plus DC */
		$onlyStates = array_splice($stateList,0,51);
		ksort($onlyStates);

		return $onlyStates;
	}
}