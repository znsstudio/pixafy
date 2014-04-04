<?php

$role = Session::get('role');

?>

Samir Yahyazade / Dashboard

<hr>

<form action=/dashboard/update method=post enctype='multipart/form-data'>

email : <input type=text name=login value='<?php echo $this->email; ?>' size=50>

<br>

<input type=submit value=update class=btn>

</form>	

<hr>

<form action=/dashboard/upload method=post enctype='multipart/form-data'>

<input type=file name=pic size=30> <input type=submit value=upload class=btn>

</form>	

<hr>

Users use drag and drop to change the order

<p>

<form action=/dashboard/deleteSelected method=post enctype='multipart/form-data'>

<div class=row data-<?php echo $role; ?>>	

<?php

foreach($this->photoList as $key=>$value){

echo "<div  class=col-lg-2 id=photo_$value[id] data-id=photo[$value[id]]>

<img src=/files/$value[photo_src] style='width:100%'>

<br>

<input type=checkbox value=$value[id] name=photos[]> <a href=# onclick=delete_photo('$value[id]')>DELETE</a>";

	if($role=="owner"){

		echo " | Photo by <a href=/dashboard/index/filter/".$value[user_id].">".$value[login]."</a>";

	}

echo "</div>";

}

?>

</div>

<input type=submit value='delete selected' class=btn>

</form>	

<hr>

<a href=/dashboard> View All Photos</a> 