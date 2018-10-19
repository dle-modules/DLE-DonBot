<!DOCTYPE HTML>
<html>
    <head>
        <title>Удаление модуля DonBot</title>
        <link rel="stylesheet" type="text/css" href="http://store.alaev.info/style.css" />
        <style type="text/css">
            #header {width: 100%; text-align: center;}
            .box-cnt{width: 100%; overflow: hidden;}
        </style>
    </head>

    <body>
        <div class="wrap">
            <div id="header">
                <h1>DonBot</h1>
            </div>
            <div class="box">
                <div class="box-t">&nbsp;</div>
                <div class="box-c">
                    <div class="box-cnt">
                        <?php

                            $output = module_uninstaller();
                            echo $output;

                        ?>
                    </div>
                </div>
                <div class="box-b">&nbsp;</div>
            </div>
        </div>
    </body>
</html>

<?php

    function module_uninstaller()
    {
        // Стандартный текст
        $output = '<h2>Добро пожаловать в скрипт для удаления модуля DonBot!</h2>';
        $output .= '<p><strong>Внимание!</strong> После удаления модуля <strong>обязательно</strong> удалите файл <strong>donbot_uninstaller.php</strong> с Вашего сервера!</p>';
        $output .= '<p>';
        $output .= '<strong>Кроме того, необходимо удалить следующие файлы и папки:</strong>';
        $output .= '<ul>';
            $output .= '<li>/engine/modules/<strong>donbot.php</strong></li>';
            $output .= '<li>/engine/inc/<strong>donbot.php</strong></li>';
            $output .= '<li>/engine/skins/images/<strong>donbot.png</strong></li>';
            $output .= '<li>/engine/skins/<strong>donbot</strong>/</li>';
        $output .= '</ul>';
        $output .= '</p>';

        // Если через $_POST передаётся параметр donbot_uninstall, производим инсталляцию, согласно параметрам
        if(!empty($_POST['donbot_uninstall']))
        {
            // Подключаем config
            include_once ('engine/data/config.php');

            // Подключаем DLE API
            include ('engine/api/api.class.php');

            // Удаляем модуль из админки
            $dle_api->uninstall_admin_module('donbot');

            // Вывод
            $output .= '<p>';
            $output .= 'Модуль успешно удалён!';
            $output .= '</p>';
        }

        // Если через $_POST ничего не передаётся, выводим форму для удаления модуля
        else
        {
            // Вывод
            $output .= '<p>';
            $output .= '<form method="POST" action="donbot_uninstaller.php">';
            $output .= '<input type="hidden" name="donbot_uninstall" value="1" />';
            $output .= '<input type="submit" value="Удалить модуль" />';
            $output .= '</form>';
            $output .= '</p>';
        }
        
        $output .= '<p>';
        $output .= '<a href="http://alaev.info/blog/post/4481?from=DonBot">разработка и поддержка модуля</a>';
        $output .= '</p>';

        // Функция возвращает то, что должно быть выведено
        return $output;
    }

?>
