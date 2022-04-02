<?php

namespace TheNewHEROBRINE\CONSOLEChat;

use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
    /** @var  Config $cfg */
    private $config;

    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, ["chat format" => "§b§l❖§dHệ Thống§b§l❖ §e✪ §b{msg} §e✪"]);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCONSOLECommand(ServerCommandEvent $event){
        if ($event->getCommand(){0} != "/"){
            $event->setCancelled();
            $this->getServer()->broadcastMessage(str_replace("{msg}", $event->getCommand(), $this->getConfig()->get("chat format", "§b§l❖§dHệ Thống§b§l❖ §e✪ §b{msg} §e✪")));
        } else{
            $event->setCommand(substr($event->getCommand(), 1));
        }
    }
}
