<?php
namespace xFlare\MushRoomStewHeal;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\Server;

class Main extends PluginBase implements Listener{
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        }
        public function onTouch(PlayerInteractEvent $event){ //Detects taps and such
            $player = $event->getPlayer();
            $item = $event->getItem()->getName();
		    if($item == "mushroom_stew") { //Checks if item is stew
		        $myhealth = $player->getHealth(); //Gets health
		        $sethealth = $myhealth + 3.5; //Adds health gain to a variable
		        $player->setHeath($setheath); //Sets health
		        $player->sendMessage("[MushRoomHealer] +3.5 hearts for eating Mush room soup."); //Message to confirm
		    }
        }
