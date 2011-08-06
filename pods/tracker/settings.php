<?

	$POD->registerPOD(
		'AjaxTracker',									// this is the name of the pod. it should match the folder name.
		'This Pod tracks your updates wthout reloading the page',		// this is the description of the pod. it shows up in the command center.
		array(
			'^update$'=>'tracker/handler.php',		// set up the /sample url to handle requets
			'^update/(.*)'=>'tracker/handler.php?id=$1',	// set up the /sample/* to handle requets
		),
		array(
			'tracker_variable'=>true,				// if this pod is enabled, value can be accessed via $POD->libOptions('sample_pod_variable');
		),
		dirname(__FILE__) . "/methods.php",				// tells PeoplePods to add custom methods included in the methods.php file
		'trackerSetup',									// tells PeoplePods to call sampleSetup as the setup function for this pod.
		'trackerInstall',								// tells PeoplePods to call this function when the pod is turned on
		'trackerUninstall'								// tells PeoplePods to call this function when the pod is turned off.
	);