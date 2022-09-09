<?php
//phpinfo();
?>

<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Форма подсчета средств, накопленных на будущее моей дочери Марии Прокофьевой">
	<meta name="keywords" content="банк, вклад, деньги, Мария, Прокофьева">
<!-- OpenGraph -->
	<meta property="og:locale" content="ru_RU" />
	<meta property="og:image" content="../img/cover.jpg" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="<?= url::getTitle(); ?>" />
	<meta property="og:title" content="<?= url::getTitle(); ?>" />
	<meta property="og:url" content="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];; ?>" />
	<meta property="og:description" content="Форма подсчета средств, накопленных на будущее моей дочери Марии Прокофьевой" />
<!-- OpenGraph -->
	<link rel="alternate" media="only screen and (max-width: 991px)" href="https://bank.blanet.ru" />
	<link rel="icon" href="../img/favicon.svg" sizes="any" type="image/svg+xml">
	<link rel="apple-touch-icon" href="../img/favicon.svg" type="image/svg+xml">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  	<link rel="stylesheet" href="../css/print.css"/>
	<link rel="stylesheet" href="../css/style.css?v=<?php echo rand(0, 9999); ?>"/>
	<link rel="canonical" href="https://bank.blanet.ru/" />
	<title><?= url::$title; ?></title>
<!-- Yandex.Metrika counter -->
<script>
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(89686765, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>
<!-- /Yandex.Metrika counter -->
</head>
<body>
<noscript><div><img src="https://mc.yandex.ru/watch/89686765" style="position:absolute; left:-9999px;" alt="*" /></div></noscript>