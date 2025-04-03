<?php
// Get name of the current element.
$element = basename(__DIR__);

// Get block ID.
$id = $block['id'];

// Path to Block-Element
$blockPath = get_template_directory_uri(). "/blocks/". $element;
$path = "data-blockpath='" . $blockPath . "'";

// ACF fields.
$presentation = get_field('presentation');
$spacing = get_field('spacing_clone');
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
                <div class="icon-card-container">
                    <?php if($presentation == 'list'):?>
                        <ul class="flex flex-row gap-8">
                        <?php foreach ($cards as $card){?>
                              <li class="cards-content rounded-2xl shadow-card p-8 flex flex-col flex-1">
                                  <div class="cards-head flex flex-col items-center">
                                      <div class="rounded-full border-secondary border-2 p-4">
                                          <svg class="w-8 h-8 md:w-8 md:h-8 fill-secondary">
                                              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/<?php echo $card["icon"]; ?>.svg#<?php echo $card["icon"]; ?>"></use>
                                          </svg>
                                      </div>
                                      <h4 class="text-secondary"><?php echo $card['subtitle'] ?></h4>
                                      <h3><?php echo $card['title'] ?></h3>
                                  </div>
                                  <div class="cards-body text-center">
                                      <?php echo $card['text'] ?>
                                      <a class="no-underline" href="<?php echo $card['link']['url']?>"><?php echo $card['link']['title']?></a>
                                  </div>
                              </li>
                        <?php } ?>
                        </ul>
                    <?php endif; ?>
                    <?php if($presentation == 'slider'):?>
                    <?php endif;?>
                </div>
            </div>
        </section>
<?php } ?>

