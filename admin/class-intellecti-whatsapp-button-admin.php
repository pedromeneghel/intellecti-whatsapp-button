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
     * Registra a seção de campos da página de parâmetros do plugin.
     */
    public function register_section_page() {
        add_settings_section(
            'iwb_options',
            'Configurações do plugin',
            function( $args ){
                echo 'Abaixo estão disposníveis todos as configurações do plugin.';
            },
            'iwb_options_group'
        );
    }

    /**
     * Registra os campos ncessários de parâmetros do plugin.
     */
    public function register_fields(){
        // Registrando o campo iwb_status
        register_setting(
            'iwb_options_group',
            'iwb_status',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => NULL,
            )
        );

        // Adicionando o campo iwb_status
        add_settings_field(
            'iwb_status',
            'Plugin ativo',
            array($this, 'select_field'),
            'iwb_options_group',
            'iwb_options',
            [
                'label_for' => 'iwb_status_id',
                'class'     => 'classe-html-tr',
                'name'      => 'iwb_status',
                'options'   => array(
                    'Sim',
                    'Não'
                )
            ]
        );

        // Registrando o campo iwb_button_text
        register_setting(
            'iwb_options_group',
            'iwb_button_text',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'Precisa de? Vamos conversar',
            )
        );

        // Adicionando o campo iwb_button_text
        add_settings_field(
            'iwb_button_text',
            'Texto do botão',
            array($this, 'input_field'),
            'iwb_options_group',
            'iwb_options',
            [
                'label_for' => 'iwb_button_text_id',
                'class'     => 'classe-html-tr',
                'name'      => 'iwb_button_text'
            ]
        );

        // Registrando o campo iwb_chat_title
        register_setting(
            'iwb_options_group',
            'iwb_chat_title',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'Precisa de ajuda? Converse conosco!',
            )
        );

        // Adicionando o campo iwb_chat_title
        add_settings_field(
            'iwb_chat_title',
            'Título da janela de chat',
            array($this, 'input_field'),
            'iwb_options_group',
            'iwb_options',
            [
                'label_for' => 'iwb_chat_title_id',
                'class'     => 'classe-html-tr',
                'name'      => 'iwb_chat_title'
            ]
        );

        // Registrando o campo iwb_chat_description
        register_setting(
            'iwb_options_group',
            'iwb_chat_description',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'Contate um membro de nossa equipe',
            )
        );

        // Adicionando o campo iwb_chat_description
        add_settings_field(
            'iwb_chat_description',
            'Descrição da janela de chat',
            array($this, 'input_field'),
            'iwb_options_group',
            'iwb_options',
            [
                'label_for' => 'iwb_chat_description_id',
                'class'     => 'classe-html-tr',
                'name'      => 'iwb_chat_description'
            ]
        );
    }

    /**
     * Método genérico para geração de campos do tipo input para formulário.
     */
    public function input_field($args){
        $value = get_option($args['name']);

        echo '
            <input
                type="text"
                id="' . esc_attr($args['label_for']) . '"
                name="' . esc_attr($args['name']) . '"
                value="' . esc_attr($value) . '"
                class="regular-text"
            >
        ';
    }

    public function select_field($args){
        $value = get_option($args['name']);

        echo '
            <select name="' . esc_attr($args['name']) . '">
        ';

        foreach($args['options'] as $option){
            echo '<option ' . selected($value, $option) . '>' . $option . '</option>';
        }

        echo '
            </select>
        ';
    }

    /**
     * Requisita o arquivo responsável por exibir no painel de controle as opções
     * de configuração do plugin.
     */
	public function render_settings_page() {
		require_once plugin_dir_path(__FILE__) . 'partials/intellecti-whatsapp-button-settings.php';
	}
}
