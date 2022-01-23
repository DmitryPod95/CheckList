<?php

session_start();

if (isset($_POST['action'])) {

	if(strcmp($_POST['action'], 'logout') == 0)
	{
		session_destroy();
	}
}