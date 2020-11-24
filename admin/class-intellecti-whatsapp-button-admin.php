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
    public function __construct( $version )
    {
        $this->version = $version;
	}

    /**
     * Registra no menu do painel de controle a acesso aos parâmetros do plugin.
     */
    public function add_settings_page()
    {
		add_options_page(
			__('Intellecti WhatsApp Button', 'intellecti-whatsapp-button-locale'),
            __('WhatsApp Button', 'intellecti-whatsapp-button-locale'),
            'manage_options',
            'intellecti-whatsapp-button-options',
			array($this, 'render_settings_page')
		);
    }

    /**
     * Retorna a lista de atendentes ativos na plataforma para exibição na
     * janela de atendimento.__resizable_base__
     *
     * @return  array      $atendents      Objeto com os dados dos atendnetes ativos.
     */
    private function get_atendent_list()
    {
        $atendents = array();
        $args = array(
            'post_type' => 'iwb-team',
        );

        $query = new WP_Query($args);

        if($query->have_posts())
        {
            while ($query->have_posts())
            {
                $query->the_post();

                array_push($atendents, array(
                    'atendent' => get_the_title(),
                    'ID' => get_the_ID()
                ));
            }
        }

        return $atendents;
    }

    /**
     * Registra a seção de campos da página de parâmetros do plugin.
     */
    public function register_section_page()
    {
        add_settings_section(
            'iwb_options',
            __('Configurações do plugin', 'intellecti-whatsapp-button-locale'),
            function( $args ){
                echo __('Abaixo estão disposníveis todos as configurações do plugin.', 'intellecti-whatsapp-button-locale');
            },
            'iwb_options_group'
        );
    }

    /**
     * Registra os campos ncessários de parâmetros do plugin.
     */
    public function register_fields()
    {
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
                    array(
                        'label' => __('Sim', 'intellecti-whatsapp-button-locale'),
                        'value' => 'sim'
                    ),
                    array(
                        'label' => __('Não', 'intellecti-whatsapp-button-locale'),
                        'value' => 'nao'
                    )
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
                'default' => __('Precisa de ajuda? Vamos conversar!', 'intellecti-whatsapp-button-locale'),
            )
        );

        // Adicionando o campo iwb_button_text
        add_settings_field(
            'iwb_button_text',
            __('Texto do botão', 'intellecti-whatsapp-button-locale'),
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
                'default' => __('Precisa de ajuda? Converse conosco!', 'intellecti-whatsapp-button-locale'),
            )
        );

        // Adicionando o campo iwb_chat_title
        add_settings_field(
            'iwb_chat_title',
            __('Título da janela de chat', 'intellecti-whatsapp-button-locale'),
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
                'default' => __('Contate um membro de nossa equipe', 'intellecti-whatsapp-button-locale'),
            )
        );

        // Adicionando o campo iwb_chat_description
        add_settings_field(
            'iwb_chat_description',
            __('Descrição da janela de chat', 'intellecti-whatsapp-button-locale'),
            array($this, 'input_field'),
            'iwb_options_group',
            'iwb_options',
            [
                'label_for' => 'iwb_chat_description_id',
                'class'     => 'classe-html-tr',
                'name'      => 'iwb_chat_description'
            ]
        );

        // Registrando o campo iwp_atendent_default
        register_setting(
            'iwb_options_group',
            'iwb_atendent_default',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $options = [];
        $atendents = $this->get_atendent_list();

        if($atendents)
        {
            foreach($atendents as $atendent)
            {
                array_push($options, array(
                    'label' => $atendent['atendent'],
                    'value' => $atendent['ID']
                ));
            }
        }

        // Adicionando o campo iwp_atendent_default
        add_settings_field(
            'iwb_atendent_default',
            __('Atendente Padrão', 'intellecti-whatsapp-button-locale'),
            array($this, 'select_field'),
            'iwb_options_group',
            'iwb_options',
            [
                'label_for'     => 'iwb_atendent_default_id',
                'class'         => 'classe-html-tr',
                'name'          => 'iwb_atendent_default',
                'description'   => __('A opção de atendente padrão é utilizada apenas quando selecionado o Template 2 que exibe diretamente o atendente na janela de chat.', 'intellecti-whatsapp-button-locale'),
                'options'       => $options
            ]
        );

        // Registrando campo iwb_template
        register_setting(
            'iwb_options_group',
            'iwb_template',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        // Adicionando a capo
        add_settings_field(
            'iwb_template',
            __('Template da janela de atendimento', 'intellecti-whatsapp-button-locale'),
            array($this, 'select_field'),
            'iwb_options_group',
            'iwb_options',
            [
                'label_for' => 'iwb_template_id',
                'class'     => 'classe-html-tr',
                'name'      => 'iwb_template',
                'options' => array(
                    array(
                        'label' => 'Template 1',
                        'value' => 'template-1'
                    ),
                    array(
                        'label' => 'Template 2',
                        'value' => 'template-2'
                    )
                )
            ]
        );
    }

    /**
     * Método genérico para geração de campos do tipo input para formulário.
     */
    public function input_field($args)
    {
        $description = '';
        $value = get_option($args['name']);

        if(isset($args['description']) && !empty($args['description']))
        {
            $description = '<p class="description" id="' . $args['name'] .'_description">' . $args['description'] . '</p>';
        }

        echo '
            <input
                type="text"
                id="' . esc_attr($args['label_for']) . '"
                name="' . esc_attr($args['name']) . '"
                value="' . esc_attr($value) . '"
                class="regular-text"
                required
            >
            ' . $description . '
        ';
    }

    /**
     * Método genérico para geração de campos do tipo input para formulário.
     */
    public function select_field($args)
    {
        $description = '';
        $value = strtolower(str_replace(' ', '-', get_option($args['name'])));

        if (isset($args['description']) && !empty($args['description'])) {
            $description = '<p class="description" id="' . $args['name'] . '_description">' . $args['description'] . '</p>';
        }

        echo '
            <select name="' . esc_attr($args['name']) . '" required>
                <option hidden></option>
        ';

        foreach($args['options'] as $option){
            var_dump($option);
            echo '<option value="' . $option['value'] . '" ' . selected($value, $option['value']) . '>' . $option['label'] . '</option>';
        }

        echo '
            </select>
            ' . $description . '
        ';
    }

    /**
     * Requisita o arquivo responsável por exibir no painel de controle as opções
     * de configuração do plugin.
     */
    public function render_settings_page()
    {
		require_once plugin_dir_path(__FILE__) . 'partials/intellecti-whatsapp-button-settings.php';
    }

    public function register_post_type_atendent()
    {
        $labels = [
            "name" => __("Intellecti WhatsApp Button - Atendentes", "intellecti-whatsapp-button-locale"),
            "singular_name" => __("Intellecti WhatsApp Button - Atendente", "intellecti-whatsapp-button-locale"),
            "menu_name" => __("IWB - Atendentes", "intellecti-whatsapp-button-locale"),
            "all_items" => __("Todos os atendentes", "intellecti-whatsapp-button-locale"),
            "add_new" => __("Adicionar novo atendente", "intellecti-whatsapp-button-locale"),
            "add_new_item" => __("Adicionar novo atendente", "intellecti-whatsapp-button-locale"),
            "edit_item" => __("Editar atendente", "intellecti-whatsapp-button-locale"),
            "new_item" => __("Novo atendente", "intellecti-whatsapp-button-locale"),
            "view_item" => __("Ver atendente", "intellecti-whatsapp-button-locale"),
            "view_items" => __("Ver atendentes", "intellecti-whatsapp-button-locale"),
            "search_items" => __("Procurar atendente", "intellecti-whatsapp-button-locale"),
            "not_found" => __("Atendente não encontrado", "intellecti-whatsapp-button-locale"),
            "not_found_in_trash" => __("Atendente não encontrado na lixeira", "intellecti-whatsapp-button-locale"),
            "featured_image" => __("Foto do atendente", "intellecti-whatsapp-button-locale"),
            "set_featured_image" => __("Definir foto do atendente", "intellecti-whatsapp-button-locale"),
            "remove_featured_image" => __("Remover foto do atendente", "intellecti-whatsapp-button-locale"),
            "use_featured_image" => __("Usar esta foto para o atendente", "intellecti-whatsapp-button-locale"),
            "archives" => __("Atendentes arquivados", "intellecti-whatsapp-button-locale"),
            "insert_into_item" => __("Inserir atendente", "intellecti-whatsapp-button-locale"),
            "filter_items_list" => __("Filtrar lista de atendenetes", "intellecti-whatsapp-button-locale"),
            "items_list" => __("Lista de atendentes", "intellecti-whatsapp-button-locale"),
            "name_admin_bar" => __("Novo atendente", "intellecti-whatsapp-button-locale"),
            "item_published" => __("Atendente publicado", "intellecti-whatsapp-button-locale"),
            "item_scheduled" => __("Atendente agendado", "intellecti-whatsapp-button-locale"),
            "item_updated" => __("Atendente atualizado", "intellecti-whatsapp-button-locale"),
        ];

        $args = [
            "label" => __("Intellecti WhatsApp Button - Atendentes", "intellecti-whatsapp-button-locale"),
            "labels" => $labels,
            "description" => __("Gestão dos integrantes do time de atendimento disponibilizado no chat de atendimento via WhatsApp", "intellecti-whatsapp-button-locale"),
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => ["slug" => "iwb-team", "with_front" => true],
            "query_var" => true,
            "supports" => ["title", "thumbnail"],
        ];

        register_post_type("iwb-team", $args);
    }

    /**
     * Registra os campos necessários para o cadastro de atendentes
     */
    public function register_custom_fields()
    {
        // Telefone do antendente
        add_meta_box(
            'iwb_atendent_phone_field',
            __('Telefone do Atendente', 'intellecti-whatsapp-button-locale'),
            array($this, 'render_atendent_phone'),
            'iwb-team',
            'side',
            'default'
        );

        // Função do atendente
        add_meta_box(
            'iwb_atendent_occupation_field',
            __('Função do atendente', 'intellecti-whatsapp-button-locale'),
            array($this, 'render_atendent_occupation'),
            'iwb-team',
            'side',
            'default'
        );

        // Campos dia da semana
        add_meta_box(
            'iwb_atendent_online_hours_field',
            __('Horários de Atendimento', 'intellecti-whatsapp-button-locale'),
            array($this, 'render_atendent_online_hours'),
            'iwb-team',
            'advanced',
            'default'
        );
    }

    /**
     * Efetiva a gravação/atualização dos dados referente aos campos do cadastro de atendentes
     */
    public function save_atendent_custom_fields($post_id)
    {
        // Salvando o telefone do atendente
        if (array_key_exists('iwb_atendent_phone', $_POST))
        {
            update_post_meta(
                $post_id,
                '_iwb_atendent_phone',
                sanitize_text_field($_POST['iwb_atendent_phone'])
            );
        }

        // Salvando a ocupação do atendent
        if (array_key_exists('iwb_atendent_occupation', $_POST))
        {
            update_post_meta(
                $post_id,
                '_iwb_atendent_occupation',
                sanitize_text_field($_POST['iwb_atendent_occupation'])
            );
        }

        // Salvando horário de atendimento de segunda-feira
        if (array_key_exists('iwb_start_hour_monday', $_POST))
        {
            update_post_meta(
                $post_id,
                '_iwb_start_hour_monday',
                sanitize_text_field($_POST['iwb_start_hour_monday'])
            );
        }

        if (array_key_exists('iwb_end_hour_monday', $_POST))
        {
            update_post_meta(
                $post_id,
                '_iwb_end_hour_monday',
                sanitize_text_field($_POST['iwb_end_hour_monday'])
            );
        }

        // Salvando horário de atendimento de terça-feira
        if (array_key_exists('iwb_start_hour_tuesday', $_POST))
        {
            update_post_meta(
                $post_id,
                '_iwb_start_hour_tuesday',
                sanitize_text_field($_POST['iwb_start_hour_tuesday'])
            );
        }

        if (array_key_exists('iwb_end_hour_tuesday',
            $_POST
        ))
        {
            update_post_meta(
                $post_id,
                '_iwb_end_hour_tuesday',
                sanitize_text_field($_POST['iwb_end_hour_tuesday'])
            );
        }

        // Salvando horário de atendimento de quarta-feira
        if (array_key_exists('iwb_start_hour_wednesday', $_POST))
        {
            update_post_meta(
                $post_id,
                '_iwb_start_hour_wednesday',
                sanitize_text_field($_POST['iwb_start_hour_wednesday'])
            );
        }

        if (array_key_exists(
            'iwb_end_hour_wednesday',
            $_POST
        )) {
            update_post_meta(
                $post_id,
                '_iwb_end_hour_wednesday',
                sanitize_text_field($_POST['iwb_end_hour_wednesday'])
            );
        }

        // Salvando horário de atendimento de quinta-feira
        if (array_key_exists('iwb_start_hour_thursday', $_POST))
        {
            update_post_meta(
                $post_id,
                '_iwb_start_hour_thursday',
                sanitize_text_field($_POST['iwb_start_hour_thursday'])
            );
        }

        if (array_key_exists(
            'iwb_end_hour_thursday',
            $_POST
        ))
        {
            update_post_meta(
                $post_id,
                '_iwb_end_hour_thursday',
                sanitize_text_field($_POST['iwb_end_hour_thursday'])
            );
        }

        // Salvando horário de atendimento de sexta-feira
        if (array_key_exists('iwb_start_hour_friday', $_POST)) {
            update_post_meta(
                $post_id,
                '_iwb_start_hour_friday',
                sanitize_text_field($_POST['iwb_start_hour_friday'])
            );
        }

        if (array_key_exists(
            'iwb_end_hour_friday',
            $_POST
        ))
        {
            update_post_meta(
                $post_id,
                '_iwb_end_hour_friday',
                sanitize_text_field($_POST['iwb_end_hour_friday'])
            );
        }

        // Salvando horário de atendimento de sábado
        if (array_key_exists('iwb_start_hour_saturday', $_POST)) {
            update_post_meta(
                $post_id,
                '_iwb_start_hour_saturday',
                sanitize_text_field($_POST['iwb_start_hour_saturday'])
            );
        }

        if (array_key_exists(
            'iwb_end_hour_saturday',
            $_POST
        ))
        {
            update_post_meta(
                $post_id,
                '_iwb_end_hour_saturday',
                sanitize_text_field($_POST['iwb_end_hour_saturday'])
            );
        }

        // Salvando horário de atendimento de domingo
        if (array_key_exists('iwb_start_hour_sunday', $_POST))
        {
            update_post_meta(
                $post_id,
                '_iwb_start_hour_sunday',
                sanitize_text_field($_POST['iwb_start_hour_sunday'])
            );
        }

        if (array_key_exists(
            'iwb_end_hour_sunday',
            $_POST
        ))
        {
            update_post_meta(
                $post_id,
                '_iwb_end_hour_sunday',
                sanitize_text_field($_POST['iwb_end_hour_sunday'])
            );
        }
    }

    /**
     * Renderiza o campo telefone no cadastro de atendentes na sidebar
     */
    public function render_atendent_phone($post)
    {
        require_once plugin_dir_path(__FILE__) . 'partials/intellecti-whatsapp-button-atendent-phone.php';
    }

    /**
     * Renderiza o campo ocupação/função no cadastro de atendentes na sidebar
     */
    public function render_atendent_occupation($post)
    {
        require_once plugin_dir_path(__FILE__) . 'partials/intellecti-whatsapp-button-atendent-occupation.php';
    }

    /**
     * Renderiza os demais campos necessários no cadastro de atendentes
     */
    public function render_atendent_online_hours($post)
    {
        require_once plugin_dir_path(__FILE__) . 'partials/intellecti-whatsapp-button-atendent-online-hours.php';
    }
}
