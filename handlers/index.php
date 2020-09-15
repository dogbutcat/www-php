<?php

if(INVITE_ONLY || REQUEST_LOGIN){
	if(!is_object($this->user)){
		if($request->getUri()->getPath() == '/register'){
			$this->view->register = true;
		}
		if(isset($args['invitation'])){
			$this->view->registerform = $args;
			$this->view->register = true;
		}
		// can't render auth directly, redirect to login page
		// return $this->view->render($response, 'auth');
		return $this->view->redirect($response, '/login');
	}
}

include(ROOT . '/handlers/search.php');

?>