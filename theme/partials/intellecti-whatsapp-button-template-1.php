<?php

/**
 * Exibe a template nº 1 doa botão de atendimento via Whatsapp.
 *
 * Este é um modelo parcial é incluído, caso definido nos parâmetros do plugin,
 * exibindo assim o botão de atendimento via Whatsapp no tema atual do WordPress.
 *
 * @package IWB
 */
?>

<!-- template 1 start -->
<?php
if ($atendents->have_posts()) :
?>
    <div class="wsc" id="template-1">
        <div class="wsc-label">
            <?= get_option('iwb_button_text'); ?>
        </div>
        <div class="wsc-circle">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div id="wsc-box" class="fast">
            <div class="wsc-close"><i class="fas fa-times"></i></div>
            <div class="wsc-header">
                <strong><?= get_option('iwb_chat_title'); ?></strong>
                <div class="wsc-description"><?= get_option('iwb_chat_description'); ?></div>
            </div>
            <div class="wsc-container">
                <?php
                while ($atendents->have_posts()) :
                    $atendents->the_post();

                    // Recuperando campos complementares
                    $custom_fields = get_post_meta(get_the_ID());

                    // Montando objeto com os dias
                    $days_online = array();

                    array_push($days_online, array(
                        'Monday' => $custom_fields['_iwb_start_hour_monday'][0] . '-' . $custom_fields['_iwb_end_hour_monday'][0],
                        'Tuesday' => $custom_fields['_iwb_start_hour_tuesday'][0] . '-' . $custom_fields['_iwb_end_hour_tuesday'][0],
                        'Wednesday' => $custom_fields['_iwb_start_hour_wednesday'][0] . '-' . $custom_fields['_iwb_end_hour_wednesday'][0],
                        'Thursday' => $custom_fields['_iwb_start_hour_thursday'][0] . '-' . $custom_fields['_iwb_end_hour_thursday'][0],
                        'Friday' => $custom_fields['_iwb_start_hour_friday'][0] . '-' . $custom_fields['_iwb_end_hour_friday'][0],
                        'Saturday' => $custom_fields['_iwb_start_hour_saturday'][0] . '-' . $custom_fields['_iwb_end_hour_saturday'][0],
                        'Sunday' => $custom_fields['_iwb_start_hour_sunday'][0] . '-' . $custom_fields['_iwb_end_hour_sunday'][0],
                    ));

                    $json_days_online = json_encode($days_online[0], JSON_FORCE_OBJECT);

                    // Verificando se tem thumbnail cadastrado
                    if (has_post_thumbnail(get_the_ID())) {
                        $photo = get_the_post_thumbnail();
                    } else {
                        $photo = '<img src="' . plugin_dir_url(__DIR__) . 'assets/images/person.jpg" alt="' . the_title() . '" width="63" height="63"/>';
                    }
                ?>
                    <div class="wsc-item" data-number="<?= $custom_fields['_iwb_atendent_phone'][0]; ?>" data-time='<?= $json_days_online; ?>' data-text="<? _e('Olá posso ajudá-lo?', 'intellecti-whatsapp-button-locale');?>">
                        <div class="position-relative">
                            <?= $photo ?>
                            <svg width="63px" height="63px" viewBox="0 0 63 63">
                                <circle cx="31.5" cy="31.5" r="30" />
                            </svg>
                        </div>
                        <div class="wsc-content">
                            <div class="wsc-name"><?php the_title(); ?></div>
                            <div class="wsc-desc"><?= $custom_fields['_iwb_atendent_occupation'][0]; ?></div>
                            <div class="wsc-stat"><? _e('Online', 'intellecti-whatsapp-button-locale');?></div>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php
endif;
?>
<!-- template 1 end -->
