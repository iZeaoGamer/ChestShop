<?php

namespace ChestShop;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

//MassiveEconomy API Call
use MassiveEconomy\MassiveEconomyAPI;

class ChestShop extends PluginBase
{

	public function onLoad()
	{
	}

	public function onEnable()
	{
		if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder());
			$this->getServer()->getPluginManager()->registerEvents(new EventListener($this, new DatabaseManager($this->getDataFolder() . 'ChestShop.sqlite3')), $this);
		if(EconomyAPI::getInstance()->getAPIVersion() == "5.7.1-2.alpha8"){ //Checking API version. Important for API Function Calls
			$this->getLogger()->info(TextFormat::GREEN . "Enabled");
		}else{
			$this->getLogger()->alert(TextFormat::RED . "Plugin disabled. Please use MassiveEconomy");
			$this->getPluginLoader()->disablePlugin($this);
		}

	}

	public function onDisable()
	{		
	}
}










