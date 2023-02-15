<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/igun997
 * @since      1.0.0
 *
 * @package    Ciptadusa_Directory
 * @subpackage Ciptadusa_Directory/admin/partials
 */

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$current_path = $_SERVER['REQUEST_URI'];
// current host
$host   = $_SERVER['HTTP_HOST'];
$fields = [
	'is_premium',
	'description',
	'industry_category',
	'exhibitor_name',
	'logo',
	'banner_logo',
	'country',
	'stand',
	'fb_url',
	'yt_url',
	'ig_url',
	'twitter_url',
	'linkedln_url',
	'company_url',
	'company_phone',
	'company_email',
	'address',
	'gallery_image_1',
	'gallery_image_2',
	'gallery_title_1',
	'gallery_title_2',
];
// read csv file from post and convert to array
if ( isset( $_POST['submit'] ) ) {
	$excel_files = $_FILES['file']['tmp_name'];
	if ( defined( 'CBXPHPSPREADSHEET_PLUGIN_NAME' ) && file_exists( CBXPHPSPREADSHEET_ROOT_PATH . 'lib/vendor/autoload.php' ) ) {
		//Include PHPExcel
		require_once( CBXPHPSPREADSHEET_ROOT_PATH . 'lib/vendor/autoload.php' );

		// create row data
		$row_data = [];
		foreach ( $fields as $field ) {
			$header     = str_replace( "_", " ", $field );
			$header     = ucwords( $header );
			$row_data[] = $header;
		}

		// create new spreadsheet
		$spreadsheet = new Spreadsheet();
		$sheet       = $spreadsheet->getActiveSheet();
		// set name of sheet
		$sheet->setTitle( 'Directory' );
		// add row
		$sheet->fromArray( $row_data, null, 'A1' );
		// get meta post ciptadusa-directory

		$args = [
			'post_type'      => 'ciptadusa_directory',
			'post_status'    => 'publish',
			'posts_per_page' => - 1,
		];

		$records = [];

		$query = new WP_Query( $args );
		$i     = 2;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$post_id  = get_the_ID();
				$row_data = [];
				//description and exhibitor name get from post_title and post_content
				$row_data[] = get_post_meta( $post_id, 'is_premium', true );
				$row_data[] = get_the_content();
				$row_data[] = get_post_meta( $post_id, 'industry_category', true );
				$row_data[] = get_the_title();
				foreach ( $fields as $field ) {
					if ( $field == 'description' || $field == 'exhibitor_name' || $field == 'is_premium' || $field == 'industry_category' ) {
						continue;
					}
					$row_data[] = get_post_meta( $post_id, $field, true );
				}
				$records[] = $row_data;
				$i ++;
			}
		}

		// add row
		$sheet->fromArray( $records, null, 'A2' );

		// download excel file
		$writer = IOFactory::createWriter( $spreadsheet, 'Xlsx' );
		//save to file

		// get plugin path
		$plugin_path = plugin_dir_path( __FILE__ );
		$plugin_path = str_replace( 'admin/partials', '', $plugin_path );
		$path        = $writer->save( $plugin_path . "public/assets/export.xlsx" );
		$success     = true;
	} else {
		$success = false;
	}
}


?>

<!--Create Form with POST Method and Action to current url -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-4 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <strong>Export Directory</strong>
                    </div>
					<?php if ( isset( $success ) ) : ?>
						<?php if ( $success ) : ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Success!</strong> Data has been imported.

                                <a download
                                   href="<?= $host . "/wp-content/plugins/ciptadusa-directory/public/assets/export.xlsx" ?>">
                                    <button class="btn btn-primary">Download</button>
                                </a>
                            </div>
						<?php else : ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Failed!</strong> Data failed to import.
                            </div>
						<?php endif; ?>
					<?php endif; ?>
                    <div class="card-text text-muted">
                        Halaman ini digunakan untuk export data exhibitor dari ke excel.
                    </div>
                    <hr>
                    <form method="post" action="<?= $current_path ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-success btn-block">
                                Export
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>