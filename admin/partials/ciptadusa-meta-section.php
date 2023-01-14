<?php
//list countries


function getValues( $key ) {
	$value = get_post_custom_values( $key, $postId );
	if ( isset( $value[0] ) ) {
		return $value[0];
	}
}

?>
<div class="row gx-5">
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Is Premium</label>
            </div>
            <div class="col-6">
                <input type="checkbox" name="is_premium"
                       value="1" <?= getValues( 'is_premium' ) == 1 ? 'checked' : ''; ?>>
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Exhibitor Name</label>
            </div>
            <div class="col-6">
                <input type="text" name="exhibitor_name"
                       value="<?= getValues( 'exhibitor_name' ) ?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Logo URL</label>
            </div>
            <div class="col-6">
                <input type="text" name="logo"
                       value="<?= getValues( 'logo' ) ?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Banner Logo URL</label>
            </div>
            <div class="col-6">
                <input type="text" name="banner_logo"
                       value="<?= getValues( 'banner_logo' ) ?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Stand</label>
            </div>
            <div class="col-6">
                <input type="text" name="stand"
                       value="<?= getValues( 'stand' ) ?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Facebook URL</label>
            </div>
            <div class="col-6">
                <input type="text" name="fb_url"
                       value="<?= getValues( 'fb_url' ) ?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Instagram URL</label>
            </div>
            <div class="col-6">
                <input type="text" name="ig_url"
                       value="<?= getValues( 'ig_url' ) ?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Twitter URL</label>
            </div>
            <div class="col-6">
                <input type="text" name="twitter_url"
                       value="<?= getValues( 'twitter_url' ) ?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Youtube URL</label>
            </div>
            <div class="col-6">
                <input type="text" name="yt_url"
                       value="<?= getValues( 'yt_url' ) ?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Linkedln URL</label>
            </div>
            <div class="col-6">
                <input type="text" name="linkedln_url"
                       value="<?= getValues( 'linkedln_url' ) ?>" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Company URL</label>
            </div>
            <div class="col-6">
                <input type="text" name="company_url"
                       value="<?= getValues( 'company_url' ) ?>" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Company Phone</label>
            </div>
            <div class="col-6">
                <input type="text" name="company_phone"
                       value="<?= getValues( 'company_phone' ) ?>" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Address</label>
            </div>
            <div class="col-6">
                <input type="text" name="address"
                       value="<?= getValues( 'address' ) ?>" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Gallery Image 1</label>
            </div>
            <div class="col-6">
                <input type="text" name="gallery_image_1"
                       value="<?= getValues( 'gallery_image_1' ) ?>" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Gallery Image 2</label>
            </div>
            <div class="col-6">
                <input type="text" name="gallery_image_2"
                       value="<?= getValues( 'gallery_image_2' ) ?>" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Gallery Title 1</label>
            </div>
            <div class="col-6">
                <input type="text" name="gallery_title_1"
                       value="<?= getValues( 'gallery_title_1' ) ?>" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="col-12 m-2">
        <div class="row align-items-center">
            <div class="col-6">
                <label class="font-weight-bold">Gallery Title 2</label>
            </div>
            <div class="col-6">
                <input type="text" name="gallery_title_2"
                       value="<?= getValues( 'gallery_title_2' ) ?>" class="form-control"/>
            </div>
        </div>
    </div>
</div>