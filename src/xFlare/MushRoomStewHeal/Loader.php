<?php
namespace xFlare\FlareHubCore;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\entity\Entity;

class Main extends PluginBase implements Listener{
    public function onEnable(){
      $this->saveDefaultConfig();
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getLogger()->info(TEXTFORMAT::GREEN . "[MRSH] Created by xFlare has been enabled.");
    }
    public function onDisable(){
      $this->getLogger()->info(TEXTFORMAT::GREEN . "[MRSH] Created by xFlare has been disabled.");
    }
  }
    
