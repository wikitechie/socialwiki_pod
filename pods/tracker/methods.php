<?

	// return an array of variables that should be captured in the settings screen
	function trackerSetup() {
		return array(
			'Tracking'=>'turn tracking on/off'
		);
	}

	function JavaScriptInit($POD){
		$alerts = $POD->getAlerts(array('id:gt'=>0))->asArray();
		if ($alerts->count() > 0)
			$lastId = $alerts[0]['id'];
		else
			$lastId = 0;
		echo "var lastAlertId = $lastId";
	}

	PeoplePod::registerMethod('JavaScriptInit');
	
	function trackerInstall($POD) {
	
	}
	
	function trackerUninstall($POD) {
	
	}