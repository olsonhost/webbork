<?php

class WebBork {

	protected $CFG, $URI;

	public function _construct($cfg) {

		$this->CFG = $this->prep($cfg);

		$this->URI = $_SERVER['REQUEST_URI'];

	}

	public function prep($cfg) {

		// parse thie lines in the config file to produce the $CFG object

		$this->CFG = [];

		$cfg = str_replace([chr(13), chr(10)], chr(1), $cfg);

		$cfg = explode(chr(1),$cfg);

		$group = 'main';

		foreach ($cfg as $line) {

			$line = trim($line, " \t");

			if ($line == '') continue;

			$char = $line[0];

			if ($char == '#' || $char == '/') continue;

			if ($char == '/') {
				$group = $line;
				$this->CFG[$group] = [];
				continue;
			}

			$this->CFG[$group][] = $line;
		}
	}
	public function error($msg) {
		return "Error:" . $msg;
	}
	public function handle() {

		if (!isset($this->CFG[$this->URI])) {

			return $this->error("Missing Route");

		}

		return $this->exec($this->CFG['map'][$this->URI]);

	}

	public function page() {

		if (!isset($this->CFG[$this->URI])) {

			return $this->error("Missing Route");

		}

		return $this->exec($this->CFG['map'][$this->URI]);


	}

	// Some basic functionality for building a web page
	public function exec($array) {

		// Turn $array into a web page or ajax response

		var_dump($array);

		return "Send back output!"

	}


	public function header($title = "WebBork") {

		echo "<!DOCTYPE html><html><head><title>$title</title>";

		foreach (glob("wb/css/*.css") as $css) {
		    echo "<link type='text/css' rel='stylesheet' href='$css'>\n";
			}
		foreach (glob("wb/js/*.js") as $css) {
		    echo "<script type='text/javascript' src='$css'></script>\n";
		}

		echo "</head>";
	}



}
