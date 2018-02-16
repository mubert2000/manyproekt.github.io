<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BEACH-INVEST</title> 
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>
	<script type="text/javascript" src="/js/js.js"></script>
	<script type="text/javascript" src="/js/scriptM.js"></script>
    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<script type="text/javascript" src="http://gostats.ru/js/counter.js"></script>
<script type="text/javascript">_gos='c4.gostats.ru';_goa=407459;
_got=5;_goi=1;_gol='анализ сайта';_GoStatsRun();</script>
<noscript><a target="_blank" title="анализ сайта" 
href="http://gostats.ru"><img alt="анализ сайта" 
src="http://c4.gostats.ru/bin/count/a_407459/t_5/i_1/counter.png" 
style="border-width:0" /></a></noscript>
</head>
<body class="splash">
    <div class="site">
        <div class="wrap">
            <header>
                <div class="header">
                    <div class="header_top cfix">
                        <a href="/" class="logo">BEACH-INVEST</a>
                        <div class="header_top_right">
                            <div class="htr_bottom cfix">
                            	<?PHP if(!isset($_SESSION['user_id'])) {  ?>
	                                <a href="/login" class="input">Войти</a>&nbsp;
	                                <a href="/register" class="input">Регистрация</a>&nbsp;
								<?PHP } else { ?>
									<a href="/account" class="input">В аккаунт</a>&nbsp;
	                                <a href="/account/exit" class="input">Выход</a>&nbsp;                                        
	                            <?PHP } ?>
                                <a href="http://vk.com" class="input">Группа ВКонтакте</a>
                                
                            </div>
                        </div>
                    </div>
                    <nav class="menuTop cfix">
                        <a href="/" class="active">Главная</a>
						<span></span>                                           
                        <a href="/news" class="">Новости</a>
                        <span></span>
                        <a href="/about" class="">О нас</a>
                        <span></span>
                        <a href="/otziv" class="">Отзывы</a>
                        <span></span>
                        <a href="/market" class="">Маркетинг</a>
                        <span></span>
                        <a href="/rules" class="">FAQ</a>
                    </nav>
                </div>
            </header>
           <section class="slider"><br>
                <div class="slider_title">BEACH-INVEST</div>
                <div class="slider_subtitle">МЕЧТЫ СБЫВАЮТСЯ</div>
                <a href="/register" class="button-blue" style="margin-right: 48px;">Зарегестрироваться</a>
                <a href="/login" class="button-blue" style="margin-right: 48px;">Авторизация </a>
            </section>
            </section>
            <?PHP if (isset($_GET["menu"]) OR strtolower($_GET["menu"]) == "account") { ?>
			<?PHP if(isset($_SESSION['user_id'])) {  ?>

			<section class="scontent">
			<div class="menu_bg">
			<div class="menu">
				<center><table><tr>
				<td style="width: 80px;"><a href="/account"><img src="/img/1.png"><br>Аккаунт</a></td>
				<td style="width: 100px;"><a href="/account/insert_qiwi"><img src="/img/2.png"><br>Пополнить</a></td>
				<td style="width: 90px;"><a href="/account/pay_qiwi"><img src="/img/3.png"><br>Вывести</a></td>
				<td style="width: 110px;"><a href="/account/deposits"><img src="/img/4.png"><br>Мои вклады</a></td>
				<td style="width: 100px;"><a href="/account/ref"><img src="/img/5.png"><br>Рефералы</a></td>
				<td style="width: 100px;"><a href="/account/sup"><img src="/img/6.png"><br>Поддержка</a></td>
				<td style="width: 10px;"><a href="/account/exit"><img src="/img/7.png"><br>Выход</a></td>
				</tr></table></center>
			</div>
			</div>

			<?PHP } } ?>

			<?PHP if (isset($_GET["menu"]) OR strtolower($_GET["menu"]) == "admin") { ?>
			<?PHP if (isset($_SESSION['admin'])) { ?>
			<? 
				$db->Query("SELECT * FROM db_insert WHERE status = 0");
				$kol_ins = $db->NumRows();
				$db->Query("SELECT * FROM db_vivod WHERE status = 0");
				$kol_vivod = $db->NumRows();
				$db->Query("SELECT * FROM db_sup WHERE status = 0");
				$kol_sup = $db->NumRows();
				$db->Query("SELECT * FROM db_otziv WHERE status = 0");
				$kol_otz = $db->NumRows();
			?>
			<div class="members">
			<h1 style="text-align:center;padding:40px 0 40px;">Админка</h1>
			<div class="links" style="margin-bottom:-40px;text-align:center;">
                <a href="/admin"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Статистика</span></a>
				<a href="/admin/insert"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Пополнения (<?=$kol_ins; ?>)</span></a>
				<a href="/admin/pay"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Выплаты (<?=$kol_vivod ; ?>)</span></a>
				<a href="/admin/users"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Пользователи </span></a>
				<a href="/admin/news"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Новости</span></a>
				<a href="/admin/fake"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Фейки</span></a>
				<a href="/admin/otziv"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Отзывы (<?=$kol_otz ; ?>)</span></a>
				<a href="/admin/sup"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Тех.Поддержка (<?=$kol_sup ; ?>)</span></a>
				<!-- <a href="/admin/opros"><span style="margin-bottom:7px;font-size:17px;" class="input baton mr">Опросы</span></a> -->
            </div>
			</div>
			<br>
			<?PHP } } ?>

			<?PHP if (!isset($_GET["menu"]) OR strtolower($_GET["menu"]) == "index") { ?>
			<?
				$db->Query("SELECT * FROM db_stats WHERE id = 1");
				$stats = $db->FetchArray();

				$db->Query("SELECT * FROM db_fake WHERE id = 1"); 
				$fake = $db->FetchArray();
				$ball = ($stats['popol'] + $fake['pay']) - ($stats['vivod']  + $fake['vivod']);
			?>
            <section class="statistic">
                <div class="statistic cfix">
                    <h1>
                        <span>БОНУС ЗА КАЖДОГО ПРИГЛАШЕННОГО АКТИВНОГО РЕФЕРАЛА +10%</span>
                        <div class="line"></div>
                    </h1>
                    <table cellpadding="0" width="100%" cellspacing="0" class="fgr6_stat">
                        <tbody>
                            <tr>
                                <td class="statistic_el_stat cfix">
                                    Пользователей:
                                    <span style="color:#96BC00;font-size:16px;padding-left:20px;"><?php echo $stats['user'] + $fake['user']; ?> ЧЕЛ.</span>
                                </td>
                                <td class="statistic_el_stat cfix">
                                    Пополнено:
                                    <span style="color:#96BC00;font-size:16px;padding-left:20px;"><?php echo $stats['popol'] + $fake['pay']; ?> РУБ.</span>
                                </td>
                                <td class="statistic_el_stat cfix">
                                    Баланс:
                                    <span style="color:#96BC00;font-size:16px;padding-left:20px;"><?php echo $ball; ?> РУБ.</span>
                                </td>
                                <td class="statistic_el_stat cfix">
                                    Выплачено:
                                    <span style="color:#96BC00;font-size:16px;padding-left:20px;"><?php echo $stats['vivod'] + $fake['vivod']; ?> РУБ.</span>
                                </td>
								<td class="statistic_el_stat cfix">
                                    Онлайн пользователи:
                                    <span style="color:#96BC00;font-size:16px;padding-left:20px;"><?php echo $kol_users_online ?> ЧЕЛ.</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                  <table align="center">
                        <tbody>
                            <tr>
                                <td style="vertical-align:top;">
                                    <div class="stats_1">
                                        <div class="statistic_el_titl cfix">
                                            <center>
                                                Последние вклады
                                            </center>
                                        </div>
										<? //$db->Query("SELECT * FROM db_deposit WHERE status = 0 ORDER BY id DESC LIMIT 10");
										$db->Query("SELECT * FROM db_deposit WHERE status = 0 ORDER BY id DESC LIMIT 10");
											while($a = $db->FetchArray()) { ?>
	                                        <div class="statistic_el cfix">
	                                            <?=$a['login']; ?>
	                                            <span><?=$a['summa']; ?></span>
	                                        </div>
                                        <? } ?>
                                    </div>
                                </td>
                                <td style="vertical-align:top;">
                                    <div class="stats_1">
                                        <div class="statistic_el_titl cfix">
                                            <center>
                                                Последние выплаты
                                            </center>
                                        </div>
										<? $db->Query("SELECT * FROM db_vivod WHERE status = 1 ORDER BY id DESC LIMIT 10");
											while($a = $db->FetchArray()) { ?>
	                                        <div class="statistic_el cfix">
	                                            <?=$a['login']; ?>
	                                            <span><?=$a['summa']; ?></span>
	                                        </div>
                                        <? } ?>
                                    </div>
                                </td>
                                <td style="vertical-align:top;">
                                    <div class="stats_1">
                                        <div class="statistic_el_titl cfix">
                                            <center>
                                                Топ рефералов
                                            </center>
                                        </div>
										<? $db->Query("SELECT * FROM db_users ORDER BY kol_ref DESC LIMIT 10");
											while($s = $db->FetchArray()) { ?>
	                                        <div class="statistic_el cfix">
	                                            <?=$s['login']; ?>
	                                            <span><?=$s['kol_ref']; ?></span>
	                                        </div>
                                        <? } ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clear"></div>
                </div>
            </section>
            <section class="plan">
                <div class="plan cfix">
                                        <div class="plan_el cfix">
                        <div class="plan_amount">
                            сумма инвестирования
                            <span>50 руб - 15.000 руб</span>
                        </div>
                        <a href="/register">
                            <div class="plan_title">Прибыль за 24 часа:</div>
                            <div class="plan_percent">50%</div>
                        </a>
                    </div>
                </div>
            </section>
            <section class="calc">
                <div class="calc cfix">
                    <form method="post" name="calc" onsubmit="recalc(); return false;">
                        <div class="calc_title">Калькулятор прибыли:</div>
                        <input name="sum" id="calc_sum" type="text" placeholder="СУММА" class="calc_input">
                        <div class="calc_percent"><span id="profit">?</span>%</div>
                        <img src="img/arrow.png" alt="" class="calc_arrow">
                        <div class="calc_result"><span id="prib2">?</span>РУБ</div>
                        <input name="calc_btn" id="calc_btn" value="" type="submit" class="button-green" style="display:none;">
                        <input name="__Cert" value="2bcc13f3" type="hidden">
                    </form>
                    <div style="display: none;">
                        <span id="plan">?</span>
                        <br>
                        <span id="bonus">?</span>
                        %
                        <br>
                        <span id="period">?</span>
                        <br>
                        <span id="days">?</span>
                        <br>
                        <span id="cmpd">0</span>
                        %
                        <br>
                        <span id="prib">?</span>
                        <br>
                        <span id="return">?</span>
                        %
                        <br>
                    </div>
                </div>
            </section>
            <section class="whyus">
                <h1>
                    <span>почему мы?</span>
                    <div class="line"></div>
                </h1>
                <div class="whyus_block cfix">
                    <div class="whyus_el stat">
                        <div class="whyus_el_title">Высокие процент!</div>
                        <div class="whyus_el_text">
                           Обеспечиваются опытом на рынке высокодоходных инвестиций.
                        </div>
                    </div>
                    <div class="whyus_el security" style="margin-right: 0;">
                        <div class="whyus_el_title">Безопасность</div>
                        <div class="whyus_el_text">
                            Наша команда сделала все, чтобы наше сотрудничество было максимально
                            <br>защищенным.</div>
                    </div>
                    <div class="whyus_el_line"></div>
                    <div class="whyus_el_line" style="float: right;"></div>
                    <div class="whyus_el money">
                        <div class="whyus_el_title">Автоматическое начисление</div>
                        <div class="whyus_el_text">
                            Вас приятно порадуют начисления уже по истечении первых суток.
                        </div>
                    </div>
                    <div class="whyus_el user" style="margin-right: 0;">
                        <div class="whyus_el_title">Быстрая тех. поддержка</div>
                        <div class="whyus_el_text">
                            Быстрая помощь наших тех. специалистов позволит Вам в кратчайшие сроки получить ответы на все ваши вопросы.
                        </div>
                    </div>
                </div>
            </section>
          
<?PHP } ?> <!-- end index page -->