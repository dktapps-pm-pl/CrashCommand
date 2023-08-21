<?php

declare(strict_types=1);

namespace dktapps\CrashCommand;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\AsyncTask;
use function str_repeat;

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
			case "crashfatalerror":
				$str = str_repeat("aaaaaaaaa", 0x7fffffff);
				return true;
			default:
				return false;
		}
	}
}
