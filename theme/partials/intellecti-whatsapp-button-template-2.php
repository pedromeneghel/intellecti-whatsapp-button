<?php

/**
 * Exibe a template nº 2 doa botão de atendimento via Whatsapp.
 *
 * Este é um modelo parcial é incluído, caso definido nos parâmetros do plugin,
 * exibindo assim o botão de atendimento via Whatsapp no tema atual do WordPress.
 *
 * @package IWB
 */

?>
<?php
if ($atendents->have_posts()) :
    while ($atendents->have_posts()) :
        $atendents->the_post();

        // Recuperando campos complementares
        $custom_fields = get_post_meta(get_the_ID());

        // Verificando atendente default
        if (get_the_id() == get_option('iwb_atendent_default')) :

?>
            <!-- template 2 start -->
            <div class="wsc" id="template-2">
                <div class="wsc-label">
                    <?= get_option('iwb_button_text'); ?>
                </div>
                <div class="wsc-circle">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div id="wsc-box" class="fast">
                    <div class="wsc-close"><i class="fas fa-times"></i></div>
                    <div class="wsc-header-single">
                        <div class="wsc-avatar">
                            <img src="<?= plugin_dir_url(__DIR__); ?>assets/images/person.jpg" alt="<?= the_title(); ?>" />
                        </div>
                        <div class="wsc-content text-left">
                            <div class="wsc-name text-light"><?= the_title(); ?></div>
                            <div class="wsc-desc text-light"><?= $custom_fields['_iwb_atendent_occupation'][0]; ?></div>
                        </div>
                    </div>
                    <div class="wsc-text">
                        <div class="wsc-message">
                            <?= get_option('iwb_chat_description'); ?>
                        </div>
                    </div>
                    <div class="wsc-container p-0">
                        <div class="wsc-chat" data-number="<?= $custom_fields['_iwb_atendent_phone'][0]; ?>">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-0 border-0" placeholder="Digite uma mensagem" />
                                <div class="input-group-append">
                                    <div class="btn btn btn-link rounded-0" id="send"><i class="fas fa-play text-dark"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        endif;
    endwhile;
endif;
?>
<!-- template 2 end -->
