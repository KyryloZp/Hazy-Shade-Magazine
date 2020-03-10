<?php
/* Smarty version 3.1.33, created on 2019-07-31 09:56:48
  from 'W:\domains\magazine\views\default\edit-account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d413bb0097c84_14302962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e184c393a717071c69fcb889674f77f7af4819d9' => 
    array (
      0 => 'W:\\domains\\magazine\\views\\default\\edit-account.tpl',
      1 => 1564555950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d413bb0097c84_14302962 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="registr container">
    <div class="registr_title">
        <h1 class="h1">Edit your account</h1>
    </div>
    <div class="registr_content">
        <form class="registr_form">
            <div class="registr_form-content"><label class="registr_form-label" for="first-name">First name</label><input class="registr_form-input" type="text" name="first-name" id="first-name" required="required" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['name'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="last-name">Last name</label><input class="registr_form-input" type="text" name="last-name" id="last-name" required="required" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['second-name'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="company-name">company name <span class="registr_form-span">(optional)</span></label><input class="registr_form-input" type="text" name="company-name" id="company-name" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['company-name'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="nip">NIP<span class="registr_form-span">(optional)</span></label><input class="registr_form-input" type="text" name="nip" id="nip" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['nip'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="adress">address</label><input class="registr_form-input" type="text" name="adress" id="adress" required="required" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['adress'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="city">city</label><input class="registr_form-input" type="text" name="city" id="city" required="required" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['city'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="zip-code">zip code</label><input class="registr_form-input" type="text" name="zip-code" id="zip-code" required="required" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['zip-code'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="country">country</label><select name="country" id="country" data-value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['country'];?>
">
                <option value="Россия">Польша</option>
                <option value="Украина">Украина </option>
                <option value="Беларусь">Беларусь</option>
            </select></div>
            <div class="registr_form-content"><label class="registr_form-label" for="phone">Phone-number</label><input class="registr_form-input" type="text" name="phone" id="phone" required="required" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['phone'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="email">e-mail</label><input class="registr_form-input" type="text" name="email" id="email" required="required" value="<?php echo $_smarty_tpl->tpl_vars['rsUser']->value['email'];?>
" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="pwd">New password</label><input class="registr_form-input" type="password" name="pwd" id="pwd" required="required" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="confirm-pwd">Confirm new password</label><input class="registr_form-input" type="password" name="confirm-pwd" id="confirm-pwd" required="required" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="old-pwd">Your old password</label><input class="registr_form-input" type="text" name="old-pwd" id="old-pwd" required="required" value="" /></div>
        </form>
        <div class="registr_button"><button class="button_registration button_main" onclick="updateUserData(); return false;">Save</button></div>
    </div>
</section><?php }
}
