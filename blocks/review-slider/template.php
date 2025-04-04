<?php
// Get name of the current element.
$element = basename(__DIR__);

// Get block ID.
$id = $block['id'];

// Path to Block-Element
$blockPath = get_template_directory_uri(). "/blocks/". $element;
$path = "data-blockpath='" . $blockPath . "'";

// ACF fields.


// Classes.
$kkBlock = " block-". $element;
$classes = $kkBlock;

// Show block-preview in Gutenberg Editor.
if (isset($block['data']['block-preview'])) {?>
<img src="<?php echo $blockPath. str_replace("file:.", "", $block['data']['block-preview']);?>" />
<?php } else { ?>
    <section class="block<?php echo $classes; ?>" <?php if (current_user_can('administrator')) { echo " " . $path; } ?>>
        <div class="wrapper">
            <div class="swiper-review">
                <ul class="swiper-wrapper">
                </ul>
            </div>
        </div>
    </section>
<?php } ?>
