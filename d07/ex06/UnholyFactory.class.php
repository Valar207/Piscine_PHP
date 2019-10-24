<?php

class UnholyFactory
{
	private $absorbed = array();
	private $fabricate = array();
	private $type_s;
	
	public function absorb($type)
	{
		if ($type instanceof Fighter)
		{
			if (in_array($type, $this->absorbed))
				print("(Factory already absorbed a fighter of type ". $type->getType(). ")".PHP_EOL);
			else
			{
				print("(Factory absorbed a fighter of type ". $type->getType().")". PHP_EOL);
				$this->absorbed[] =  $type;
			}
		}
		else
			print("(Factory can't absorb this, it's not a fighter)". PHP_EOL);
	}

	private function name($rf)
	{
		if ($rf == "foot soldier")
			return "Footsoldier";
		else if ($rf == "llama")
			return "Llama";
		else if ($rf == "archer")
			return "Archer";
		else if ($rf == "assassin")
			return "Assassin";
	}

	public function fabricate($rf)
	{
		$this->type_s = $this->name($rf);
		foreach ($this->absorbed as $k => $v) {
			if (get_class($v) == $this->type_s)
			{
				print("(Factory fabricates a fighter of type " . $rf . ")". PHP_EOL);
				return ($this->absorbed[$k]);
			}
		}
		print("(Factory hasn't absorbed any fighter of type ". $rf . ")". PHP_EOL);
	}
}

?>