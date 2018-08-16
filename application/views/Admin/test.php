<?php
	echo "<table border='1px'>";
	echo "<tr><th>Video Name</th><th>Picture URL</th><th>Video URL</th><th>Action</th></tr>";
	
	foreach ($result as $value) {
		echo "<tr align='center'>";
		echo "<td>$value->vName</td>";
		echo "<td>$value->picURL</td>";
		echo "<td>$value->vURL</td>";
		echo "<td><a href='".base_url('/Admin/gameVideoDelete')."?v_id=".$value->v_id."'><button class='button'>Delete</button></a></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<a href=".base_url('/Admin/gameVideoAdd').">Add New Video</a>";
?>