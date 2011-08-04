<?

	
	// return an array of variables that should be captured in the settings screen
	function trackerSetup() {
		return array(
			'sampleSetting1'=>'Setting 1',
			'sampleSetting2'=>'Setting 2',
		);
	}

	function trackerContentMethod($content) { 
		echo 'This is output from $sampleContentMethod() called on a piece of content with the title "' . $content->headline . '"';
	}

	function trackerPersonMethod($person) { 
		echo "trackerPersonMethod() called on " . $person->nick;	
	}
	
		
	Content::registerMethod('trackerContentMethod');
	Person::registerMethod('trackerPersonMethod');
	
	Content::addDatabaseFields(array('sampleField'=>array()));
	
	function sampleInstall($POD) {
		//$POD->executeSQL('alter table content add sampleField varchar(10)');
	}
	
	function sampleUninstall($POD) {
		//$POD->executeSQL('Alter table content drop sampleField');
	}