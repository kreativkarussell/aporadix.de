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
        <div class="character-card-container">
            <?php if(!empty($headline)) {
                include dirname(dirname(__FILE__)) . "/_clone/headline/headline.php";
            }
            ?>
            <ul class="character-cards-grid flex flex-row gap-8">
                <?php foreach($cards as $card){?>
                    <li class="relative overflow-hidden flex-1">
                        <div class="cards-content relative text-center flex flex-col flex-1 gap-4 p-8">
                    <span class="absolute inset-0 flex items-center justify-center text-[15em] text-gray-200 z-[-1] pointer-events-none">
                        <?php echo substr($card['title'], 0,1)?>
                    </span>
                            <span id="character" class="relative z-10"><?php echo $card['title'] ?></span>
                            <p class="relative z-10"><?php echo $card['text']?></p>
                        </div>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</section>
<?php } ?>
