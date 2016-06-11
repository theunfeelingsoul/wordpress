<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../wp-content/themes/compass/bootstrap/css/bootstrap.css">	

<?php 

global $wpdb;

	// get the questions 
	$sql = "SELECT * FROM {$wpdb->prefix}survey_ques";
	$sq = $wpdb->get_results( $sql, 'ARRAY_A' );

	

	if (!isset($_POST['the_date'])) {
		$the_date = date('M');
	}else{
		$the_date = $_POST['the_date'];
	}
	// use the ID from the questions table in the following query 
	foreach ($sq as $key => $q):
		// create variable for the question id
		$survey_ques_id = $q['id'];

		// array for the yes results
		$q_yes[] = $wpdb->get_var( "SELECT COUNT(*) 
									FROM {$wpdb->prefix}survey_ans 
									WHERE q_id= $survey_ques_id AND ans=1 AND the_date='$the_date'" 
								);

		// array for the no results
		$q_no[]  = $wpdb->get_var( "SELECT COUNT(*) 
									FROM {$wpdb->prefix}survey_ans 
									WHERE q_id= $survey_ques_id AND ans=0 AND the_date='$the_date'" 
								);
	endforeach;
?>


	<!-- // create hidden inputs
	// 		the value the query result on all questions -->
	<?php foreach ($q_yes as $key => $q_yea):?>
		<input type="hidden" name="" id="<?php echo 'q_'.$key.'_yes' ?>" value="<?= $q_yea; ?>">
	<?php endforeach;?>

	<?php foreach ($q_no as $key => $q_naa):?>
		<input type="hidden" name="" id="<?php echo 'q_'.$key.'_no' ?>" value="<?= $q_naa; ?>">
	<?php endforeach;?>


<!--  -->
<input type="hidden" name="" id="the_date" value="<?=$the_date;  ?>">


	<div class="row">
		<div class="col-md-offset-4">
			<h1>Survey Analysis</h1>
				<form action="<?= the_permalink() ?>" method="post" class="form-inline"> 

					<div class="form-group">
						<label>Select a month</label>
						<select class="form-control input-lg" name="the_date"> 
						  <option value="">Select a month</option>
						  <option value="January" <?= $the_date=='January'?'selected':'' ?>>January</option>
						  <option value="February" <?= $the_date=='February'?'selected':'' ?>>February</option>
						  <option value="March" <?= $the_date=='March'?'selected':'' ?>>March</option>
						  <option value="April" <?= $the_date=='April'?'selected':'' ?>>April</option>
						  <option value="May" <?= $the_date=='May'?'selected':'' ?>>May</option>
						  <option value="June" <?= $the_date=='June'?'selected':'' ?>>June</option>
						  <option value="July" <?= $the_date=='July'?'selected':'' ?>>July</option>
						  <option value="August" <?= $the_date=='August'?'selected':'' ?>>August</option>
						  <option value="September" <?= $the_date=='September'?'selected':'' ?>>September</option>
						  <option value="October" <?= $the_date=='October'?'selected':'' ?>>October</option>
						  <option value="November" <?= $the_date=='November'?'selected':'' ?>>November</option>
						  <option value="December" <?= $the_date=='December'?'selected':'' ?>>December</option>
						</select>
						<!-- <span class="help-block">Select a month.</span> -->
					</div>
					<input type="submit" name="sub" value="choose" class="btn btn-primary input-lg">
				</form>
		</div>
	</div>
	<hr>
	<div class="row">
		<div id="container" class="container-fluid"></div>
	</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
	$(function () {
			var Q_0_yes = parseInt($( "#q_0_yes" ).val());
			var Q_1_yes = parseInt($( "#q_1_yes" ).val());
			var Q_2_yes = parseInt($( "#q_2_yes" ).val());
			var Q_3_yes = parseInt($( "#q_3_yes" ).val());
			var Q_4_yes = parseInt($( "#q_4_yes" ).val());
			var Q_5_yes = parseInt($( "#q_5_yes" ).val());
			var Q_6_yes = parseInt($( "#q_6_yes" ).val());
			var Q_7_yes = parseInt($( "#q_7_yes" ).val());
			var Q_8_yes = parseInt($( "#q_8_yes" ).val());
			var Q_9_yes = parseInt($( "#q_9_yes" ).val());
			var Q_10_yes = parseInt($( "#q_10_yes" ).val());
			var Q_11_yes = parseInt($( "#q_11_yes" ).val());
			var Q_12_yes = parseInt($( "#q_12_yes" ).val());
			var Q_13_yes = parseInt($( "#q_13_yes" ).val());

			var Q_0_no = parseInt($( "#q_0_no" ).val());
			var Q_1_no = parseInt($( "#q_1_no" ).val());
			var Q_2_no = parseInt($( "#q_2_no" ).val());
			var Q_3_no = parseInt($( "#q_3_no" ).val());
			var Q_4_no = parseInt($( "#q_4_no" ).val());
			var Q_5_no = parseInt($( "#q_5_no" ).val());
			var Q_6_no = parseInt($( "#q_6_no" ).val());
			var Q_7_no = parseInt($( "#q_7_no" ).val());
			var Q_8_no = parseInt($( "#q_8_no" ).val());
			var Q_9_no = parseInt($( "#q_9_no" ).val());
			var Q_10_no = parseInt($( "#q_10_no" ).val());
			var Q_11_no = parseInt($( "#q_11_no" ).val());
			var Q_12_no = parseInt($( "#q_12_no" ).val());
			var Q_13_no = parseInt($( "#q_13_no" ).val());

			var the_date = $( "#the_date" ).val();
		// var q_1_yes = parseInt($( "#q_1_yes" ).val());
		// var q_1_no = parseInt($( "#q_1_no" ).val());

		// console.log(user_count_yes);
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Analysis of Survey'
        },
        subtitle: {
            text: 'Data showing households in the month of '+the_date
        },
        xAxis: {
            categories: ['Do you have a child under the age of 5 in your household?', 
            'How many children under 5 years are in your household?', 
            'Do you have a breastfeeding child?', 
            'How long has the child been breastfeeding?', 
            'Does the child drink or eat any food other than breast milk?', 
            'Has your child had tinned milk, fresh milk, sour milk, cheese, yoghurt? ', 
            'Have they eaten any grain, roots, and tubers?', 
            'Have you fed them with Millet, Wheat, Bread flour, Rice, Sorghum, Irish potatoes?', 
            'Have they eaten any other home grain meals?', 
            'Has your child eaten fruits in the last 24 hours e.g. Pineapples, Orange’s etc.?', 
            'Has your child eaten any vegetables in the last 24 hours e.g. Cassava or potato leaves?', 
            'Has any cooking oil been used to cook food for the child in the last 24 hours?', 
            'Have you fed the child with meat, soup or chicken?',
            'Has the child eaten any eggs?'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of people',
                align: 'low'
            },
            // labels: {
            //     overflow: 'justify'
            // }

             stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        tooltip: {
            valueSuffix: ' People'
        },
        plotOptions: {
             column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Yes',
            data: [Q_0_yes, Q_1_yes, Q_2_yes, Q_3_yes, Q_4_yes, Q_5_yes, Q_6_yes, Q_7_yes, Q_8_yes, Q_9_yes, Q_10_yes, Q_11_yes, Q_12_yes ,Q_13_yes ]
        },{
            name: 'No',
            data: [Q_0_no, Q_1_no, Q_2_no, Q_3_no, Q_4_no, Q_5_no, Q_6_no, Q_7_no, Q_8_no, Q_9_no, Q_10_no, Q_11_no,Q_12_no, Q_13_no]
        }]
    });
});
</script>