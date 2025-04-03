<?php
// Get name of the current element.
$element = basename(__DIR__);

// Get block ID.
$id = $block['id'];

// Path to Block-Element
$blockPath = get_template_directory_uri(). "/blocks/". $element;
$path = "data-blockpath='" . $blockPath . "'";

// ACF fields.
$spacing = get_field('spacing_clone');
$headline = get_field('headline_clone');
$team = get_field('team');

// Classes.
$kkBlock = " block-". $element;
$classes = $kkBlock;

// Show block-preview in Gutenberg Editor.
if (isset($block['data']['block-preview'])) {?>
<img src="<?php echo $blockPath. str_replace("file:.", "", $block['data']['block-preview']);?>" />
<?php } else { ?>
    <section class="block<?php echo $classes; ?> px-6 md:px-9 xl:px-12" <?php if (current_user_can('administrator')) { echo " " . $path; } ?>>
        <div class="wrapper">
            <div class="swiper-team">
                <ul class="swiper-wrapper">
                    <?php foreach($team as $member){?>
                            <?php
                                $id = $member->ID;
                                $image = get_field('image', $id);
                                $hashtag = get_field('hashtag', $id);
                                $title = get_field('title', $id);
                                $name = get_field('name', $id);
                                $jobTitle = get_field('jobtitle', $id);

                            ?>
                            <li class="swiper-slide shadow-card flex flex-col gap-4 w-auto">
                                <div class="swiper-image basis-4/6">
                                    <img src="<?php echo $image['url']?>">
                                </div>
                                <div class="swiper-text basis-2/6">
                                    <span class="hashtag text-secondary">#<?php echo $hashtag?></span>
                                    <h3 class=""><?php echo $title; echo $name?></h3>
                                    <?php echo $jobTitle?>
                                </div>
                            </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
<?php } ?>

