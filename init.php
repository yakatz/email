<?php

$charset = Kohana::$charset;

Swift::init(function () use ($charset) {
	// Set the default character set for everything
	Swift_Preferences::getInstance()->setCharset($charset);
});
