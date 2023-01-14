<?php
//list countries
$countries = [
	"Afghanistan",
	"Albania",
	"Algeria",
	"Andorra",
	"Angola",
	"Antigua & Deps",
	"Argentina",
	"Armenia",
	"Australia",
	"Austria",
	"Azerbaijan",
	"Bahamas",
	"Bahrain",
	"Bangladesh",
	"Barbados",
	"Belarus",
	"Belgium",
	"Belize",
	"Benin",
	"Bhutan",
	"Bolivia",
	"Bosnia Herzegovina",
	"Botswana",
	"Brazil",
	"Brunei",
	"Bulgaria",
	"Burkina",
	"Burundi",
	"Cambodia",
	"Cameroon",
	"Canada",
	"Cape Verde",
	"Central African Rep",
	"Chad",
	"Chile",
	"China",
	"Colombia",
	"Comoros",
	"Congo",
	"Congo {Democratic Rep}",
	"Costa Rica",
	"Croatia",
	"Cuba",
	"Cyprus",
	"Czech Republic",
	"Denmark",
	"Djibouti",
	"Dominica",
	"Dominican Republic",
	"East Timor",
	"Ecuador",
	"Egypt",
	"El Salvador",
	"Equatorial Guinea",
	"Eritrea",
	"Estonia",
	"Ethiopia",
	"Fiji",
	"Finland",
	"France",
	"Gabon",
	"Gambia",
	"Georgia",
	"Germany",
	"Ghana",
	"Greece",
	"Grenada",
	"Guatemala",
	"Guinea",
	"Guinea-Bissau",
	"Guyana",
	"Haiti",
	"Honduras",
	"Hungary",
	"Iceland",
	"India",
	"Indonesia",
	"Iran",
	"Iraq",
	"Ireland {Republic}",
	"Israel",
	"Italy",
	"Ivory Coast",
	"Jamaica",
	"Japan",
	"Jordan",
	"Kazakhstan",
	"Kenya",
	"Kiribati",
	"Korea North",
	"Korea South",
	"Kosovo",
	"Kuwait",
	"Kyrgyzstan",
	"Laos",
	"Latvia",
	"Lebanon",
	"Lesotho",
	"Liberia",
	"Libya",
	"Liechtenstein",
	"Lithuania",
	"Luxembourg",
	"Macedonia",
	"Madagascar",
	"Malawi",
	"Malaysia",
	"Maldives",
	"Mali",
	"Malta",
	"Marshall Islands",
	"Mauritania",
	"Mauritius",
	"Metaverse Multiverse",
	"Mexico",
	"Micronesia",
	"Moldova",
	"Monaco",
	"Mongolia",
	"Montenegro",
	"Morocco",
	"Mozambique",
	"Myanmar, {Burma}",
	"Namibia",
	"Nauru",
	"Nepal",
	"Netherlands",
	"New Zealand",
	"Nicaragua",
	"Niger",
	"Nigeria",
	"Norway",
	"Oman",
	"Pakistan",
	"Palau",
	"Panama",
	"Papua New Guinea",
	"Paraguay",
	"Peru",
	"Philippines",
	"Poland",
	"Portugal",
	"Qatar",
	"Romania",
	"Russian Federation",
	"Rwanda",
	"St Kitts & Nevis",
	"St Lucia",
	"Saint Vincent & the Grenadines",
	"Samoa",
	"San Marino",
	"Sao Tome & Principe",
	"Saudi Arabia",
	"Senegal",
	"Serbia",
	"Seychelles",
	"Sierra Leone",
	"Singapore",
	"Slovakia",
	"Slovenia",
	"Solomon Islands",
	"Somalia",
	"South Africa",
	"South Sudan",
	"Spain",
	"Sri Lanka",
	"Sudan",
	"Suriname",
	"Swaziland",
	"Sweden",
	"Switzerland",
	"Syria",
	"Taiwan",
	"Tajikistan",
	"Tanzania",
	"Thailand",
	"Togo",
	"Tonga",
	"Trinidad & Tobago",
	"Tunisia",
	"Turkey",
	"Turkmenistan",
	"Tuvalu",
	"Uganda",
	"Ukraine",
	"United Arab Emirates",
	"United Kingdom",
	"United States",
	"Uruguay",
	"Uzbekistan",
	"Vanuatu",
	"Vatican City",
	"Venezuela",
	"Vietnam",
	"Yemen",
	"Zambia",
	"Zimbabwe"
];


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
                <label class="font-weight-bold">Country</label>
            </div>
            <div class="col-6">
                <select name="country" class="form-control">
					<?php foreach ( $countries as $country ) { ?>
                        <option value="<?= $country ?>" <?= getValues( 'country' ) == $country ? 'selected' : '' ?>><?= $country ?></option>
					<?php } ?>
                </select>
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