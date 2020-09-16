<?php
/**
 * Intellecti Whatsapp Button Loader é a classe responsável por coordenar todas
 * as chamadas e registros das actions e filtros usados em todo o plugin.
 *
 * @package IWB
 */

/**
 * Intellecti Whatsapp Button Loader é a classe responsável por coordenar todas
 * as chamadas e registros das actions e filtros usados em todo o plugin.
 *
 * Esta classe mantém duas coleções internas - uma para actions, uma para
 * filtros - cada um dos quais é coordenado por meio de classes externas que
 * registre os vários hooks por meio desta classe.
 *
 * @since 1.0.0
 */
class Intellecti_Whatsapp_Button_Loader {

    /**
     * Uma referência ao vetor de actions usadas em todo o plugin.
     *
     * @access protected
     * @var     array        $actions O array de açtions que são definidas em
     * todo o plugin.
     */
    protected $actions;

    /**
     * Uma referência ao vetor de filtros usados em todo o plugin.
     *
     * @access protected
     * @var     array        $filters   O array de filtros que são definidos em
     * todo o plugin.
     */
    protected $filters;

    /**
     * Instancia o plugin, configurando as estruturas de dados que irão
     * ser usado para manter as actions e os filtros.
     */
    public function __construct()
    {
        $this->actions = [];
        $this->filters = [];
    }

    /**
     * Registra as actions junto ao WordPress para o correto funcionamento do
     * plugin.
     *
     * @param       string      $hook        Nome do hook do WordPress a ser
     * disparado.
     * @param       object      $component   Objeto que contém o método a ser
     * executado pelo hook.
     * @param       string      $callback    Método residente no objeto que
     * será executado pelo hook.
     */
    public function add_action( $hook, $component, $callback )
    {
        $this->actions = $this->add( $this->actions, $hook, $component, $callback );
    }

    /**
     * Registra os filtros junto ao WordPress para o correto funcionamento do
     * plugin.
     *
     * @param       string      $hook        Nome do hook do WordPress a ser
     * disparado.
     * @param       object      $component   Objeto que contém o método a ser
     * executado pelo hook.
     * @param       string      $callback    Método residente no objeto que
     * será executado pelo hook.
     */
    public function add_filter( $hook, $component, $callback )
    {
        $this->filters = $this->add( $this->filters, $hook, $component, $callback );
    }

    /**
     * Registra os actions e filtros com o Wospress os respectivos objetos e
     * seus métodos.
     *
     * @access private
     *
     * @param       array       $hooks      Coleção de hooks existentes para
     * serem adicionados.
     * @param       string      $hook       Nome do hook do Wordpress a ser
     * registrado.
     * @param       object      $component  Objeto que contém o método a ser
     * disparado pelo hook.
     * @param       string      $callback   Método do objeto a ser disparado pelo
     * hook.
     *
     * @return      array       Retorna um vetor com os hooks a serem registrados
     * junto ao WordPress para o correto funcionamento do plugin.
     */
    private function add($hooks, $hook, $component, $callback)
    {

        $hooks[] = array(
            'hook'      => $hook,
            'component' => $component,
            'callback'  => $callback
        );

        return $hooks;
    }

    /**
     * Registra todos os filtros e actions do plugin junto ao WordPress.
     */
    public function run()
    {
        foreach( $this->filters as $hook ) {
            add_filter( $hook['hook'], array( $hook['component'], $hook['callback']) );
        }

        foreach ( $this->actions as $hook ) {
            add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
        }
    }

}
