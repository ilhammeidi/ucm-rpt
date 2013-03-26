<?php

global $user;
if (!in_array("Quiz Master", $user->roles) && !in_array("Faculty Instructor", $user->roles) && !user_access('administer')) {
	$restrict_student = " AND `m`.`uid` = '" . $user->uid . "'";
} else if (!in_array("Quiz Master", $user->roles) && !user_access('administer')) {
	$restrict_faculty = " AND `m`.`og_uid_nid` IN ((SELECT `nid` FROM `og_uid` WHERE `is_admin` = 1 and `uid` = ". $user->uid . "))";
}

if ($user -> uid <> 0) {// allow only authenticated users

	$sec1_points = 6;
	$sec2_points = 3;
	$sec3_points = 3;
	$sec4_points = 2;
	$sec5_points = 5;
	$sec6_points = 5;
	$sec7_points = 3;

	$total_sections_raw_completed = "if(`s1`.`score_max` IS NULL, 0, 1) + if(`s2`.`score_max` IS NULL, 0, 1) + if(`s3`.`score_max` IS NULL, 0, 1) + if(`s4`.`score_max` IS NULL, 0, 1) + if(`s5`.`score_max` IS NULL, 0, 1) + if(`s6`.`score_max` IS NULL, 0, 1) + if(`s7`.`score_max` IS NULL, 0, 1)";
	$total_correct_raw_completed = "if(`s1`.`num_correct` IS NULL, 0, `s1`.`num_correct`) + if(`s2`.`num_correct` IS NULL, 0, `s2`.`num_correct`) + if(`s3`.`num_correct` IS NULL, 0, `s3`.`num_correct`) + if(`s4`.`num_correct` IS NULL, 0, `s4`.`num_correct`) + if(`s5`.`num_correct` IS NULL, 0, `s5`.`num_correct`) + if(`s6`.`num_correct` IS NULL, 0, `s6`.`num_correct`) + if(`s7`.`num_correct` IS NULL, 0, `s7`.`num_correct`)";
	$total_sections_points_completed = "if(`s1`.`num_correct` IS NULL, 0, " . $sec1_points . ") + if(`s2`.`num_correct` IS NULL, 0, " . $sec2_points . ") + if(`s3`.`num_correct` IS NULL, 0, " . $sec3_points . ") + if(`s4`.`num_correct` IS NULL, 0, " . $sec4_points . ") + if(`s5`.`num_correct` IS NULL, 0, " . $sec5_points . ") + if(`s6`.`num_correct` IS NULL, 0, " . $sec6_points . ") + if(`s7`.`num_correct` IS NULL, 0, " . $sec7_points . ")";
	$total_sections_points_all = $sec1_points + $sec2_points + $sec3_points + $sec4_points + $sec5_points + $sec6_points + $sec7_points;

	$sql = "select `m`.`user_mail` AS `user_mail`,
		`n`.`title` AS `section_title`,
		FROM_UNIXTIME(`s1`.`time_end`,'%%d-%%b-%%y') AS `s1_date_end`,CONCAT(`s1`.`num_correct`,'/" . $sec1_points . "') AS `s1_num_correct`,`s1`.`score_max` AS `s1_score`,
		FROM_UNIXTIME(`s2`.`time_end`,'%%d-%%b-%%y') AS `s2_date_end`,CONCAT(`s2`.`num_correct`,'/" . $sec2_points . "') AS `s2_num_correct`,`s2`.`score_max` AS `s2_score`,
		FROM_UNIXTIME(`s3`.`time_end`,'%%d-%%b-%%y') AS `s3_date_end`,CONCAT(`s3`.`num_correct`,'/" . $sec3_points . "') AS `s3_num_correct`,`s3`.`score_max` AS `s3_score`,
		FROM_UNIXTIME(`s4`.`time_end`,'%%d-%%b-%%y') AS `s4_date_end`,CONCAT(`s4`.`num_correct`,'/" . $sec4_points . "') AS `s4_num_correct`,`s4`.`score_max` AS `s4_score`,
		FROM_UNIXTIME(`s5`.`time_end`,'%%d-%%b-%%y') AS `s5_date_end`,CONCAT(`s5`.`num_correct`,'/" . $sec5_points . "') AS `s5_num_correct`,`s5`.`score_max` AS `s5_score`,
		FROM_UNIXTIME(`s6`.`time_end`,'%%d-%%b-%%y') AS `s6_date_end`,CONCAT(`s6`.`num_correct`,'/" . $sec6_points . "') AS `s6_num_correct`,`s6`.`score_max` AS `s6_score`,
		FROM_UNIXTIME(`s7`.`time_end`,'%%d-%%b-%%y') AS `s7_date_end`,CONCAT(`s7`.`num_correct`,'/" . $sec7_points . "') AS `s7_num_correct`,`s7`.`score_max` AS `s7_score`,
		CONCAT(" . $total_sections_raw_completed . ", '/7') AS `total_sections_raw_completed`,
		ROUND((" . $total_sections_raw_completed . ") / 7 * 100, 2) AS `total_sections_raw_completed_percent`,
		CONCAT(" . $total_correct_raw_completed . ",'/'," . $total_sections_points_completed . ") AS `total_correct_raw_completed`,
		ROUND(((" . $total_correct_raw_completed . ") / (" . $total_sections_points_completed . ")) * 100, 2) AS `total_correct_raw_completed_percent`,
		CONCAT(" . $total_correct_raw_completed . ",'/'," . $total_sections_points_all . ") AS `total_correct_raw_all`,		
		ROUND(((" . $total_correct_raw_completed . ") / (" . $total_sections_points_all . ")) * 100, 2) AS `total_correct_raw_all_percent`
	 	from (((((((`quiz_report_members_all` `m` 
		left join (" . get_section_scores(1) . ") `s1` on((`m`.`uid` = `s1`.`taker_uid`))) 
		left join (" . get_section_scores(2) . ") `s2` on((`m`.`uid` = `s2`.`taker_uid`))) 
		left join (" . get_section_scores(3) . ") `s3` on((`m`.`uid` = `s3`.`taker_uid`))) 
		left join (" . get_section_scores(4) . ") `s4` on((`m`.`uid` = `s4`.`taker_uid`))) 
		left join (" . get_section_scores(5) . ") `s5` on((`m`.`uid` = `s5`.`taker_uid`))) 
		left join (" . get_section_scores(6) . ") `s6` on((`m`.`uid` = `s6`.`taker_uid`))) 
		left join (" . get_section_scores(7) . ") `s7` on((`m`.`uid` = `s7`.`taker_uid`)))
		left join node `n` on `m`.`og_uid_nid` = `n`.`nid`
		where (`m`.`uid` > 1) AND `m`.`og_uid_is_admin` = 0 AND (" . $total_sections_raw_completed . ") > 0 " 
		. $restrict_faculty 
		. $restrict_student 
		. "order by `n`.`title` ASC, `m`.`user_mail` ASC";

	$res = db_query($sql);

	if ($res === FALSE) {
		die(mysql_error());
		// TODO: better error handling
	}
	if ($_GET['getcsv'] == 1) {
		$list = array ();
		while ($row = db_fetch_array($res)) {
			// $list[] = array($row['user_mail'] . "," . $row['section_title'] . "," . $row['s1_date_end'] . "," . $row['s1_num_correct'] . "," . $row['s1_score'] . "," . $row['s2_date_end'] . "," . $row['s2_num_correct'] . "," . $row['s2_score'] . "," . $row['s3_date_end'] . "," . $row['s3_num_correct'] . "," . $row['s3_score'] . "," . $row['s4_date_end'] . "," . $row['s4_num_correct'] . "," . $row['s4_score'] . "," . $row['s5_date_end'] . "," . $row['s5_num_correct'] . "," . $row['s5_score'] . "," . $row['s6_date_end'] . "," . $row['s6_num_correct'] . "," . $row['s6_score'] . "," . $row['s7_date_end'] . "," . $row['s7_num_correct'] . "," . $row['s7_score'] . "," . $row['total_sections_raw_completed'] . "," . $row['total_sections_raw_completed_percent'] . "," . $row['total_correct_raw_completed'] . "," . $row['total_correct_raw_completed_percent'] . "," . $row['total_correct_raw_all'] . "," . $row['total_correct_raw_all_percent']);
			$list[] = $row;
		};

		download_csv_results ($list,'summary-scores' . date('YmdHis') . '.csv');
		exit();
	} else {
		echo "<h1>Quiz Reports</h1>";
		echo "<div id=\"report-table\">
          <table class=\"views-table sticky-enabled cols-8\">
          <thead><tr>
			<th class=\"views-field\" rowspan=\"2\">Student Email</th>
			<th class=\"views-field\" rowspan=\"2\">Subj_Course_Sec</th>
			<!-- th class=\"views-field\" rowspan=\"2\">Is_Admin</th -->
			<th class=\"views-field\" colspan=\"3\">Section 1: Begin Research</th>
			<th class=\"views-field\" colspan=\"3\">Section 2: Knowledge Cycle</th>
			<th class=\"views-field\" colspan=\"3\">Section 3: Find Books</th>
			<th class=\"views-field\" colspan=\"3\">Section 4: Find Articles</th>
			<th class=\"views-field\" colspan=\"3\">Section 5: Make Citations</th>
			<th class=\"views-field\" colspan=\"3\">Section 6: Basic Search</th>
			<th class=\"views-field\" colspan=\"3\">Section 7: Advanced Search</th>
			<th class=\"views-field\" rowspan=\"2\">Total Sections Completed (Raw)</th>
			<th class=\"views-field\" rowspan=\"2\">Total Sections Completed (%)</th>
			<th class=\"views-field\" rowspan=\"2\">Total Score (Raw) Completed Sections Only</th>
			<th class=\"views-field\" rowspan=\"2\">Total Score (%) Completed Sections Only</th>
			<th class=\"views-field\" rowspan=\"2\">Total Score (Raw) All Sections</th>
			<th class=\"views-field\" rowspan=\"2\">Total Score (%) All Sections</th>
		</tr>
		<tr>
			<th class=\"views-field\">Date Completed</th><th class=\"views-field\">Num Correct</th><th class=\"views-field\">% Correct</th>
			<th class=\"views-field\">Date Completed</th><th class=\"views-field\">Num Correct</th><th class=\"views-field\">% Correct</th>
			<th class=\"views-field\">Date Completed</th><th class=\"views-field\">Num Correct</th><th class=\"views-field\">% Correct</th>
			<th class=\"views-field\">Date Completed</th><th class=\"views-field\">Num Correct</th><th class=\"views-field\">% Correct</th>
			<th class=\"views-field\">Date Completed</th><th class=\"views-field\">Num Correct</th><th class=\"views-field\">% Correct</th>
			<th class=\"views-field\">Date Completed</th><th class=\"views-field\">Num Correct</th><th class=\"views-field\">% Correct</th>
			<th class=\"views-field\">Date Completed</th><th class=\"views-field\">Num Correct</th><th class=\"views-field\">% Correct</th>
		</tr>
</thead>
<tbody>";
		
        $i = 0;
	while ($row = db_fetch_array($res)) {
		echo "<tr class='".($i%2 ? 'odd' : 'even')."'>";
		echo "<td>" . $row['user_mail'] . "</td><td>" . $row['section_title'] . "</td><!-- td>" . $row['is_admin'] . "</td -->" . "<td>" . $row['s1_date_end'] . "</td><td>" . $row['s1_num_correct'] . "</td><td>" . $row['s1_score'] . "</td>" . "<td>" . $row['s2_date_end'] . "</td><td>" . $row['s2_num_correct'] . "</td><td>" . $row['s2_score'] . "</td>" . "<td>" . $row['s3_date_end'] . "</td><td>" . $row['s3_num_correct'] . "</td><td>" . $row['s3_score'] . "</td><td>" . $row['s4_date_end'] . "</td><td>" . $row['s4_num_correct'] . "</td><td>" . $row['s4_score'] . "</td>" . "<td>" . $row['s5_date_end'] . "</td><td>" . $row['s5_num_correct'] . "</td><td>" . $row['s5_score'] . "</td>" . "<td>" . $row['s6_date_end'] . "</td><td>" . $row['s6_num_correct'] . "</td><td>" . $row['s6_score'] . "</td>" . "<td>" . $row['s7_date_end'] . "</td><td>" . $row['s7_num_correct'] . "</td><td>" . $row['s7_score'] . "</td>" . "<td>" . $row['total_sections_raw_completed'] . "</td><td>" . $row['total_sections_raw_completed_percent'] . "</td>" . "<td>" . $row['total_correct_raw_completed'] . "</td><td>" . $row['total_correct_raw_completed_percent'] . "</td>" . "<td>" . $row['total_correct_raw_all'] . "</td><td>" . $row['total_correct_raw_all_percent'] . "</td>";
		echo "</tr>";
        $i++;
	}
	}
	echo "</tbody></table>
</div>
<div class=\"feed-icon\">
      <a href=\"?getcsv=1\"><img src=\"../sites/all/modules/views_export_xls/images/xls-icon.jpg\" alt=\"Excel icon\" title=\"Download CSV for Excel Spreadsheet\" height=\"18\" width=\"18\"></a>
</div>";

} else {
	echo "<p>Login required to view this page</p>";
} // end logged-in user section.

