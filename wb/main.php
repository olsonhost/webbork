<?php

class WebBork {

	protected $CFG, $URI;

	public function _construct($cfg) {

		$this->CFG = $this->prep($cfg);

		$this->URI = $_SERVER['REQUEST_URI'];

	}

	public function handle() {


		if (!isset($this->CFG['map'][$URI])) {

			return $this->error("Missing Route");

		}

		return $this->exec($this->CFG['map'][$URI]);


	}

	public function page() {

	}

	// Some basic functionality for building a web page

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

	public function prep($cfg) {

		// parse thie lines in the config file to produce the $CFG object




	}

}
