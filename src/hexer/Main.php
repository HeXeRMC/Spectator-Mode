<?php

namespace hexer;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TE; 
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener{ 
	
	public function onEnable() {
		$this->getLogger()->info(TE::GREEN . "Spectator plugin on");
	}
	
	public function onDisable() {
		$this->getLogger()->info(TE::RED . "Spectator plugin off"); 
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool { 
		if($cmd->getName() == "spectator"){
			if(count($args) < 1){
				$sender->sendMessage(TE::RED . "§cError§7: §cUse §7/spectator on/off/help"); 
				return false;
			}
			switch($args[0]){
				case "on":
				$sender->setGamemode(3);
				$sender->addTitle(TE::GREEN . "Activated");
				$sender->sendTip(TE::GREEN . "Use §c/spectator off §ato disable spectator mode ");
				$sender->sendMessage(TE::GREEN . "Spectator mode on");
				break;
				case "off":
				$sender->setGamemode(2);
				$sender->addTitle(TE::RED . "Deactivated");
				$sender->sendMessage(TE::RED . "Spectator mode off");
				break;
				case "help":
				$sender->sendMessage(TE::AQUA . "§cHelp§7: Use §c/spectator on/off §7to active/deactive spectator mode.");
				$sender->sendMessage(TE::YELLOW . "§ePlugin edit by hexer");
				break;
			}
		}
		return false;
	}
}
	
			