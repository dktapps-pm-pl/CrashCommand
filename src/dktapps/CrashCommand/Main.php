<?php

declare(strict_types=1);

namespace dktapps\CrashCommand;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\scheduler\AsyncTask;

class Main extends PluginBase{

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "crash":
				throw new \RuntimeException("Bye");
			case "crashasync":
				$this->getServer()->getAsyncPool()->submitTask(new class extends AsyncTask{
					public function onRun() : void{
						throw new \RuntimeException("Bye from AsyncTask");
					}
				});
				return true;
			default:
				return false;
		}
	}
}
