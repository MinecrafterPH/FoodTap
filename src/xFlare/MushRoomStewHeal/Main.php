<?php
namespace xFlare\MushRoomStewHeal;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener{
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TEXTFORMAT::GREEN . "[MRSH] Created by xFlare has been enabled.");
      }
        public function onTouch(PlayerInteractEvent $event){ //Detects taps and such
            $player = $event->getPlayer();
            $item = $event->getItem()->getName();
            $config = $this->getConfig();
            $enabled = $config->get("enabled");
            $this->getLogger()->info(TEXTFORMAT::GREEN . "[MRSH] $item");
	          if($item == "Mushroom Stew" and $enabled === "yes") { //Checks if item is stew
		          $player->sendMessage("Debug?");
              $myhealth = $player->getHealth(); //Gets health
		          $sethealth = $myhealth + 3.5; //Adds health gain to a variable
		          $player->setHealth($sethealth); //Sets health
		          $id = 282; //Mush room stew id is 281
              $damage = 0;
              $count = 1;
		          $soup = new Item($id, $damage, $count);
	            $player->getInventory()->removeItem($soup);
	           //---------------------------------\\
		          $id = 281; //bowl stew id is 281
              $damage = 0;
              $count = 1;
            	//After it removes the soup from the invitory, It gives a bowl
              $item = new Item($id, $damage, $count); //Defines item
              $player->getInventory()->addItem($item); //Adds item
              $sendmessage = $config->get("send-message-when-stew-tapped");
              if($sendmessage === "yes"){
            	   $message = $config->get("message-if-enabled");
            	   $player->sendMessage($message); //Sends message if enabled.
             }
         }
     }
   }
