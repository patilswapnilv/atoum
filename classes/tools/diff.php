<?php

namespace mageekguy\atoum\tools;

class diff
{
	protected $firstString = '';
	protected $secondString = '';

	public function __construct($firstString = '', $secondString = '')
	{
		$this
			->setFirstString($firstString)
			->setSecondString($secondString)
		;
	}

	public function __toString()
	{
		$string = '';

		foreach ($this->make() as $lineNumber => $diff)
		{
			if (is_array($diff) === true)
			{
				$lineNumber++;

				$sizeofMinus = sizeof($diff['-']);
				$sizeofPlus = sizeof($diff['+']);

				$string .= '@@ -' . $lineNumber . ($sizeofMinus <= 1 ? '' : ',' . $sizeofMinus) . ' +' . $lineNumber . ($sizeofPlus <= 1 ? '' : ',' . $sizeofPlus) . ' @@' . PHP_EOL;

				array_walk($diff['-'], function(& $value) { $value = ($value == '' ? '' : '-' . $value); });
				$minus = join(PHP_EOL, $diff['-']);

				if ($minus != '')
				{
					$string .= $minus . PHP_EOL;
				}

				array_walk($diff['+'], function(& $value) { $value = ($value == '' ? '' : '+' . $value); });
				$plus = join(PHP_EOL, $diff['+']);

				if ($plus != '')
				{
					$string .= $plus . PHP_EOL;
				}
			}
		}

		return $string;
	}

	public function setFirstString($mixed)
	{
		$this->firstString = (string) $mixed;

		return $this;
	}

	public function setSecondString($mixed)
	{
		$this->secondString = (string) $mixed;

		return $this;
	}

	public function getFirstString()
	{
		return $this->firstString;
	}

	public function getSecondString()
	{
		return $this->secondString;
	}

	public function make()
	{
		return $this->diff(self::split($this->firstString), self::split($this->secondString));
	}

	protected function diff($old, $new)
	{
		$return = array();

		if (sizeof($old) > 0 || sizeof($new) > 0)
		{
			$lengths = array();
			$maxLength = 0;

			foreach ($old as $oldKey => $oldValue)
			{
				$newKeys = array_keys($new, $oldValue);

				foreach ($newKeys as $newKey)
				{
					$lengths[$oldKey][$newKey] = isset($lengths[$oldKey - 1][$newKey - 1]) === false ? 1 : $lengths[$oldKey - 1][$newKey - 1] + 1;

					if ($lengths[$oldKey][$newKey] > $maxLength)
					{
						$maxLength = $lengths[$oldKey][$newKey];
						$oldMaxLength = $oldKey + 1 - $maxLength;
						$newMaxLength = $newKey + 1 - $maxLength;
					}
				}
			}

			if ($maxLength == 0)
			{
				$return = array(array('-' => $old, '+' => $new));
			}
			else
			{
				$return = array_merge(
					$this->diff(array_slice($old, 0, $oldMaxLength), array_slice($new, 0, $newMaxLength)),
					array_slice($new, $newMaxLength, $maxLength),
					$this->diff(array_slice($old, $oldMaxLength + $maxLength), array_slice($new, $newMaxLength + $maxLength))
				);
			}
		}

		return $return;
	}

	protected static function split($value)
	{
		return explode(PHP_EOL, $value);
	}

}

?>
