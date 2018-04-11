<?php

namespace ChestShop;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class ChestShop extends PluginBase
{
	public function onLoad()
	{
	}
	public function onEnable()
	{
		if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder());
			$this->getServer()->getPluginManager()->registerEvents(new EventListener($this, new DatabaseManager($this->getDataFolder() . 'ChestShop.sqlite3')), $this);
			$this->getLogger()->info(TextFormat::GREEN . "Enabled");
	}
	public function onDisable()
	{		
	}
}
