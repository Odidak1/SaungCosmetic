<?php

namespace Odidak\SaungCosmetics;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\entity\Skin;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerChangeSkinEvent;

use jojoe77777\FormAPI\SimpleForm;

class SCosmetic extends PluginBase implements Listener{

    public $skin = [];

    public function onEnable() : void{
     $this->getServer()->getPluginManager()->registerEvents($this, $this);
     foreach(["A-permission.txt", "agent.png", "allow_block.png", "amethyst.png", "axolotl.png", "barrel.png", "bedrock.png", "bee.png", "blast_furnace.png", "bookshelf.png", "brick.png", "chicken.png", "coal_block.png", "coal_ore.png", "cobblestone.png", "copper_ore.png", "couldron.png", "cow.png", "crafting_table.png", "creeper.png", "deny_block.png", "diamond_block.png", "diamond_ore.png", "dirt_block.png", "dispenser.png", "dropper.png", "emerald_block.png", "emerald_ore.png", "enderman.png", "irongolem.png", "mdrowned.png", "mgolem.png", "mpiglin.png", "mvillager.png", "mzombie.png", "panda.png", "pig.png", "piglin.png", "pillager.png", "skeleton.png", "snowgolem.png", "strider.png", "villager.png", "vindicator.png", "warden.png", "witch.png", "wither.png", "zombie.png", "geometry.mmob.json", "geometry.block.json", "geometry.mob.json"] as $file){
      $this->saveResource($file);
     }
     $this->getLogger()->info("SaungMC Cosmetic Enable");
    }

