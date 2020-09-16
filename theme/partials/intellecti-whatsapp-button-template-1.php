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
<div class="wsc" id="template-1">
    <div class="wsc-label">
        Questions? Let's Chat
    </div>
    <div class="wsc-circle">
        <i class="fab fa-whatsapp"></i>
    </div>
    <div id="wsc-box" class="fast">
        <div class="wsc-close"><i class="fas fa-times"></i></div>
        <div class="wsc-header">
            <strong>Need Help? Chat with us</strong>
            <div class="wsc-description">Contact one of our team</div>
        </div>
        <div class="wsc-container">
            <div class="wsc-item" data-number="+905536384964" data-time='{ "Monday":"08:30-18:30", "tuesday":"08:30-18:30", "wednesday":"08:30-18:30", "thursday":"08:30-18:30", "friday":"08:30-18:30", "sunday":"08:30-24:00" }' data-text="Hello, How Can I Help You?">
                <div class="position-relative">
                    <img src="<?= plugin_dir_url(__DIR__); ?>assets/images/person_5.jpg" alt="..." />
                    <svg width="63px" height="63px" viewBox="0 0 63 63">
                        <circle cx="31.5" cy="31.5" r="30" />
                    </svg>
                </div>
                <div class="wsc-content">
                    <div class="wsc-name">John Doe</div>
                    <div class="wsc-desc">Sales Support</div>
                    <div class="wsc-stat">Online</div>
                </div>
            </div>
            <div class="wsc-item" data-number="+905536384964" data-time='{ "Monday":"08:30-18:30", "tuesday":"08:30-18:30", "wednesday":"08:30-18:30", "thursday":"08:30-18:30", "friday":"08:30-18:30" }' data-text="Hello, How Can I Help You?">
                <div class="position-relative">
                    <img src="<?= plugin_dir_url(__DIR__); ?>assets/images/person_6.jpg" alt="..." />
                    <svg width="63px" height="63px" viewBox="0 0 63 63">
                        <circle cx="31.5" cy="31.5" r="30" />
                    </svg>
                </div>
                <div class="wsc-content">
                    <div class="wsc-name">David Maxwell</div>
                    <div class="wsc-desc">Customer Support</div>
                    <div class="wsc-stat">Online</div>
                </div>
            </div>
            <div class="wsc-item">
                <div class="position-relative">
                    <img src="<?= plugin_dir_url(__DIR__); ?>assets/images/person_7.jpg" alt="..." />
                    <svg width="63px" height="63px" viewBox="0 0 63 63">
                        <circle cx="31.5" cy="31.5" r="30" />
                    </svg>
                </div>
                <div class="wsc-content">
                    <div class="wsc-name">Jack Doe</div>
                    <div class="wsc-desc">Techincal Support</div>
                    <div class="wsc-stat bg-warning">Offline</div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- template 1 end -->
