<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/


namespace pocketmine\network\mcpe\protocol;

#include <rules/DataPacket.h>


use pocketmine\network\mcpe\NetworkSession;

class StopSoundPacket extends DataPacket{
	const NETWORK_ID = ProtocolInfo::STOP_SOUND_PACKET;

	public $string1;
	public $stopAll;

	public function decode(){
		$this->string1 = $this->getString();
		$this->stopAll = $this->getBool();
	}

	public function encode(){
		$this->reset();
		$this->putString($this->string1);
		$this->putBool($this->stopAll);
	}

	public function handle(NetworkSession $session) : bool{
		return $session->handleStopSound($this);
	}
}