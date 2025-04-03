<?php
// Get name of the current element.
$element = basename(__DIR__);

// Get block ID.
$id = $block['id'];

// Path to Block-Element
$blockPath = get_template_directory_uri(). "/blocks/". $element;
$path = "data-blockpath='" . $blockPath . "'";

// ACF fields.
$headline = get_field('headline_clone');
$cards = get_field('cards');

// Classes.
$kkBlock = " block-". $element;
$classes = $kkBlock;

// Show block-preview in Gutenberg Editor.
if (isset($block['data']['block-preview'])) {?>
<img src="<?php echo $blockPath. str_replace("file:.", "", $block['data']['block-preview']);?>" />
<?php } else { ?>
    <section class="block<?php echo $classes; ?>" <?php if (current_user_can('administrator')) { echo " " . $path; } ?>>
        <div class="wrapper">
            <div class="counting-cards-container">
                <?php
                if(!empty($headline)) {
                    include dirname(dirname(__FILE__)) . "/_clone/headline/headline.php";
                }
                ?>
                <ul class="counting-card-grid grid grid-cols-4 gap-8">
                <?php foreach($cards as $card){?>
                        <li class="flex flex-col gap-4 items-center rounded-2xl shadow-card p-8">
                            <span id="count" class="text-secondary"> <?php echo $card['counting_elem']?> </span>
                            <?php echo $card['text']?>
                        </li>
                <?php }?>
                </ul>
            </div>
        </div>
    </section>
<?php } ?>
