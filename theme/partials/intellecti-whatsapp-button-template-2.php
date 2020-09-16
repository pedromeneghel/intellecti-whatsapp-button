<?php

/**
 * Exibe a template nº 2 doa botão de atendimento via Whatsapp.
 *
 * Este é um modelo parcial é incluído, caso definido nos parâmetros do plugin,
 * exibindo assim o botão de atendimento via Whatsapp no tema atual do WordPress.
 *
 * @package IWB
 */

?>

<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>Whelp & Jquery Plugin</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <!-- googlefonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <!-- animatecss -->
    <link rel="stylesheet" href="plugins/animate.css" />

    <link rel="stylesheet" href="whelp.css" />
</head>

<body>

    <!-- template 2 start -->
    <div class="wsc" id="template-2">
        <div class="wsc-label">
            Questions? Let's Chat
        </div>
        <div class="wsc-circle">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div id="wsc-box" class="fast">
            <div class="wsc-close"><i class="fas fa-times"></i></div>
            <div class="wsc-header-single">
                <div class="wsc-avatar">
                    <img src="images/person_5.jpg" alt="" />
                </div>
                <div class="wsc-content text-left">
                    <div class="wsc-name text-light">Jack Doe</div>
                    <div class="wsc-desc text-light">Techincal Support</div>
                </div>
            </div>
            <div class="wsc-text">
                <div class="wsc-message">
                    Hello, how can we help you? <br />
                    Send <span class="badge badge-success">5</span> and list services.
                </div>
            </div>
            <div class="wsc-container p-0">
                <div class="wsc-chat" data-number="+905536384964">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-0 border-0" placeholder="Say something!" />
                        <div class="input-group-append">
                            <div class="btn btn btn-link rounded-0" id="send"><i class="fas fa-play text-dark"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- template 2 end -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- momentjs -->
    <script src="plugins/moment.js"></script>
    <script src="plugins/moment-with-locales.js"></script>
    <script src="plugins/moment-timezone-with-data-10-year-range.js"></script>

    <script src="whelp.js"></script>
</body>

</html>