    public function onCommand(CommandSender $p, Command $commad, string $label, array $args):bool{
    	if($commad->getName("cosmetic")){
    		if($p instanceof Player){
    			$this->OpenUIForm($p);
    			return true;
    		} else {
    			$p->sendMessage("§e[!] gunakan command di dalam game");
    			return true;
    	}
    }
    public function OpenUIForm($p){
    	$form = new SimpleForm(function(Player $p, Int $data = null){
    		if($data === null){
    			return true;
    		}
    		$nll = null;
    		switch($data){
    			case 0:
    				$this->MobUI($p);
    			break;
    			case 1:
    				$this->MMobUI($p);
    			break;
    			case 2:
    				$this->BlockUI($p);
    			break;
    		}
    	});
    	$form->setTitle("Cosmetics");
    	$form->setContent("Pilih kategori cosmetics");
    	$form->addButton("Mob\nCustom Skin", 1, "https://iili.io/dnPoE8b.png");
    	$form->addButton("Mutant\nCustom Skin", 1, "https://iili.io/dnPnw2s.png");
    	$form->addButton("Block\nCustom Skin", 1, "https://iili.io/dnPCBNp.png");
    	$form->sendToPlayer($p);
    	return $form;
    }
    
    public function MobUI($p){
    	$form = new SimpleForm(function(Player $p, Int $data = null){
    		if($data === null){
    			return true;
    		}
    		$nll = null;
    		switch($data){
    			case 0:
    				$p->setSkin($this->skin[$p->getName()]);
          			$p->sendSkin();
          			$p->sendMessage("§eBerhasil mengembalikan skin");
    			break;
    			case 1:
    				if($p->hasPermission("odidak.agent.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."agent.png"), "", "geometry."."agent", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Agent".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 2:
    				if($p->hasPermission("odidak.axolotl.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."axolotl.png"), "", "geometry."."axolotl", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Axolotl".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 3:
    				if($p->hasPermission("odidak.bee.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."bee.png"), "", "geometry."."bee", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Bee".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 4:
    				if($p->hasPermission("odidak.chicken.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."chicken.png"), "", "geometry."."chicken", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Chicken".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 5:
    				if($p->hasPermission("odidak.cow.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."cow.png"), "", "geometry."."cow", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Cow".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 6:
    				if($p->hasPermission("odidak.creeper.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."creeper.png"), "", "geometry."."creeper", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Creeper".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 7:
    				if($p->hasPermission("odidak.enderman.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."enderman.png"), "", "geometry."."enderman", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Enderman".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 8:
    				if($p->hasPermission("odidak.irongolem.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."irongolem.png"), "", "geometry."."irongolem", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Iron Golem".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 9:
    				if($p->hasPermission("odidak.panda.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."panda.png"), "", "geometry."."panda", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Panda".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 10:
    				if($p->hasPermission("odidak.pig.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."pig.png"), "", "geometry."."pig", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Pig".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 11:
    				if($p->hasPermission("odidak.piglin.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."piglin.png"), "", "geometry."."piglin", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Piglin".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 12:
    				if($p->hasPermission("odidak.pillager.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."pillager.png"), "", "geometry."."pillager", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Pillager".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 13:
    				if($p->hasPermission("odidak.skeleton.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."skeleton.png"), "", "geometry."."skeleton", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Skeleton".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 14:
    				if($p->hasPermission("odidak.snowgolem.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."snowgolem.png"), "", "geometry."."snowgolem", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Snow Golem".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 15:
    				if($p->hasPermission("odidak.strider.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."strider.png"), "", "geometry."."strider", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Strider".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 16:
    				if($p->hasPermission("odidak.villager.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."villager.png"), "", "geometry."."villager", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Villager".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 17:
    				if($p->hasPermission("odidak.vindicator.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."vindicator.png"), "", "geometry."."vindicator", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Vindicator".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 18:
    				if($p->hasPermission("odidak.warden.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."warden.png"), "", "geometry."."warden", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Warden".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 19:
    				if($p->hasPermission("odidak.witch.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."witch.png"), "", "geometry."."witch", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Witch".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 20:
    				if($p->hasPermission("odidak.wither.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."wither.png"), "", "geometry."."wither", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Wither".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 21:
    				if($p->hasPermission("odidak.zombie.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."zombie.png"), "", "geometry."."zombie", file_get_contents($this->getDataFolder()."geometry.mob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Zombie".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    		}
    	});
    	$form->setTitle("Mob");
    	$form->setContent("Pilih skin mob yang akan kamu pakai");
    	$form->addButton("Reset");
    	if($p->hasPermission("odidak.agent.skin")){
    		$form->addButton("Agent");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.axolotl.skin")){
    		$form->addButton("Axolotl");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.bee.skin")){
    		$form->addButton("Bee");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.chicken.skin")){
    		$form->addButton("Chicken");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.cow.skin")){
    		$form->addButton("Cow");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.creeper.skin")){
    		$form->addButton("Creeper");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.enderman.skin")){
    		$form->addButton("Enderman");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.irongolem.skin")){
    		$form->addButton("Iron Golem");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.panda.skin")){
    		$form->addButton("Panda");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.pig.skin")){
    		$form->addButton("Pig");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.piglin.skin")){
    		$form->addButton("Piglin");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.pillager.skin")){
    		$form->addButton("Pillager");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.skeleton.skin")){
    		$form->addButton("Skeleton");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.snowgolem.skin")){
    		$form->addButton("Snow Golem");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.strider.skin")){
    		$form->addButton("Strider");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.villager.skin")){
    		$form->addButton("Villager");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.vindicator.skin")){
    		$form->addButton("Vindicator");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.warden.skin")){
    		$form->addButton("Warden");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.witch.skin")){
    		$form->addButton("Witch");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.wither.skin")){
    		$form->addButton("Wither");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.zombie.skin")){
    		$form->addButton("Zombie");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	$form->sendToPlayer($p);
    	return $form;
    }
    
    public function MMobUI($p){
    	$form = new SimpleForm(function(Player $p, Int $data = null){
    		if($data === null){
    			return true;
    		}
    		$nll = null;
    		switch($data){
    			case 0:
    				$p->setSkin($this->skin[$p->getName()]);
          			$p->sendSkin();
          			$p->sendMessage("§eBerhasil mengembalikan skin");
    			break;
    			case 1:
    				if($p->hasPermission("odidak.mdrowned.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."mdrowned.png"), "", "geometry."."mdrowned", file_get_contents($this->getDataFolder()."geometry.mmob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Mutant Drowned".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 2:
    				if($p->hasPermission("odidak.mgolem.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."mgolem.png"), "", "geometry."."mgolem", file_get_contents($this->getDataFolder()."geometry.mmob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Mutant Golem".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 3:
    				if($p->hasPermission("odidak.mpiglin.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."mpiglin.png"), "", "geometry."."mpiglin", file_get_contents($this->getDataFolder()."geometry.mmob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Mutant Piglin".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 4:
    				if($p->hasPermission("odidak.mvillager.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."mvillager.png"), "", "geometry."."mvillager", file_get_contents($this->getDataFolder()."geometry.mmob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Mutant Villager".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 5:
    				if($p->hasPermission("odidak.mzombie.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."mzombie.png"), "", "geometry."."mzombie", file_get_contents($this->getDataFolder()."geometry.mmob.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Mutant Zombie".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    		}
    	});
    	$form->setTitle("Mutant");
    	$form->setContent("Pilih skin mutant mob yang akan kamu pakai");
    	$form->addButton("Reset");
    	if($p->hasPermission("odidak.mdrowned.skin")){
    		$form->addButton("Drowned");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.mgolem.skin")){
    		$form->addButton("Golem");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.mpiglin.skin")){
    		$form->addButton("Piglin");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.mvillager.skin")){
    		$form->addButton("Villager");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.mzombie.skin")){
    		$form->addButton("Zombie");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	$form->sendToPlayer($p);
    	return $form;
    }
    
    public function BlockUI($p){
    	$form = new SimpleForm(function(Player $p, Int $data = null){
    		if($data === null){
    			return true;
    		}
    		$nll = null;
    		switch($data){
    			case 0:
    				$p->setSkin($this->skin[$p->getName()]);
          			$p->sendSkin();
          			$p->sendMessage("§eBerhasil mengembalikan skin");
    			break;
    			case 1:
    				if($p->hasPermission("odidak.allow_block.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."allow_block.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Allow Block".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 2:
    				if($p->hasPermission("odidak.amethyst.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."amethyst.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Amethyst".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 3:
    				if($p->hasPermission("odidak.barrel.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."barrel.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Barrel".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 4:
    				if($p->hasPermission("odidak.bedrock.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."bedrock.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Bedrock".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 5:
    				if($p->hasPermission("odidak.blast_furnace.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."blast_furnace.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Blast Furnace".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 6:
    				if($p->hasPermission("odidak.bookshelf.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."bookshelf.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Bookshelf".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 7:
    				if($p->hasPermission("odidak.brick.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."brick.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Brick".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 8:
    				if($p->hasPermission("odidak.coal_block.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."coal_block.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Coal Block".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 9:
    				if($p->hasPermission("odidak.coal_ore.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."coal_ore.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Coal Ore".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 10:
    				if($p->hasPermission("odidak.cobblestone.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."cobblestone.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Cobblestone".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 11:
    				if($p->hasPermission("odidak.copper_ore.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."copper_ore.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Copper Ore".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 12:
    				if($p->hasPermission("odidak.couldron.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."couldron.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Couldron".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 13:
    				if($p->hasPermission("odidak.crafting_table.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."crafting_table.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Crafting Table".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 14:
    				if($p->hasPermission("odidak.deny_block.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."deny_block.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Deny Block".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 15:
    				if($p->hasPermission("odidak.diamond_block.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."diamond_block.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Diamond Block".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 16:
    				if($p->hasPermission("odidak.diamond_ore.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."diamond_ore.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Diamond Ore".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 17:
    				if($p->hasPermission("odidak.dirt_block.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."dirt_block.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Dirt Block".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 18:
    				if($p->hasPermission("odidak.dispenser.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."dispenser.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Dispenser".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 19:
    				if($p->hasPermission("odidak.dropper.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."dropper.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Dropper".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 20:
    				if($p->hasPermission("odidak.emerald_block.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."emerald_block.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Emerald Block".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    			case 21:
    				if($p->hasPermission("odidak.emerald_ore.skin")){
    					$p->setSkin(new Skin($p->getSkin()->getSkinId(), $this->encodeSkin($this->getDataFolder()."emerald_ore.png"), "", "geometry."."block", file_get_contents($this->getDataFolder()."geometry.block.json")));
          				$p->sendSkin();
          				$p->sendMessage("§aBerhasil mengubah skin §r§f"."Emerald Ore".".");
    				} else {
    					$p->sendMessage("§e[!] Tidak dapat digunakan, Terkunci!");
    				}
    			break;
    		}
    	});
    	$form->setTitle("Block Skin");
    	$form->setContent("Pilih skin block yang akan kamu pakai");
    	$form->addButton("Reset");
    	if($p->hasPermission("odidak.allow_block.skin")){
    		$form->addButton("Allow Block");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.amethyst.skin")){
    		$form->addButton("Amethyst");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.barrel.skin")){
    		$form->addButton("Barrel");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.bedrock.skin")){
    		$form->addButton("Bedrock");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.blast_furnace.skin")){
    		$form->addButton("Blast Furnace");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.bookshelf.skin")){
    		$form->addButton("bookshelf");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.brick.skin")){
    		$form->addButton("Brick");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.coal_block.skin")){
    		$form->addButton("Coal Block");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.coal_ore.skin")){
    		$form->addButton("Coal Ore");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.cobblestone.skin")){
    		$form->addButton("Cobblestone");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.copper_ore.skin")){
    		$form->addButton("Copper Ore");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.couldron.skin")){
    		$form->addButton("Couldron");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.crafting_table.skin")){
    		$form->addButton("Crafting Table");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.deny_block.skin")){
    		$form->addButton("Deny Block");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.diamond_block.skin")){
    		$form->addButton("Diamond Block");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.diamond_ore.skin")){
    		$form->addButton("Diamond Ore");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.dirt_block.skin")){
    		$form->addButton("Dirt Block");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.dispenser.skin")){
    		$form->addButton("Dispenser");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.dropper.skin")){
    		$form->addButton("Dropper");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.emerald_block.skin")){
    		$form->addButton("Emerald Block");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	if($p->hasPermission("odidak.emerald_ore.skin")){
    		$form->addButton("Emerald Ore");
    	} else {
    		$form->addButton("Terkunci");
    	}
    	$form->sendToPlayer($p);
    	return $form;
    }
    
    public function encodeSkin($path){
        $size = getimagesize($path);
        $img = @imagecreatefrompng($path);
        $skinbytes = "";
        for ($y = 0; $y < $size[1]; $y++) {
            for ($x = 0; $x < $size[0]; $x++) {
                $colorat = @imagecolorat($img, $x, $y);
                $a = ((~((int)($colorat >> 24))) << 1) & 0xff;
                $r = ($colorat >> 16) & 0xff;
                $g = ($colorat >> 8) & 0xff;
                $b = $colorat & 0xff;
                $skinbytes .= chr($r) . chr($g) . chr($b) . chr($a);
            }
    }
        @imagedestroy($img);
    return $skinbytes;
    }

    public function onPlayerJoin(PlayerJoinEvent $e){
     $p = $e->getPlayer();
     $this->skin[$p->getName()] = $p->getSkin();
    }

    public function onPlayerQuit(PlayerQuitEvent $e){
     $p = $e->getPlayer();
     unset($this->skin[$p->getName()]);
    }

    public function onPlayerChangeSkin(PlayerChangeSkinEvent $e){
     $p = $e->getPlayer();
     $this->skin[$p->getName()] = $p->getSkin();
    }

}
