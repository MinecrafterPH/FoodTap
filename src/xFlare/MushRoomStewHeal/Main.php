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
	    if($item == "mushroom_stew") { //Checks if item is stew
		$myhealth = $player->getHealth(); //Gets health
		$sethealth = $myhealth + 3.5; //Adds health gain to a variable
		$player->setHeath($setheath); //Sets health
		$player->sendMessage("[MushRoomHealer] +3.5 hearts for eating Mush room soup."); //Message to confirm
	        //Remove soup from invetory | I dont know how to do this yet.
	        //---------------------------------\\
		$id = 281; //Mush room stew id is 281
            	$damage = 0;
            	$count = 1;
            	//After it removes the soup from the invitory, It gives a bowl
            	$item = new Item($id, $damage, $count); //Defines item
            	$player->getInventory()->addItem($item); //Adds item
		}
       }
