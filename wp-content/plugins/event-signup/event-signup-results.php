<?php

page_template(function() {
?><div class="page"><?php

global $wpdb;
global $table_name;

$results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY timeslot");
$totals = $wpdb->get_results("SELECT timeslot, SUM(adult_count) AS total_adults, SUM(child_count) AS total_children FROM $table_name GROUP BY timeslot ORDER BY timeslot");

?>

<table class="results-table">
   <tr>
      <th>name</th>
      <th>email</th>
      <th>time slot</th>
      <th># of adults</th>
      <th># of children</th>
   </tr>
   <?php
   foreach ($results as $result)
   { ?>
      <tr>
         <td><?php echo $result->name; ?></td>
         <td><?php echo $result->email; ?></td>
         <td><?php echo $result->timeslot; ?></td>
         <td><?php echo $result->adult_count; ?></td>
         <td><?php echo $result->child_count; ?></td>
      </tr>
   <?php } ?>
</table>
<table class="results-table">
   <tr>
      <th>time slot</th>
      <th>total adults</th>
      <th>total children</th>
   </tr>
   <?php
   foreach ($totals as $result)
   { ?>
      <tr>
         <td><?php echo $result->timeslot; ?></td>
         <td><?php echo $result->total_adults; ?></td>
         <td><?php echo $result->total_children; ?></td>
      </tr>
   <?php } ?>
</table>

</div><?php });