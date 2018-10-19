<?php

/*
=============================================================================
 Файл: donbot.php (backend) версия 1.1
-----------------------------------------------------------------------------
 Автор: Фомин Александр Алексеевич, mail@mithrandir.ru
-----------------------------------------------------------------------------
 Сайт поддержки: http://alaev.info/blog/post/4481
-----------------------------------------------------------------------------
 Назначение: генератор кода для вставки модуля в шаблон main.tpl после <head>
=============================================================================
*/

    // Антихакер
    if( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' ) ) {
            die( "Hacking attempt!" );
    }

    echoheader('DonBot', 'Модуль управления индексацией сайта');

if ( $config['version_id'] >= 10.2 ) {
        echo '<style>.uniform, div.selector {min-width: 250px;} input[type="checkbox"] {width:17px;height:17px;}
		ul {padding:3px 0 0 20px;}</style>';
} else {
        echo '<style>
@import url("engine/skins/application.css");

.box {
margin:10px;
}
.uniform {
position: relative;
padding-left: 5px;
overflow: hidden;
min-width: 250px;
font-size: 12px;
-webkit-border-radius: 0;
-moz-border-radius: 0;
-ms-border-radius: 0;
-o-border-radius: 0;
border-radius: 0;
background: whitesmoke;
background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==");
background-size: 100%;
background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffffff), color-stop(100%, #f5f5f5));
background-image: -webkit-linear-gradient(top, #ffffff, #f5f5f5);
background-image: -moz-linear-gradient(top, #ffffff, #f5f5f5);
background-image: -o-linear-gradient(top, #ffffff, #f5f5f5);
background-image: linear-gradient(top, #ffffff, #f5f5f5);
-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
-moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
border: 1px solid #ccc;
font-size: 12px;
height: 28px;
line-height: 28px;
color: #666;
}
input[type="checkbox"] {
width: 17px;
height: 17px;
}
</style>';
}

?>

<div class="box">

	<div class="box-header">
		<div class="title">Генератор кода для вставки модуля</div>
		<ul class="box-toolbar">
			<li class="toolbar-link">
			<a target="_blank" href="http://alaev.info/blog/post/4481?from=DonBot">DonBot v.1.1 © 2014 Блог АлаичЪ'а - разработка и поддержка модуля</a>
			</li>
		</ul>
	</div>

	<div class="box-content">
	<table class="table table-normal">
	<tbody>
		<tr>
		<td class="col-xs-6"><h5>Какой тег выводить в шаблон?</h5><span class="note large">Тег, выводимый на место вставки модуля в шаблон.<br /><strong>noindex,nofollow</strong> - Будет запрещена индексация страницы, а так же проход поисковой системы по ссылкам на этой странице.<br /><strong>noindex,follow</strong> - Будет запрещена индексация страницы, но разрешен проход поисковой системы по ссылкам на этой странице.</span></td>
		<td class="col-xs-6 settingstd">
			<select class="uniform" name="date" id="donbot_tag">
			<option value="nofollow">noindex,nofollow</option>
			<option value="follow">noindex,follow</option>
			</select>
		</td>
		</tr><tr>
		<td class="col-xs-6"><h5>Технические страницы</h5><span class="note large">При выборе данной опции будет запрещена индексация на страницах: <ul><li>добавления новости с сайта</li><li>формы обратной связи</li><li>восстановления пароля</li><li>регистрации нового пользователя</li><li>правил сайта</li><li>статистики сайта</li><li>поиска и результатов поиска</li><li>личных сообщений пользователей</li><li>закладок пользователей</li><li>непрочитанных новостей для пользователя</li><li>просмотра всех последних комментариев на сайте</li><li>в т.ч. комментариев отдельного пользователя</li><li>просмотра всех последних новостей</li><li>архива новостей за год/месяц/день</li></ul></span></td>
		<td class="col-xs-6 settingstd"><input type="checkbox" name="tech_template" id="donbot_tech_template" /></td>
        </tr><tr>
		<td class="col-xs-6"><h5>Пользователи</h5><span class="note large">При выборе данной опции будет запрещена индексация на страницах: <ul><li>профиля пользователя</li><li>просмотра всех новостей пользователя</li></ul></span></td>
		<td class="col-xs-6 settingstd"><input type="checkbox" name="user_template" id="donbot_user_template" /></td>
		</tr><tr>
		<td class="col-xs-6"><h5>Теги</h5><span class="note large">При выборе данной опции будет запрещена индексация на страницах: <ul><li>просмотра списка тегов</li><li>просмотра новостей по тегу</li></ul></span></td>
		<td class="col-xs-6 settingstd"><input type="checkbox" name="tag_template" id="donbot_tag_template" /></td>
		</tr><tr>
		<td class="col-xs-6"><h5>Код для вставки в <strong>main.tpl</strong></h5><span class="note large"></span></td>
		<td class="col-xs-6 settingstd">
			<textarea type="text" style="width:100%;height:100px;" name="code" id="donbot_code">{include file='engine/modules/donbot.php?tag=nofollow&pages=addnews,feedback,lostpassword,register,rules,stats,search,pm,favorites,newposts,lastnews,lastcomments,date,userinfo,allnews'}</textarea>
		</td>
		</tr>
	</tbody>
	</table>
	<table class="table table-normal">
	<tbody>
		<tr>
		<td colspan="4" style="background: lightgoldenrodyellow; padding: 5px; text-align: center;">
		<strong>ДАЛЕЕ СЛЕДУЮТ НАСТРОЙКИДЛЯ ПРОДВИНУТЫХ ПОЛЬЗОВАТЕЛЕЙ!!!</strong>
		<div>Условия ниже можно использовать только в том случае, если вы на 100% уверены в том, что вы делаете, и какой результат вы хотите получить. Используйте на свой страх и риск.</div>
		</td>
		</tr>
		<tr>
		<td>
		<input type="checkbox" name="all" id="donbot_all" />
		<label for="donbot_all">выбрать все</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="addnews" id="donbot_addnews" />
		<label for="donbot_addnews">добавление новостей</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="feedback" id="donbot_feedback" />
		<label for="donbot_feedback">обратная связь</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="lostpassword" id="donbot_lostpassword" />
		<label for="donbot_lostpassword">восстановление пароля</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_tech_template" type="checkbox" name="register" id="donbot_register" />
		<label for="donbot_register">регистрация</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="rules" id="donbot_rules" />
		<label for="donbot_rules">правила сайта</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="stats" id="donbot_stats" />
		<label for="donbot_stats">статистика сайта</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="search" id="donbot_search" />
		<label for="donbot_search">поиск и результаты поиска</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_tech_template" type="checkbox" name="pm" id="donbot_pm" />
		<label for="donbot_pm">личные сообщения</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="favorites" id="donbot_favorites" />
		<label for="donbot_favorites">закладки</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="newposts" id="donbot_newposts" />
		<label for="donbot_newposts">просмотр непрочитанных новостей</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="lastnews" id="donbot_lastnews" />
		<label for="donbot_lastnews">просмотр всех последних новостей</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_tech_template" type="checkbox" name="lastcomments" id="donbot_lastcomments" />
		<label for="donbot_lastcomments">просмотр последних комментариев</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="date" id="donbot_date" />
		<label for="donbot_date">просмотр архива новостей по дате</label>
		</td><td>
		<input class="donbot_user_template" type="checkbox" name="userinfo" id="donbot_userinfo" />
		<label for="donbot_userinfo">профиль пользователя</label>
		</td><td>
		<input class="donbot_user_template" type="checkbox" name="allnews" id="donbot_allnews" />
		<label for="donbot_allnews">просмотр всех новостей пользователя</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_tag_template" type="checkbox" name="alltags" id="donbot_alltags" />
		<label for="donbot_alltags">страница списка тегов</label>
		</td><td>
		<input class="donbot_tag_template" type="checkbox" name="tags" id="donbot_tags" />
		<label for="donbot_tags">просмотр новостей по конкретному тегу</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="xfsearch" id="donbot_xfsearch" />
		<label for="donbot_xfsearch">просмотр новостей по доп. полям</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="catalog" id="donbot_catalog" />
		<label for="donbot_catalog">просмотр новостей по букве</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_extended_template" type="checkbox" name="pages" id="donbot_pages" />
		<label for="donbot_pages">любые страницы пагинации</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="mainp" id="donbot_mainp" />
		<label for="donbot_mainp">страницы пагинации для главной</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="catp" id="donbot_catp" />
		<label for="donbot_catp">страницы пагинации для категорий</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="showfull" id="donbot_showfull" />
		<label for="donbot_showfull">полный просмотр статьи</label>
		</td>
		</tr>
	</tbody>
	</table>
	</div>
</div>
            <script type="text/javascript">
                var donbot_templates = [
                    "tech",
                    "user",
                    "tag"
                ];

                var donbot_options = [
                    "addnews",
                    "feedback",
                    "lostpassword",
                    "register",
                    "rules",
                    "stats",
                    "search",
                    "pm",
                    "favorites",
                    "newposts",
                    "lastnews",
                    "lastcomments",
                    "date",
                    "userinfo",
                    "allnews",
                    "alltags",
                    "tags",
                    "xfsearch",
                    "catalog",
                    "pages",
                    "mainp",
                    "catp",
                    "showfull"
                ];

                // Обработка пресетов
                for(var i = 0; i < donbot_templates.length; i = i+1)
                {
                    document.getElementById("donbot_" + donbot_templates[i] + "_template").onchange = function(event){
                        event = event || window.event
                        var template = event.target || event.srcElement
                        var inps = document.getElementsByTagName('input');
                        for(var f = 0; f<inps.length; f++)
                        {
                            if(inps[f].type=="checkbox" && inps[f].className==template.id)
                            {
                                inps[f].checked = template.checked;
                            }
                        }
                        recalculate_code();
                    };
                }

                // Обработка опций
                for(i = 0; i < donbot_options.length; i = i+1)
                {
                    document.getElementById("donbot_" + donbot_options[i]).onchange = function(event){
                        recalculate_code();
                    };
                }

                // Обработка выбора тега
                document.getElementById("donbot_tag").onchange = function(event){
                    recalculate_code();
                };

                // Опция "выделить все"
                document.getElementById("donbot_all").onchange = function(event){
                    event = event || window.event
                    var option = event.target || event.srcElement;

                    for(i = 0; i < donbot_options.length; i = i+1)
                    {
                        document.getElementById("donbot_" + donbot_options[i]).checked = option.checked;
                    }
                    recalculate_code();
                };

                // Выделение про установке курсора
                document.getElementById("donbot_code").onfocus = function(event){
                    event = event || window.event
                    var code = event.target || event.srcElement;
                    code.select();
                };

                // Пересчёт исходного кода
                function recalculate_code()
                {
                    var tag = document.getElementById('donbot_tag').value;
                    var pages = [];

                    document.getElementById("donbot_code").value = "{include file='engine/modules/donbot.php?tag="+tag+"&pages=";

                    for(var i = 0; i < donbot_options.length; i = i+1)
                    {
                        if(document.getElementById("donbot_" + donbot_options[i]).checked)
                        {
                            pages[pages.length] = document.getElementById("donbot_" + donbot_options[i]).name;
                        }
                    }

                    document.getElementById("donbot_code").value = document.getElementById("donbot_code").value + pages.join(',') + "'}";
                }
            </script>
<?php

        // Отображение подвала админского интерфейса
        echofooter();

?>