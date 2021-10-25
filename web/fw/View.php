<?php

abstract class View {

	public function render() {
		$viewContent = $this->viewContent();
		
		if (get_class($this) == 'LoginView') {
			echo($viewContent);
		} else {
			$layoutContent = $this->layoutContent();
			echo(str_replace("{{content}}", $viewContent, $layoutContent));
		}
	}

	protected function layoutContent() {
		ob_start();
		include_once '../html/Layout.php';
		return ob_get_clean();
	}

	protected function viewContent() {
		ob_start();
		include_once '../html/' . get_class($this) . '.php';
		return ob_get_clean();
	}

}

?>