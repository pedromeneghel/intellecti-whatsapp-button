<?php

/**
 * A Intellecti Whatsapp Button Admin define todas as funcionalidades do painel
 * do plugin
 *
 * @package IWB
 */

/**
 * A Intellecti Whatsapp Button Admin define todas as funcionalidades do painel
 * do plugin
 *
 * Esta classe é responsável por disponibilizar no painel de controle do
 * WordPress todas as opções para configuração do plugin.
 *
 * @since 1.0.0
 */
class Intellecti_Whatsapp_Button_Admin {

    /**
     * Referencia a versão atual do plugin para controle de algums funcionalidades
     * da presente classe.
     *
     * @access      protected
     * @var         string      $version    Versão atual do plugin.
     */
    protected $version;

    /**
     * Inicializa esta classe armazena a versão atual do plugin.
     *
     * @param       string      $version    Versão atual do plugin.
     */
	public function __construct( $version ) {
        $this->version = $version;
	}

    /**
     * Registra no menu do painel de controle a acesso aos parâmetros do plugin.
     */
	public function add_settings_page() {
		add_options_page(
			'Intellecti WhatsApp Button',
			'WhatsApp Button',
            'manage_options',
            'intellecti-whatsapp-button-options',
			array($this, 'render_settings_page')
		);
	}

    /**
     * Requisita o arquivo responsável por exibir no painel de controle as opções
     * de configuração do plugin.
     */
	public function render_settings_page() {
		require_once plugin_dir_path(__FILE__) . 'partials/intellecti-whatsapp-button-settings.php';
	}
}
