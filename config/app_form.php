<?php
// in config/app_form.php
return [
    'input' => '<div class="form-group"><input type="{{type}}" name="{{name}}" class="form-control form-control-alternative"{{attrs}}/></div> ',
    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary mt-4"{{attrs}}/>',
    'submitContainer' => ' <div class="text-center">{{content}}</div>',
    'select' => '<div class="form-group" ><select name="{{name}}" class="form-control form-control-alternative"{{attrs}}>{{content}}</select></div> ',

];


/**
 * <div class="form-group">
 * <label class="form-control-label" for="input-last-name">Last name</label>
 * <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
 * </div>
 **/
?>
