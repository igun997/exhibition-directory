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
$fields       = [
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

		// load excel file
		$objPHPExcel = IOFactory::load( $excel_files );
		// get first sheet
		$sheet = $objPHPExcel->getSheet( 0 );
		// set first row as header
		$highestRow      = $sheet->getHighestRow();
		$highestColumn   = $sheet->getHighestColumn();
		$header          = $sheet->rangeToArray( 'A1:' . $highestColumn . '1', null, true, false );
		$data            = $sheet->rangeToArray( 'A2:' . $highestColumn . $highestRow, null, true, false );
		$fieldWithValues = [];
		foreach ( $data as $key => $value ) {
			// set key to lower case and space to underscore
			$fieldWithValues[ $key ] = array_combine( array_map( function ( $item ) {
				return str_replace( ' ', '_', $item );
			}, array_map( 'strtolower', array_map( 'trim', $header[0] ) ) ), array_map( 'trim', $value ) );
		}


		// create a post for each array
		foreach ( $fieldWithValues as $key => $value ) {
			$success = true;
			//create taxonomy by product category
			$industry_id = null;
			$term        = term_exists( $value['industry_category'], 'industry_category' );
			if ( ( $term === 0 || $term === null ) && $value['industry_category'] !== '' ) {
				$term = wp_insert_term(
					$value['industry_category'],
					'industry_category',
					[
						'description' => $value['industry_category'],
						'slug'        => $value['industry_category'],
					]
				);

				$industry_id = $term['term_id'];
			} else {
				$industry_id = isset( $term['term_id'] ) ? $term['term_id'] : null;
			}
			//check if country taxonomy exist
			$country_id = null;
			$term       = term_exists( $value['country'], 'country' );
			if ( ( $term === 0 || $term === null ) && $value['country'] !== '' ) {
				$term       = wp_insert_term(
					$value['country'],
					'country',
					[
						'description' => $value['country'],
						'slug'        => $value['country'],
					]
				);
				$country_id = $term['term_id'];
			} else {
				$country_id = isset( $term['term_id'] ) ? $term['term_id'] : null;
			}
			// create post and include taxonomy
			$post_id = wp_insert_post(
				[
					'post_title'   => $value['exhibitor_name'],
					'post_content' => $value['description'],
					'post_status'  => 'publish',
					'post_type'    => 'ciptadusa_directory',
					'tax_input'    => [
						'industry_category' => $industry_id,
						'country'           => $country_id,
					],
				]
			);
			if ( $post_id === 0 ) {
				$success = false;
			}
			// add custom_fields check if value is available $fields
			foreach ( $value as $k => $v ) {
				//compare with $fields
				if ( in_array( $k, $fields ) ) {
					update_post_meta( $post_id, $k, $v );
				}
			}

		}
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
                        <strong>Import Directory</strong>
                    </div>
					<?php if ( isset( $success ) ) : ?>
						<?php if ( $success ) : ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Success!</strong> Data has been imported.
                            </div>
						<?php else : ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Failed!</strong> Data failed to import.
                            </div>
						<?php endif; ?>
					<?php endif; ?>
                    <div class="card-text text-muted">
                        Halaman ini digunakan untuk mengimport data dari file excel ke dalam database, pastikan file
                        yang diimport sudah sesuai dengan format yang telah ditentukan.
                    </div>
                    <hr>
                    <form method="post" action="<?= $current_path ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control-file" id="file" name="file" required
                                   accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-success btn-block">
                                Import
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="button" id="downloadTemplate" class="btn btn-default btn-block">
                                Download Template
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>