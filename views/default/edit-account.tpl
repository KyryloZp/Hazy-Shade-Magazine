<section class="registr container">
    <div class="registr_title">
        <h1 class="h1">Edit your account</h1>
    </div>
    <div class="registr_content">
        <form class="registr_form">
            <div class="registr_form-content"><label class="registr_form-label" for="first-name">First name</label><input class="registr_form-input" type="text" name="first-name" id="first-name" required="required" value="{$rsUser['name']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="last-name">Last name</label><input class="registr_form-input" type="text" name="last-name" id="last-name" required="required" value="{$rsUser['second-name']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="company-name">company name <span class="registr_form-span">(optional)</span></label><input class="registr_form-input" type="text" name="company-name" id="company-name" value="{$rsUser['company-name']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="nip">NIP<span class="registr_form-span">(optional)</span></label><input class="registr_form-input" type="text" name="nip" id="nip" value="{$rsUser['nip']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="adress">address</label><input class="registr_form-input" type="text" name="adress" id="adress" required="required" value="{$rsUser['adress']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="city">city</label><input class="registr_form-input" type="text" name="city" id="city" required="required" value="{$rsUser['city']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="zip-code">zip code</label><input class="registr_form-input" type="text" name="zip-code" id="zip-code" required="required" value="{$rsUser['zip-code']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="country">country</label><select name="country" id="country" data-value="{$rsUser['country']}">
                <option value="Россия">Польша</option>
                <option value="Украина">Украина </option>
                <option value="Беларусь">Беларусь</option>
            </select></div>
            <div class="registr_form-content"><label class="registr_form-label" for="phone">Phone-number</label><input class="registr_form-input" type="text" name="phone" id="phone" required="required" value="{$rsUser['phone']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="email">e-mail</label><input class="registr_form-input" type="text" name="email" id="email" required="required" value="{$rsUser['email']}" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="pwd">New password</label><input class="registr_form-input" type="password" name="pwd" id="pwd" required="required" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="confirm-pwd">Confirm new password</label><input class="registr_form-input" type="password" name="confirm-pwd" id="confirm-pwd" required="required" /></div>
            <div class="registr_form-content"><label class="registr_form-label" for="old-pwd">Your old password</label><input class="registr_form-input" type="text" name="old-pwd" id="old-pwd" required="required" value="" /></div>
        </form>
        <div class="registr_button"><button class="button_registration button_main" onclick="updateUserData(); return false;">Save</button></div>
    </div>
</section>