<?php

/**
 * Exibe os campos de horários atendimento semanal.
 *
 * Este é um modelo parcial que é incluído pela classe Intellecti Whatsapp
 * Button Admin e é utilizada para exibir na página de cadastro de atendentes os
 * campos para cadastro dos horários no qual o atendente estará disponível para
 * atendimento.
 *
 * @package IWB
 */
?>

<h3>Segunda-feira</h3>
<p>
    <label for="iwb_start_hour_monday"><?= __('Horário de Início', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_start_hour_monday" id="iwb_start_hour_monday" value="<?= get_post_meta($post->ID, '_iwb_start_hour_monday', true); ?>">
</p>
<p>
    <label for="iwb_end_hour_monday"><?= __('Horário de Término', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_end_hour_monday" id="iwb_end_hour_monday" value="<?= get_post_meta($post->ID, '_iwb_end_hour_monday', true); ?>">
</p>

<h3>Terça-feira</h3>
<p>
    <label for="iwb_start_hour_tuesday"><?= __('Horário de Início', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_start_hour_tuesday" id="iwb_start_hour_tuesday" value="<?= get_post_meta($post->ID, '_iwb_start_hour_tuesday', true); ?>">
</p>
<p>
    <label for="iwb_end_hour_tuesday"><?= __('Horário de Término', 'intellecti-whatsapp-button-locale') ?></label> <input type="time" name="iwb_end_hour_tuesday" id="iwb_end_hour_tuesday" value="<?= get_post_meta($post->ID, '_iwb_end_hour_tuesday', true); ?>">
</p>

<h3>Quarta-feira</h3>
<p>
    <label for="iwb_start_hour_wednesday"><?= __('Horário de Início', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_start_hour_wednesday" id="iwb_start_hour_wednesday" value="<?= get_post_meta($post->ID, '_iwb_start_hour_wednesday', true); ?>">
</p>
<p>
    <label for="iwb_end_hour_wednesday"><?= __('Horário de Término', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_end_hour_wednesday" id="iwb_end_hour_wednesday" value="<?= get_post_meta($post->ID, '_iwb_end_hour_wednesday', true); ?>">
</p>

<h3>Quinta-feira</h3>
<p>
    <label for="iwb_start_hour_thursday"><?= __('Horário de Início', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_start_hour_thursday" id="iwb_start_hour_thursday" value="<?= get_post_meta($post->ID, '_iwb_start_hour_thursday', true); ?>">
</p>
<p>
    <label for="iwb_end_hour_thursday"><?= __('Horário de Término', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_end_hour_thursday" id="iwb_end_hour_thursday" value="<?= get_post_meta($post->ID, '_iwb_end_hour_thursday', true); ?>">
</p>

<h3>Sexta-feira</h3>
<p>
    <label for="iwb_start_hour_friday"><?= __('Horário de Início', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_start_hour_friday" id="iwb_start_hour_friday" value="<?= get_post_meta($post->ID, '_iwb_start_hour_friday', true); ?>">
</p>
<p>
    <label for="iwb_end_hour_friday"><?= __('Horário de Término', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_end_hour_friday" id="iwb_end_hour_friday" value="<?= get_post_meta($post->ID, '_iwb_end_hour_friday', true); ?>">
</p>

<h3>Sábado</h3>
<p>
    <label for="iwb_start_hour_saturday"><?= __('Horário de Início', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_start_hour_saturday" id="iwb_start_hour_saturday" value="<?= get_post_meta($post->ID, '_iwb_start_hour_saturday', true); ?>">
</p>
<p>
    <label for="iwb_end_hour_saturday"><?= __('Horário de Término', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_end_hour_saturday" id="iwb_end_hour_saturday" value="<?= get_post_meta($post->ID, '_iwb_end_hour_saturday', true); ?>">
</p>

<h3>Domingo</h3>
<p>
    <label for="iwb_start_hour_sunday"><?= __('Horário de Início', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_start_hour_sunday" id="iwb_start_hour_sunday" value="<?= get_post_meta($post->ID, '_iwb_start_hour_sunday', true); ?>">
</p>
<p>
    <label for="iwb_end_hour_sunday"><?= __('Horário de Término', 'intellecti-whatsapp-button-locale') ?></label>
    <input type="time" name="iwb_end_hour_sunday" id="iwb_end_hour_sunday" value="<?= get_post_meta($post->ID, '_iwb_end_hour_sunday', true); ?>">
</p>
