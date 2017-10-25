<?php
/**
 * Available variables to print:
 * 
 * Full name: $title
 * First name: $firstname
 * Last name: $lastname
 * Qualifications: $qualifications
 * Location/Office: $location
 * Position/Job title: $position
 * Email: $email
 * Tel: $telephone
 * Mobile: $mobile
 * Fax: $fax
 * URL of the Image: $image_url 
 * Image:  $image_field
 * Profile body: $body
 *
 * The variable: use_legacy_image_vars determines whether or not this site is making use of the legacy image variables ($image_url, $thumbnail_url etc) or whether it uses the $image_field variable.  This is mainly relevant to sites who have not over-ridden this template in their theme folder as it is used to decide which code path to follow and this which variables to use.  When over-riding in the theme folder, much of this logic and legacy code can be removed.
 * 
 * URL to the full profile: $node_url
 */
// *** Staff profile image variable *** //
// From 03/08/10 a new variable is available $image_field, this will contain markup generated according to the cck field display settings for the profile image field
// For example if the setting for the teaser display is "thumbnail image linked to node" then in the teaser section below, 
// $image_field will return an <a> tag whose href is the node url and whose content is the teaser sized image
// If the setting for the body display is "detail image" then in the page section the $image_field will return an <img> tag whose src is the detail sized image
// We are still keep the old variables available ($image_exists $image_url, $thumbnail_url, $thumbnail_exists) for any sites that use them, but all sites
// from this point forward should just use the $image_field variable and modify the cck field settings to determine the output.

$linkedin = $node->field_linkedin[0]['view'];
$pdf = $node->field_profile_pdf[0]['filepath'];
$vcard = $node->field_vcard[0]['filepath'];
$small_image = $node->field_small_image[0]['view'];

if ($page) {
    if (!$status) {
        print '<div class="node-unpublished unpublished-staff">';
        print '<div class="unpublished">unpublished</div>';
    }
    ?>
    <div class="profile">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <ul class="info">
                    <?php if ($telephone) { ?>
                        <li><span>Phone </span><br><?php print $telephone ?></li>
                    <?php } ?>
                    <?php if ($email) { ?>
                        <li><span>Email </span><br><a href='mailto:<?php print $email ?>' class='email'><?php print $email ?></a></li>
                    <?php } ?>
                    <?php if ($linkedin) { ?>
                        <li class="linkedin"><span>linkedin </span><br><?php print $linkedin ?></li>
                    <?php } ?>
                    <?php if ($vcard) { ?>
                        <li class="vcard"><span>v-card</span><br><a href='/<?php print $vcard ?>'>Download V-Card</a></li>
                    <?php } ?>
                    <?php if ($pdf) { ?>
                        <li class="pdf"><span>pdf </span><br><a href='/<?php print $pdf ?>'>Download PDF</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php
                if ($image_field) {
                    print $image_field;
                }
                ?>
            </div>
        </div>
        <div class="row profile-details">
            <?php if ($small_image) { ?>
                <div class="col-xs-12 col-sm-4">
                    <?php print $small_image; ?>
                </div>
            <?php } ?>
            <div class="col-xs-12 <?php print ($small_image)? 'col-sm-8':'col-sm-12' ?>">
                <h2 class="title"><?php print $title ?></h2>
                <p class="intro"><?php print $body ?></p>
            </div>
        </div>
    </div>
    <?php
    if (!$status) {
        print '</div>';
    }
} else {
    ?>
    <div class="col-xs-4">
        <div class="card">
            <div class="preview">
                <div class="img"><a class="no-link" href="<?php print $node_url ?>"><?php print $image_field; ?></a></div>
                <div class="name"><a href="<?php print $node_url ?>"><?php print $title ?></a></div>
                <div class="link"><a href="mailto:<?php print $email ?>">Email <?php print $firstname ?></a></div>
            </div>
        </div>
    </div>
<?php } ?>


