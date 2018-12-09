<?php

declare(strict_types=1);

namespace dktapps\CrashCommand;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class Main extends PluginBase{

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "crash":
				throw new \RuntimeException("Bye");
			default:
				return false;
		}
	}
}
