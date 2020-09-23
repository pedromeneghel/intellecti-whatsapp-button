<?php

/**
 * Exibe o campo de cadastro de telefone do atendente.
 *
 * Este é um modelo parcial que é incluído pela classe Intellecti Whatsapp
 * Button Admin e é utilizada para exibir na página de cadastro de atendentes o
 * campo para cadastro telefone do atendente, no qual serão direcionados os
 * atendimentos.
 *
 * @package IWB
 */
?>
<p>
    <label for="iwb_atendent_phone">Informe o número de telefone do atendente com WhatsApp. Esse número receberá as solicitações de atendimento vindas através do plugin.</label>
    <br /><br />
    <input class="widefat" type="text" name="iwb_atendent_phone" id="iwb_atendent_phone" value="<?= get_post_meta($post->ID, '_iwb_atendent_phone', true); ?>" size="30" />
</p>
