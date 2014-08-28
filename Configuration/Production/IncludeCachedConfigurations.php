<?php
if (FLOW_PATH_ROOT !== '/var/www/typo.flow/' || !file_exists('/var/www/typo.flow/Data/Temporary/Production/Configuration/ProductionConfigurations.php')) {
	unlink(__FILE__);
	return array();
}
return require '/var/www/typo.flow/Data/Temporary/Production/Configuration/ProductionConfigurations.php';