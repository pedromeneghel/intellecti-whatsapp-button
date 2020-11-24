<?php

/**
 * Exibe o campo de cadastro de função/departamento do atendente.
 *
 * Este é um modelo parcial que é incluído pela classe Intellecti Whatsapp
 * Button Admin e é utilizada para exibir na página de cadastro de atendentes o
 * campo para cadastro da função/departamento do atendente.
 *
 * @package IWB
 */
?>
<p>
    <label for="iwb_atendent_occupation"><?= __('Informe o função/departamento que o atendente atua. Ex: Suporte técnico, Comercial, Financeiro, etc.', 'intellecti-whatsapp-button-locale') ?></label>
    <br /><br />
    <input class="widefat" type="text" name="iwb_atendent_occupation" id="iwb_atendent_occupation" value="<?= get_post_meta($post->ID, '_iwb_atendent_occupation', true); ?>" size="30" />
</p>
