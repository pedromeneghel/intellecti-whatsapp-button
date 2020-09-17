<?php

/**
 * A Intellecti Whatsapp Button Thene é responsável por exibir o botão de
 * atendimento via Whatsapp no tema corrente do WordPress.
 *
 * @package IWB
 */

/**
 * A Intellecti Whatsapp Button Thene é responsável por exibir o botão de
 * atendimento via Whatsapp no tema corrente do WordPress.
 *
 * Esta classe é responsa´vel por disponibilizar no tema usado atualmente o
 * botão de atendimento juntamento com a janela de chat conforme parametrização
 * do plugin, feita através do painel de controle.
 *
 * @since 1.0.0
 */
class Intellecti_Whatsapp_Button_Theme
{
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
    public function __construct($version)
    {
        $this->version = $version;
    }

    /**
     * Inclui arquivos css e js necessários para funcionamento do plugin no
     * header e footer do tema.
     */
    public function enqueue_styles()
    {
        wp_enqueue_style(
            'bootstrap',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
            array(),
            $this->version
        );

        wp_enqueue_style(
            'icons',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css',
            array(),
            $this->version
        );

        wp_enqueue_style(
            'font',
            'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap',
            array(),
            $this->version
        );

        wp_enqueue_style(
            'animate',
            plugin_dir_url(__FILE__) . 'assets/css/animate.css',
            array(),
            $this->version
        );

        wp_enqueue_style(
            'plugin',
            plugin_dir_url(__FILE__) . 'assets/css/intellecti-whatsapp-button.css',
            array('bootstrap'),
            $this->version
        );

        wp_enqueue_script(
            'popper',
            'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
            array('jquery'),
            $this->version,
            true
        );

        wp_enqueue_script(
            'bootstrap',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
            array('popper'),
            $this->version,
            true
        );

        wp_enqueue_script(
            'moment',
            plugin_dir_url(__FILE__) . 'assets/js/moment.js',
            array('bootstrap'),
            $this->version,
            true
        );

        wp_enqueue_script(
            'moment-locale',
            plugin_dir_url(__FILE__) . 'assets/js/moment-with-locales.js',
            array('moment'),
            $this->version,
            true
        );

        wp_enqueue_script(
            'moment-timezone',
            plugin_dir_url(__FILE__) . 'assets/js/moment-timezone-with-data-10-year-range.js',
            array('moment'),
            $this->version,
            true
        );

        wp_enqueue_script(
            'plugin-scripts',
            plugin_dir_url(__FILE__) . 'assets/js/scripts.js',
            array('moment'),
            $this->version,
            true
        );
    }

    /**
     * Requisita o arquivo responsável por exibir a janela de chat no tema
     * corrente do WordPress.
     */
    public function render_whatsapp_button()
    {
        if(!is_admin()){
            require_once plugin_dir_path(__FILE__) . 'partials/intellecti-whatsapp-button-template-1.php';
        }
    }
}
