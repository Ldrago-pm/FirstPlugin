<?php 

declare(strict_types=1); 

namespace FirstPlugin\XenialEmperus;

use pocketmine\plugin\PluginBase;
use pocketmine\events\Listener;
use pocketmine\player\Player;
use pocketmine\server;
use pocketmine\item\ItemFactory;

use pocketmine\command\Commamd;
use pocketmine\command\CommandSender;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\player\PlayerDropItemEvent;

use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
 
class Main extends PluginBase 
{
  
 public function onEnable(): void {
 $this->getLogger()->info("plugin test by rishi enabled successfully");
 @mkdir($this->getDataFolder());
 $this->saveDefaultConfig();
 $this->getResource("Config.yml");
 $this->getServer()->getPluginManager()->registerEvents($this, $this);
    } 
  
 public function onCommand(CommandSender $sender, Command $command, string $label , array $args): bool {    
 
  if($command->getName() == "Test"){
  if($sender instanceof Player){
      $this->newSimpleForm($sender);
   } else { 
  $sender->sendMessage("Run Command In-game Only");
     }
 }
   
   return true;
  }
  
  public function newSimpleForm($player){
      $form = new SimpleForm(function(Player $player, int $data = null){
          if($data === null){
           return true;
    }
        
        switch($data){ 
         case 0:
                $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("profile"));  
            break; 

         case 1:
             $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("fasttravel"))
            break;
            
         case 2:
             $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("bank"))
             break;
            
          case 3:
              $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("job"));     
            break;
            
          case 4:       
              $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("shop"));
            break;
            
          case 5: 
              $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("island"));        
            break;
     }       
       
});   
$form->setTitle("SkyBlock Menu");
$form->setContent("Your SkyBlock Menu!"
$form->addButton("Your Profile\nClick To View", "0", "textures/ui/icon_steve");  
$form->addButton("Fast Travel\nClick TO Open Menu", "0", "textures/ui/icon_bookshelf");
$form->addButton("Bank\nClick To Open Bank", "0", "textures/ui/absorption_heart");
            
            
