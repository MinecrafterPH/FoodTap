<?php
namespace xFlare\MushRoomStewHeal;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\item\Item;
    
    public function __construct(Loader $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
	$this->length = -1;
    }
 
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TEXTFORMAT::GREEN . "[MRSH] Created by xFlare has been enabled.");
      }
        public function onTouch(PlayerInteractEvent $event){
            $player = $event->getPlayer();
            $item = $event->getItem()->getName();
            $config = $this->getConfig();
            $enabled = $config->get("enabled");
            $myhealth = $player->getHealth();
	    if($item == "Mushroom Stew" and $enabled === true and $myhealth !== 20) {
            	$health = $config->get("health-earned");
            	$health = $health * 2;
		$sethealth = $myhealth + $health;
	        $player->setHealth($sethealth);
	        $id = 282;
                $damage = 0;
                $count = 1;
                $soup =  Item::get($id, $damage, $count);
                $player->getInventory()->removeItem($soup);
		$id = 281;
                $damage = 0;
                $count = 1;
                $item =  Item::get($id, $damage, $count);
                $player->getInventory()->addItem($item);
                $sendmessage = $config->get("send-message-when-stew-tapped");
                if($sendmessage === true){
            	   $message = $config->get("message-if-enabled");
            	   $player->sendMessage("[MRSH] $message");
             }
         }
     }
   }
