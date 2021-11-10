<?php

abstract class View {

	public function render() {
		include_once '../html/' . get_class($this) . '.php';
	}

}

?>