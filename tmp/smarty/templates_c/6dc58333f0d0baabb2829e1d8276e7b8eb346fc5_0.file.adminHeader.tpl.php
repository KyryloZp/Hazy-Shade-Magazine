<?php
/* Smarty version 3.1.33, created on 2019-08-03 13:33:49
  from 'W:\domains\magazine\views\admin\adminHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d45630d2e6105_68775919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6dc58333f0d0baabb2829e1d8276e7b8eb346fc5' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\admin\\adminHeader.tpl',
      1 => 1564828427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftColumn.tpl' => 1,
  ),
),false)) {
function content_5d45630d2e6105_68775919 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" />
	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
lib/admin.js"><?php echo '</script'; ?>
>
</head>
<body>
	<section id='header'>
		<h1><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>
	</section>
	<?php $_smarty_tpl->_subTemplateRender('file:adminLeftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<section id="centerColumn"><?php }
}
