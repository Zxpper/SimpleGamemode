<?php

namespace Zipper\Core\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;

class Gamemode extends Command
{
    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->setPermission("gamemode.use");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender instanceof Player) return $sender->sendMessage("Faites le en jeu");
        if ($sender->hasPermission("gamemode.use")){
            if (isset($args[0])) {
                if ($args[0] == "0" or $args[0] == "s"){
                    $sender->setGamemode(0);
                    $sender->sendMessage("§aVous êtes désormais en mode survie.");
                }elseif ($args[0] == "1" or $args[0] == "c"){
                    $sender->setGamemode(1);
                    $sender->sendMessage("§aVous êtes désormais en mode créatif.");
                }elseif ($args[0] == "3" or $args[0] == "sp"){
                    $sender->setGamemode(3);
                    $sender->sendMessage("§aVous êtes désormais en mode spectateur.");
                }else{
                    $sender->sendMessage("Vous devez faire /gm1 /gm3 ou /gm0");
                }
            }
        }
    }
}


