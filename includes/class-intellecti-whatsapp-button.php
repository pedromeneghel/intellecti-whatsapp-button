<?php
/**
 * O arquivo Intellecti WhatsApp Button é responsável or incluir e instanciar
 * todas classes e demais componentes necessários para o funcionamento do
 * plugin.
 *
 * @package IWB
 */

 /**
  * O Intellecti WhatsApp Button é o plugin principal responsável por incluir e
  * instanciar todo o código que compõe o plugin.
  *
  * O Intellecti WhatsApp Button inclui uma instância para o Intellecti WhatsApp
  * Button Loader, que é responsável por coordenar os hooks que existem dentro do
  * plugin.
  *
  * Ele também mantém uma referência ao plugin que pode ser usado em
  * internacionalização e uma referência à versão atual do plugin
  * para que possamos facilmente atualizar a versão em um único lugar para
  * fornecer  funcionalidade de bloqueio de cache ao incluir scripts e estilos.
  *
  * @since 1.0.0
  */
class Intellecti_Whatsapp_Button {

    /**
     * Uma referência a classe do loader que coordena os hooks em todo o plugin
     *
     * @access protected
     * @var     Intellecti_Whatsapp_Button_Loader       $loader     Gerencia os
     * hooks do plugin com os hooks do Wordpress
     */
    protected $loader;

    /**
     * Representa p sçug do plugin pode ser usado para a intercionalização do
     * plugin.
     *
     * @access protected
     * @var     string      $plugin_slug
     */
    protected $plugin_slug;

    /**
     * Armazena a versão atual do plugin para fins de correto funcionamento
     * do plugin.
     *
     * @access protected
     * @var     string      $version    Versão atual do plugin.
     */
    protected $version;

    /**
     * Instancia o plugin configurando as principais propriedades e carregando
     * todas as dependências necessárias e definição dos hooks.
     *
     * O construtor irá definir o slug do plugin, versão, atributos, mas também
     * usará funções internas para importar todos os dependências necessárias
     * e irá carregar o alavancar o Intellecti_Whatsapp_Button_Loader para
     * registrar os hooks e as funções de retorno de chamada usadas em todo o
     * plugin.
     */
    public function __construct() {

        $this->plugin_slug = 'intellecti-whatsapp-button-slug';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_theme_hooks();

    }

    /**
     * Importa as classes Intellecti Whatsapp Button Admin, Intellecit Whatsapp
     * Button Theme e Intellecti Whatsapp Button Loader.
     *
     * A classe Intellecti Whatsapp Button Admin define todas as funcionalidades
     * exclusivas para introdução de opções de gerenciamento do plugin através
     * do painel de controle WordPress.
     *
     * A classe Intellecti Whatsapp Button Theme define todas as funcionalidades
     * exclusivas para introdução do plugins no tema corrente do WordPress.
     *
     *  A classe Intellecti Whatsapp Button Loader é a classe que irá coordenar
     * os hooks e callbacks do WordPress e do plugin. Esta função instancia e
     * define a referência ao propriedade da classe $loader.
     *
     * @access private
     */
    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-intellecti-whatsapp-button-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'theme/class-intellecti-whatsapp-button-theme.php';

        require_once plugin_dir_path(__FILE__) . 'class-intellecti-whatsapp-button-loader.php';
        $this->loader = new Intellecti_Whatsapp_Button_Loader();
    }

    /**
     * Define os hooks e funções de retorno de chamada que são usados para
     * configurar as folhas de estilo e demais componentes necessários para
     * administração do plugin via painel de controle do Wordpress.
     *
     * Esta função se baseia na classe Intellecti Whatsapp Button Admin e também
     * na classe Intellecti Whatsapp Button Loader
     *
     * @access private
     */
    private function define_admin_hooks() {
        $admin = new Intellecti_Whatsapp_Button_Admin($this->get_version());

        $this->loader->add_action('admin_init', $admin, 'register_section_page');
        $this->loader->add_action('admin_init', $admin, 'register_fields');
        $this->loader->add_action('admin_menu', $admin, 'add_settings_page');
    }

    /**
     * Define os hooks e funções de retorno de chamada que são usados para
     * configurar as folhas de estilo que são inseridos no tema corrente do
     * Wordpress.
     *
     * Esta função se baseia na classe Intellecti Whatsapp Button Theme e também
     * na classe Intellecti Whatsapp Button Loader
     *
     * @access private
     */
    private function define_theme_hooks() {
        $theme = new Intellecti_Whatsapp_Button_Theme($this->get_version());
        $this->loader->add_action('wp_enqueue_scripts', $theme, 'enqueue_styles');
        $this->loader->add_action('wp_footer', $theme, 'render_whatsapp_button');

    }

    /**
     * Coloca a classe para trabalhar
     *
     * Executa o plugin chamando o método run da classe loader, registrando todos
     * os hooks  e funções de retorno usadas no plugin.
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * Retorna a versão atual do plugin.
     *
     * @return  string      $this->version      Versão atual do plugin.
     */
    public function get_version() {
        return $this->version;
    }

}
