<?php
/* Smarty version 3.1.33, created on 2019-08-08 17:03:15
  from 'W:\domains\magazine\views\default\account-create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4c2ba31e74f1_34430353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9480b9fab1b60d74ff02bbee4d8fd42024fb6f7e' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\default\\account-create.tpl',
      1 => 1565272993,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4c2ba31e74f1_34430353 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="registr container">
    <div class="registr_title">
        <h1 class="h1"><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>
    </div>
    <div class="registr_content">
                <form class="registr_form">
                    <div class="registr_form-content"><label class="registr_form-label" for="first-name">First name</label><input class="registr_form-input" type="text" name="First-name" id="first-name" required="required" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="fast-name">Last name</label><input class="registr_form-input" type="text" name="Last-name" id="last-name" required="required" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="company-name">company name <span class="registr_form-span">(optional)</span></label><input class="registr_form-input" type="text" name="company-name" id="company-name" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="nip">NIP<span class="registr_form-span">(optional)</span></label><input class="registr_form-input" type="text" name="nip" id="nip" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="adress">address</label><input class="registr_form-input" type="text" name="adress" id="adress" required="required" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="city">city</label><input class="registr_form-input" type="text" name="city" id="city" required="required" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="zip-code">zip code</label><input class="registr_form-input" type="text" name="zip-code" id="zip-code" required="required" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="country">country</label><select name="country" id="country">
                            <option value="Россия">Россия</option>
                            <option value="Украина" selected>Украина </option>
                            <option value="Беларусь">Беларусь</option>
                        </select></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="phone-number">Phone-number</label><input class="registr_form-input" type="text" name="phone-number" id="phone" required="required" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="email">e-mail</label><input class="registr_form-input" type="text" name="email" id="email" required="required" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="pwd">password</label><input class="registr_form-input" type="password" name="pwd" id="pwd" required="required" /></div>
                    <div class="registr_form-content"><label class="registr_form-label" for="confirm-pwd">confirm-password</label><input class="registr_form-input" type="password" name="confirm-pwd" id="confirm-pwd" required="required" /></div>
                </form>
        <div class="registr_button"><button class="button_registration button_main" onclick="registerNewUser(); return false;">Registration</button></div>
    </div>
</section><?php }
}
