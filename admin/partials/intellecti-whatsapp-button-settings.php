<?php

/**
 * Exibe a interface de configuração do plugin no painel de controle.
 *
 * Este é um modelo parcial que é incluído pela classe Intellecti Whatsapp
 * Button Admin é utilizada para exibir todas as opções de configuração do
 * plugin no painel de controle do WordPress.
 *
 * @package IWB
 */
?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form action="options.php" method="post">
        <?php
        settings_fields('iwb_options_group');
        do_settings_sections('iwb_options_group');
        submit_button();
        ?>
    </form>
</div>
