<?
	// in this pod we must output JSON only

	// include the peoplepods library and instantiate a pod object
	require_once("../../PeoplePods.php");
	$POD = new PeoplePod(array('authSecret'=>@$_COOKIE['pp_auth'],'debug'=>2));
	
	$id=0;
	if (isset($_GET['id'])) { 
		$id=$_GET['id'];	
	}
	$alerts = $POD->getAlerts(array('id:gt' => $id));
	$secCount = 0;
	while ($alerts->count() == 0)
	{
		usleep(1000000 * 1);
		$secCount++;
		if ($secCount >=3)
		{
			echo json_encode(array('count'=>0));
			exit;
		}
		$alerts = $POD->getAlerts(array(
				'id:gt' => $id)
		);
	}
	
	$data = array();
	$data['alerts'] = $alerts->asArray();
	$data['count']	= $alerts->count();
	$POD->startBuffer();
	$alerts->output('output',null,null,null);
	$data['html'] = $POD->endBuffer();
	echo json_encode($data);