<?php if(!$vertical): ?>
    <?php if($show_title): ?>
        <div class="cshero-progress-title">
            <<?php echo ''.$title_size; ?> class="title" <?php echo ''.$title_style; ?>><i class="<?php echo ''.$icon; ?>"></i> <?php echo ''.$title; ?></<?php echo ''.$title_size; ?>>
        </div>
    <?php endif; ?>

    <div class="progress<?php if($vertical){ echo ' vertical bottom'; } ?><?php if($striped == true){ echo ' progress-striped'; if($animated){ echo ' active'; } } ?><?php if($right){ echo " pright"; } ?>" <?php echo ''.$style; ?>>
        <div id="cshero-progress-item-<?php echo ''.$progressbar_callback; ?>" class="progress-bar" role="progressbar" data-valuetransitiongoal="<?php echo ''.$value; ?>" style="background-color: <?php echo ''.$color; ?>;">
	        <span style="line-height: <?php echo ''.$valstyle.'px' ?>;display: block;"><?php
                if($show_value){
                    echo ''.$value.$label_value;
                } ?>
                <span class="arrow" style=" border-color:transparent transparent transparent <?php echo ''.$color; ?>"></span>
            </span>
        </div>
    </div>

    <?php if($desc): ?>
        <div class="cshero-progress-desc">
            <span <?php echo ''.$desc_style; ?>><em><?php echo esc_attr($desc); ?></em></span>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if($vertical): ?>

    <div class="progress<?php if($vertical){ echo ' vertical bottom'; } ?><?php if($striped == true){ echo ' progress-striped'; if($animated){ echo ' active'; } } ?><?php if($right){ echo " pright"; } ?>" <?php echo ''.$style; ?>>
        <div id="cshero-progress-item-<?php echo ''.$progressbar_callback; ?>" class="progress-bar" role="progressbar" data-valuetransitiongoal="<?php echo ''.$value; ?>" style="background-color: <?php echo ''.$color; ?>;">
        </div>
        <div class="cshero-progress-position">
            <span class="cshero-progress-value">
                <?php
                if($show_value){
                    echo ''.$value.$label_value;
                }?>
            </span>
            <?php if($show_title): ?>
                <div class="cshero-progress-title vertical">
                    <<?php echo ''.$title_size; ?> class="title" <?php echo ''.$title_style; ?>><i class="<?php echo ''.$icon; ?>"></i> <?php echo ''.$title; ?></<?php echo ''.$title_size; ?>>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if($icon): ?>
        <div class="cshero-progress-icon vertical">
            <i class="<?php echo ''.$icon; ?>"></i>
        </div>
    <?php endif; ?>

    <?php if($desc): ?>
        <div class="cshero-progress-desc vertical">
            <span <?php echo ''.$desc_style; ?>><em><?php echo esc_attr($desc); ?></em></span>
        </div>
    <?php endif; ?>

<?php endif; ?>