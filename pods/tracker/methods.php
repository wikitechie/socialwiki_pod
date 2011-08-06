<?

	// return an array of variables that should be captured in the settings screen
	function trackerSetup() {
		return array(
			'Tracking'=>'turn tracking on/off'
		);
	}

	function JavaScriptInit($POD){
		$alerts = $POD->getAlerts(array('id:gt'=>0))->asArray();
		$lastId = $alerts[0]['id'];
		echo "var lastAlertId = $lastId";
	}

	PeoplePod::registerMethod('JavaScriptInit');
	
	function trackerInstall($POD) {
	
	}
	
	function trackerUninstall($POD) {
	
	}