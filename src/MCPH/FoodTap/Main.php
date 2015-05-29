<?php
namespace MCPH\FoodTap;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener {
 
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TEXTFORMAT::GREEN . "FoodTap has been enabled.");
        $config = $this->getConfig();
        }
    }
    public function onDisable(){
      	$this->saveDefaultConfig();
      	$this->getServer()->getPluginManager()->registerEvents($this, $this);
      	$this->getLogger()->info(TEXTFORMAT::GREEN . "FoodTap has been disabled.");
      }
      public function onEat(PlayerItemConsumeEvent $event) {
    	$player = $event->getPlayer();
    	$config = $this->getConfig();
    	$check = $config->get("eat-food-normally);
        if($item == "Mushroom Stew", "Apple", "Bread", "Steak", "Melon", "Cooked Chicken" and $check !== true){
        	$event->setCancelled();
        	$player->sendMessage("Please tap on the food to eat it!");
      	}
      }
      public function onTouch(PlayerInteractEvent $event){
            $player = $event->getPlayer();
            $item = $event->getItem()->getName();
            $config = $this->getConfig();
            $enabled = $config->get("enabled");
            $myhealth = $player->getHealth();
	    if($item == "Mushroom Stew" and $enabled === true and $myhealth !== 20) {
            	$health = $config->get("health-earned-stew");
            	$health = $health * 2;
		$sethealth = $myhealth + $health;
	        $player->setHealth($sethealth);
	        $id = 282;
                $damage = 0;
                $count = 1;
                $food =  Item::get($id, $damage, $count);
                $player->getInventory()->removeItem($food);
		$id = 281;
                $damage = 0;
                $count = 1;
                $item =  Item::get($id, $damage, $count);
                $player->getInventory()->addItem($item);
                $sendmessage = $config->get("allow-message-stew");
                if($sendmessage === true){
            	   $message = $config->get("message-stew");
            	   $player->sendMessage($message);
             }
             if($item == "Steak" and $enabled === true and $myhealth !== 20) {
            	$health = $config->get("health-earned-steak");
            	$health = $health * 2;
		$sethealth = $myhealth + $health;
	        $player->setHealth($sethealth);
	        $id = 364;
                $damage = 0;
                $count = 1;
                $food =  Item::get($id, $damage, $count);
                $player->getInventory()->removeItem($food);
                $sendmessage = $config->get("allow-message-steak");
                if($sendmessage === true){
            	   $message = $config->get("message-steak");
            	   $player->sendMessage($message);
             }
             if($item == "Bread" and $enabled === true and $myhealth !== 20) {
            	$health = $config->get("health-earned-bread");
            	$health = $health * 2;
		$sethealth = $myhealth + $health;
	        $player->setHealth($sethealth);
	        $id = 297;
                $damage = 0;
                $count = 1;
                $food =  Item::get($id, $damage, $count);
                $player->getInventory()->removeItem($food);
                $sendmessage = $config->get("allow-message-bread");
                if($sendmessage === true){
            	   $message = $config->get("message-bread");
            	   $player->sendMessage($message);
             }
             if($item == "Melon" and $enabled === true and $myhealth !== 20) {
            	$health = $config->get("health-earned-melon");
            	$health = $health * 2;
		$sethealth = $myhealth + $health;
	        $player->setHealth($sethealth);
	        $id = 360;
                $damage = 0;
                $count = 1;
                $food =  Item::get($id, $damage, $count);
                $player->getInventory()->removeItem($food);
                $sendmessage = $config->get("allow-message-melon");
                if($sendmessage === true){
            	   $message = $config->get("message-melon");
            	   $player->sendMessage($message)
             }
             if($item == "Cooked Chicken" and $enabled === true and $myhealth !== 20) {
            	$health = $config->get("health-earned-chicken");
            	$health = $health * 2;
		$sethealth = $myhealth + $health;
	        $player->setHealth($sethealth);
	        $id = 360;
                $damage = 0;
                $count = 1;
                $food =  Item::get($id, $damage, $count);
                $player->getInventory()->removeItem($food);
                $sendmessage = $config->get("allow-message-chicken");
                if($sendmessage === true){
            	   $message = $config->get("message-chicken");
            	   $player->sendMessage($message)
             }
         }
     }
   }
