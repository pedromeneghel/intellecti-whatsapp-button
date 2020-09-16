<?php
/**
 * O arquivo responsável por iniciar o plugin Intellecti WhatsApp Button
 *
 * O Intellecti WhatsApp Button é um plugin que exibe, de acordo com as configurações,
 * uma botão em diversas regiões do website para que o usuário possa acionar o
 * atendimento via WhatsApp. Este arquivo é responsável por chamar o core do plugin
 * e iniciar o mesmo.
 *
 * @package IWB
 *
 * @wordpress-plugin
 * Plugin Name:       Intellecti WhatsApp Button
 * Plugin URI:        https://intellecti.com.br
 * Description:       Adiciona em todo o website um botão para atendimento via WhatsApp
 * Version:           1.0.0
 * Author:            Pedro Meneghel
 * Author URI:        https://linkedin.com/in/pedromeneghel
 * Text Domain:       intellecti-whatsapp-button-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */


// Se este arquivo for chamado diretamente, a execução do plugin finalizada.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Incluindo o core do plugin, responsável por carregar os componentes necessário
 * para seu funcionamento
 */
require_once plugin_dir_path(__FILE__) . 'includes/class-intellecti-whatsapp-button.php';

/**
 * Instancia a classe Intellecti_Whatsapp_Button  e chama o método run() para
 * iniciar o plugin
 */
function run_intellecti_whatsapp_button()
{

    $iwb = new Intellecti_Whatsapp_Button();
    $iwb->run();
}

// Chama a função acima para iniciar a execução do plugin
run_intellecti_whatsapp_button();
