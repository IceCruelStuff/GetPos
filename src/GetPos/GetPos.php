<?php

namespace GetPos;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class GetPos extends PluginBase
{

    public function onEnable() : void
    {
        $this->getLogger()->info("GetPos enabled.");
    }

    public function onLoad() : void
    {
        $this->getLogger()->info("GetPos loaded");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool
    {
        switch ($command->getName()) {
            case "getpos":
                if ($sender instanceof Player) {
                    $playerX = $sender->getX();
                    $playerY = $sender->getY();
                    $playerZ = $sender->getZ();
                    $outX = round($playerX, 1);
                    $outY = round($playerY, 1);
                    $outZ = round($playerZ, 1);
                    $playerLevel = $sender->getLevel()->getName();
                    $sender->sendMessage(C::YELLOW . "X:" . C::AQUA . $outX .
                                         C::YELLOW . " Y:" . C::AQUA . $outY .
                                         C::YELLOW . " Z:" . C::AQUA . $outZ .
                                         C::YELLOW . " Level: " . C::AQUA . $playerLevel);
                    return true;
                } else {
                    $sender->sendMessage("This command only works in-game.");
                }
                break;
        }
        return false;
    }    

    public function onDisable() : void {
        $this->getLogger()->info("GetPos disabled.");
    }

}
