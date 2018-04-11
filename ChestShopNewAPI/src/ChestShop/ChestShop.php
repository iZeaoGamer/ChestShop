<?php

namespace ChestShop;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

//MassiveEconomy API Call
use onebone\economyapi\EconomyAPI;

class ChestShop extends PluginBase
{

	public function onLoad()
	{
	}

	public function onEnable()
	{
		if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder());
			$this->getServer()->getPluginManager()->registerEvents(new EventListener($this, new DatabaseManager($this->getDataFolder() . 'ChestShop.sqlite3')), $this);
		if(EconomyAPI::getInstance()->getVersion() == "5.7"){ //Checking API version. Important for API Function Calls
			$this->getLogger()->info(TextFormat::GREEN . "Enabled");
		}else{
			$this->getLogger()->alert(TextFormat::RED . "Plugin disabled. Please use EconomyAPI");
			$this->getPluginLoader()->disablePlugin($this);
		}

	}

	public function onDisable()
	{		
	}
}










