<?php
/**
 * Extend width of category edit fields to make multi-column editing easier
 */
add_action('admin_head', function(){
	echo "
		<style type='text/css'>
			.acf-fc-layout-handle {
				background-color: #f1f1f1;
			}
			
			.taxonomy-category  .acf-input .form-table {
				margin-top: 0;
			}
			
			.taxonomy-category .acf-accordion-content {
				background-color: #fafafa;
			}
			
			.taxonomy-category .form-table>tbody>.acf-field>.acf-label label {
				color: #444;
				font-weight: 500;
			}
		</style>
	";
});