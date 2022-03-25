<?php

namespace Zipper\Core;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{

    public static $instance;

    public function onEnable()
    {
        self::$instance = $this;

        $this->getServer()->getCommandMap()->registerAll("Command", [
            new Commands\Gamemode("gamemode", "Permet de ce mettre en gamemode", "/gm1", ["gm"]),
        ]);
    }

    public static function getInstance() : Main {

        return self::$instance;

    }
}