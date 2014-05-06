<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Description" lang="pt-br" content="" />
		<meta name="keywords" lang="pt-br" content="" />
		<meta property="og:title" content="GL events"/>
		<meta property="og:url" content="http://www.gleventsbrasil.com.br/"/>
		<meta property="og:image" content="http://www.gleventsbrasil.com.br/imagens/"/>
		<meta property="og:site_name" content="PORTAL GL"/>
		<meta property="og:description" content=""/>
		<link href="PORTAL%20GL.html" rel="publisher" />
		<link rel="shortcut icon" href="#" type="image/x-icon" /> 
		<link href="#" rel="apple-touch-icon" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta name="distribution" content="Global" />
		<meta name="robots" content="index,follow" />
		<meta http-equiv="content-language" content="pt" />
		<meta name="DC.Title" content="GL events" />
		<meta name="DC.Description" content="" />
		<meta name="geo.placename" content="Brazil" />

		<!-- blueprint CSS framework -->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.steps.css" />

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>
		<div class="topo">
			<div class="content">
				<div class="logo_topo">
					<a href="http://www.gleventsbrasil.com.br/"><img src='imagens/logo_glevents.png' alt='GL Events' title='GL Events' class='gl' /></a>
				</div>    

				<div id="menuPrincipal">
					<?php
					$this->widget('bootstrap.widgets.TbMenu', array(
						'type' => 'pills',
						'items' => array(
							array(
								'label' => Yii::t('site', 'Cadastro'),
								'url' => '#',
								'visible' => Yii::app()->getModule('user')->isAdmin(),
								'itemOptions' => array('class' => 'cada_item'),
								'items' => array(
									array('label' => Yii::t('site', 'Cliente'), 'url' => array('/cliente/index')),
									array('label' => Yii::t('site', 'Evento'), 'url' => array('/evento/index')),
									array('label' => Yii::t('site', 'Segmento'), 'url' => array('/segmento/index')),
									array('label' => Yii::t('site', 'Prestadoras'), 'url' => array('/prestadora/index')),
									array('label' => Yii::t('site', 'Pesquisa'), 'url' => array('/pesquisa/index')),
								),
							),
							array(
								'label' => Yii::t('site', 'Sistema'),
								'url' => '#',
								'visible' => Yii::app()->getModule('user')->isAdmin(),
								'itemOptions' => array('class' => 'cada_item'),
								'items' => array(
									array('label' => Yii::t('site', 'Gerenciar usuários'), 'url' => array('/user/admin')),
									array('url' => Yii::app()->getModule('user')->profileUrl, 'label' => Yii::t('site', 'Seu perfil'), 'visible' => !Yii::app()->user->isGuest),
								),
							),
							array('url' => Yii::app()->getModule('user')->logoutUrl, 'label' => Yii::app()->getModule('user')->t("Logout") . ' (' . Yii::app()->user->name . ')', 'visible' => !Yii::app()->user->isGuest, 'itemOptions' => array('class' => 'cada_item'),),
						),
					));
					?>
				</div>

			</div>
		</div>
		<div class="miolo">
			<div class="container" id="page">
				<div class="pagina">

					<div id="mainmenu">

					</div><!-- mainmenu -->
					<?php if (isset($this->breadcrumbs)): ?>
						<?php
						$this->widget('zii.widgets.CBreadcrumbs', array(
							'links' => $this->breadcrumbs,
						));
						?><!-- breadcrumbs -->
					<?php endif ?>

					<div id="mainContent">
						<?php echo $content; ?>
					</div>

					<div class="clear"></div>
				</div>
			</div><!-- page -->

		</div>

		<div class="rodape">
			<div class="content">
				<div class="logo_rodape">
					<img src="imagens/logo_glevents.png" alt="#" title="#" />
				</div>
				<div class="endereco">
					<b>Endereço</b><br />
					Av. Salvador Allende, 6.555  Brasil<br />
					Barra da Tijuca   Rio de Janeiro  RJ<br />
					Tel: 3035-9100 
				</div>
				<div class="menu_rodape">
					<ul>

						<li><a href="http://www.gleventsbrasil.com.br/canal/?gl-events/">GL events</a></li>

						<li><a href="http://www.gleventsbrasil.com.br/canal/?live/">Live</a></li>

						<li><a href="http://www.gleventsbrasil.com.br/canal/?exhibitions/">Exhibitions</a></li>

						<li><a href="http://www.gleventsbrasil.com.br/canal/?venues/">Venues</a></li>

						<li><a href="http://www.gleventsbrasil.com.br/canal/?hospitality/">Hospitality</a></li>

						<li><a href="http://www.gleventsbrasil.com.br/canal/?imprensa/">Imprensa</a></li>

						<li><a href="http://www.gleventsbrasil.com.br/contato/">Contato</a></li>

					</ul>
				</div>
				<div class="assinatura">
					Desenvolvido por: OnzeHost
				</div>
			</div>
		</div>

	</body>
</html>
