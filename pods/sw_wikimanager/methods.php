<?

	
	// return an array of variables that should be captured in the settings screen
	function wikiManagerSetup() {
		return array(
			'AdminName'=>'Admin user to check wikis',
			'AdminPassword'=>'Admin Password',
		);
	}
	
	function wikiManagerInstall($POD) {
		//$POD->executeSQL('alter table content add sampleField varchar(10)');
	}
	
	function wikiManagerUninstall($POD) {
		//$POD->executeSQL('Alter table content drop sampleField');
	}
