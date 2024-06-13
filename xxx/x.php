<?php
$row = 1;
if (($handle = fopen("b.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $row++;
		$nids[] = $data[0];
		if($data[7] > 0) {
			echo " INSERT INTO `field_data_field_cat_country` (`entity_type`, `bundle`, `deleted`, `entity_id`, `revision_id`, `language`, `delta`, `field_cat_country_tid`) VALUES ('node', 'where_to', '0', '".$data[0]."', null, 'und', '0', '".$data[7]."');<br/>";
			
		}
		$delta = 0;
		if($data[2] > 0) {
			echo "INSERT INTO `field_data_field_cat_place_type` (`entity_type`, `bundle`, `deleted`, `entity_id`, `revision_id`, `language`, `delta`, `field_cat_place_type_tid`) VALUES ('node', 'where_to', '0', '".$data[0]."', 'null', 'und', '".$delta."', '".$data[2]."');<br/>";
			$delta++;
		}
		
		if($data[3] > 0) {
			echo "INSERT INTO `field_data_field_cat_place_type` (`entity_type`, `bundle`, `deleted`, `entity_id`, `revision_id`, `language`, `delta`, `field_cat_place_type_tid`) VALUES ('node', 'where_to', '0', '".$data[0]."', 'null', 'und', '".$delta."', '".$data[3]."');<br/>";
		$delta++;
		}
		if($data[4] > 0) {
			echo "INSERT INTO `field_data_field_cat_place_type` (`entity_type`, `bundle`, `deleted`, `entity_id`, `revision_id`, `language`, `delta`, `field_cat_place_type_tid`) VALUES ('node', 'where_to', '0', '".$data[0]."', 'null', 'und', '".$delta."', '".$data[4]."');<br/>";
		$delta++;
		}
		if($data[5] > 0) {
			echo "INSERT INTO `field_data_field_cat_place_type` (`entity_type`, `bundle`, `deleted`, `entity_id`, `revision_id`, `language`, `delta`, `field_cat_place_type_tid`) VALUES ('node', 'where_to', '0', '".$data[0]."', 'null', 'und', '".$delta."', '".$data[5]."');<br/>";
		$delta++;
		}
    }
	echo implode(", ", $nids);
    fclose($handle);
}
?>