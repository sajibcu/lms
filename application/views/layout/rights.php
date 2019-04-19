<?php
	print_r($category_information_for_rights);die;
	$view		= 0;
	$add 		= 0;
	$edit 		= 0;
	$delete 	= 0;

	foreach($category_information_for_rights as $row)
	{
		if($row->operation == 'View') $view =1;
		if($row->operation == 'Add') $add =1;
		if($row->operation == 'Edit') $edit =1;
		if($row->operation == 'Delete') $delete =1;
	}

	define("VIEW",$view,TRUE);
	define("ADD",$add,TRUE);
	define("EDIT",$edit,TRUE);
	define("DELETED",$delete,TRUE);


?>