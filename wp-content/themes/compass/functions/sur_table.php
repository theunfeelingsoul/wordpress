<?php 

//Our class extends the WP_List_Table class, so we need to make sure that it's there
if(!class_exists('WP_List_Table')){
   require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
* 
*/
class SurTable extends  WP_List_Table
{
	
	 /**
    * Constructor, we override the parent to pass our own arguments
    * We usually focus on three parameters: singular and plural labels, as well as whether the class supports AJAX.
    */
    function __construct() {
       parent::__construct( array(
      'singular'=> 'excercise', //Singular label
      'plural' => 'excercises', //plural label, also this well be one of the table css class
      'ajax'   => false //We won't support Ajax for this table
      ) );
    }


    /**
	 * Add extra markup in the toolbars before or after the list
	 * @param string $which, helps you decide if you add the markup after (bottom) or before (top) the list
	 */
	function extra_tablenav( $which ) {
	   if ( $which == "top" ){
	      //The code that goes before the table is here
	      echo"Hello, I'm before the table";
	   }
	   if ( $which == "bottom" ){
	      //The code that goes after the table is there
	      echo"Hi, I'm after the table";
	   }
	}

	/**
	 * Define the columns that are going to be used in the table
	 * @return array $columns, the array of columns to use with the table
	 */
	function get_columns() {
	   return $columns= array(
	      'col_id'=>__('ID'),
	      'col_name'=>__('Name'),
	      'col_body_part'=>__('Body part'),
	      'col_q3'=>__('Question 3'),
	      'col_q4'=>__('Question 4')
	   );
	}

	/**
	 * Decide which columns to activate the sorting functionality on
	 * @return array $sortable, the array of columns that can be sorted by the user
	 */
	public function get_sortable_columns() {
	   return $sortable = array(
	      'col_id'=>'id',
	      'col_name'=>'name',
	      'col_body_part'=>'body_part'
	   );
	}

	/**
	 * Prepare the table with different parameters, pagination, columns and table elements
	 */
	function prepare_items() {
	   global $wpdb, $_wp_column_headers;
	   $screen = get_current_screen();

	   /* -- Preparing your query -- */
	        $query = "SELECT * FROM {$wpdb->prefix}excercises";

	   /* -- Ordering parameters -- */
	       //Parameters that are going to be used to order the result
	       $orderby = !empty($_GET["orderby"]) ? mysql_real_escape_string($_GET["orderby"]) : 'ASC';
	       $order = !empty($_GET["order"]) ? mysql_real_escape_string($_GET["order"]) : '';
	       if(!empty($orderby) & !empty($order)){ $query.=' ORDER BY '.$orderby.' '.$order; }

	   /* -- Pagination parameters -- */
	        //Number of elements in your table?
	        $totalitems = $wpdb->query($query); //return the total number of affected rows
	        //How many to display per page?
	        $perpage = 5;
	        //Which page is this?
	        $paged = !empty($_GET["paged"]) ? mysql_real_escape_string($_GET["paged"]) : '';
	        //Page Number
	        if(empty($paged) || !is_numeric($paged) || $paged<=0 ){ $paged=1; }
	        //How many pages do we have in total?
	        $totalpages = ceil($totalitems/$perpage);
	        //adjust the query to take pagination into account
	       if(!empty($paged) && !empty($perpage)){
	          $offset=($paged-1)*$perpage;
	         $query.=' LIMIT '.(int)$offset.','.(int)$perpage;
	       }

	   /* -- Register the pagination -- */
	      $this->set_pagination_args( array(
	         "total_items" => $totalitems,
	         "total_pages" => $totalpages,
	         "per_page" => $perpage,
	      ) );
	      //The pagination links are automatically built according to those parameters

	   /* -- Register the Columns -- */
	      $columns = $this->get_columns();
	      $_wp_column_headers[$screen->id]=$columns;

	   /* -- Fetch the items -- */
	      $this->items = $wpdb->get_results($query);
	}

	/**
	 * Display the rows of records in the table
	 * @return string, echo the markup of the rows
	 */
	function display_rows() {

	   //Get the records registered in the prepare_items method
	   $records = $this->items;

	   // echo "<pre>";
	   // print_r($records);
	   // echo "</pre>";
	   //Get the columns registered in the get_columns and get_sortable_columns methods
	   list( $columns, $hidden ) = $this->get_column_info();
	   //Loop for each record
	   if(!empty($records)){foreach($records as $rec){
	   		// echo $rec->name;
	      //Open the line
	        echo '< tr id="record_'.$rec->id.'">';
	        $columns = $this->get_columns();
	        // echo "<pre>";
	        // print_r($columns);
	        // echo "</pre>";
	      foreach ( $columns as $column_name => $column_display_name ) {
	      		// echo $column_name;
	         //Style attributes for each col
	         $class = "class='$column_display_name column-$column_display_name'";
	         $style = "";
	         if ( in_array( $column_name, $hidden ) ) $style = ' style="display:none;"';
	         $attributes = $class . $style;

	         //edit link
	         $editlink  = '/wp-admin/link.php?action=edit&id='.(int)$rec->id;

	         //Display the cell
	         switch ( $column_name ) {
	            case "col_id":  echo '< td '.$attributes.'>'.stripslashes($rec->id).'< /td>';   break;
	            case "col_name": echo '< td '.$attributes.'>'.stripslashes($rec->name).'< /td>'; break;
	            case "col_body_part": echo '< td '.$attributes.'>'.stripslashes($rec->body_part).'< /td>'; break;
	            case "col_q3": echo '< td '.$attributes.'>'.$rec->q3.'< /td>'; break;
	            case "col_q4": echo '< td '.$attributes.'>'.$rec->q4.'< /td>'; break;
	         }
	      }

	      //Close the line
	      echo'< /tr>';
	   }}

	}



} // end class



//Prepare Table of elements
$wp_list_table = new SurTable();
$wp_list_table->prepare_items();


//Table of elements

$wp_list_table->display();







 ?>