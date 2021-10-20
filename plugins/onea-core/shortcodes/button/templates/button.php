<button type="submit" <?php onea_elated_inline_style($button_styles); ?> <?php onea_elated_class_attribute($button_classes); ?> <?php echo onea_elated_get_inline_attrs($button_data); ?> <?php echo onea_elated_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltdf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo onea_elated_icon_collections()->renderIcon($icon, $icon_pack); ?>
</button>