function get_section_scores($sec) {
	$sql = "select `quiz_report_scores_max`.`taker_uid` AS `taker_uid`,round((max((`quiz_report_scores_max`.`score_max` * `quiz_report_scores_max`.`num_questions`)) / 100),0) AS `num_correct`,`quiz_report_scores_max`.`num_questions` AS `num_questions`,`quiz_report_scores_max`.`score_max` AS `score_max`,`quiz_report_scores_max`.`time_end` AS `time_end` from `quiz_report_scores_max` where (`quiz_report_scores_max`.`quiz_title` like _utf8'Section " . $sec . "%') group by `quiz_report_scores_max`.`taker_uid`";
	return $sql;
} 

function download_csv_results($results, $name = NULL)
{
    if( ! $name)
    {
        $name = md5(uniqid() . microtime(TRUE) . mt_rand()). '.csv';
    }

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename='. $name);
    header('Pragma: no-cache');
    header("Expires: 0");

    $outstream = fopen("php://output", "w");
    echo "\"Student Email\",Subj_Course_Sec,\"Sec1 Date Completed\",\"Sec1 Number Correct\",\"Sec1 % Correct\",\"Sec2 Date Completed\",\"Sec2 Number Correct\",\"Sec2 % Correct\",\"Sec3 Date Completed\",\"Sec3 Number Correct\",\"Sec3 % Correct\",\"Sec4 Date Completed\",\"Sec4 Number Correct\",\"Sec4 % Correct\",\"Sec5 Date Completed\",\"Sec5 Number Correct\",\"Sec5 % Correct\",\"Sec6 Date Completed\",\"Sec6 Number Correct\",\"Sec6 % Correct\",\"Sec7 Date Completed\",\"Sec7 Number Correct\",\"Sec7 % Correct\",\"Total Sections Completed (Raw)\",\"Total Sections Completed (%)\",\"Total Score (Raw) Completed Sections Only\",\"Total Score (%) Completed Sections Only\",\"Total Score (Raw) All Sections\",\"Total Score (%) All Sections\"\n";
    foreach($results as $result)
    {
        fputcsv($outstream, str_replace('/',' of ', $result), ',', '"'); // Replace slash with ' of ' so cells don't get converted to dates in Excel.
    }

    fclose($outstream);
}

?>