<?php
// in config/app_form.php
return [
    'input' => '<div class="form-group"><input type="{{type}}" name="{{name}}" class="form-control form-control-alternative"{{attrs}}/></div> ',
    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary mt-4"{{attrs}}/>',
    'submitContainer' => ' <div class="text-center">{{content}}</div>',
    'select' => '<div class="form-group" ><select name="{{name}}" class="form-control form-control-alternative"{{attrs}}>{{content}}</select></div> ',
    'number' => ' <li class="page-item"> <a class="page-link" href="{{url}}"><span class="sr-only">{{text}}</span>{{text}}</a></li>',
    'prev' => '<li class="page-item disabled">
      <a class="page-link " href="{{url}}" tabindex="-1">
        <i class="fa fa-angle-left"></i>
        <span class="sr-only word1">{{text}}</span>
      </a>
    </li>',
    'next' => ' <li class="page-item">
      <a class="page-link " href="{{url}}">
        <i class="fa fa-angle-right"></i>
        <span class="sr-only word1">{{text}}</span>
      </a>
    </li>',
    'first' => '<li class="page-item active">
      <a class="page-link" href="{{url}}">{{text}}<span class="sr-only word1">{{text}}</span></a>
    </li>',
    'last' => '<li class="page-item active">
      <a class="page-link" href="{{url}}">{{text}}<span class="sr-only word1">{{text}}</span></a>
    </li>',
    'current' => '<li class="page-item active">
      <a class="page-link" href="{{url}}">{{text}}<span class="sr-only word1">{{text}}</span></a>
    </li> ',
    'nextActive' => '<li class="page-item active">
      <a class="page-link" href="{{url}}">{{text}}<span class="sr-only word1">{{text}}</span></a>
    </li>',
    'prevActive' => '<li class="page-item active">
      <a class="page-link" href="{{url}}">{{text}}<span class="sr-only word1">{{text}}</span></a>
    </li>',
    'nextDisabled' => '<li class="page-item active">
      <a class="page-link" href="{{url}}">{{text}}<span class="sr-only word1">{{text}}</span></a>
    </li>',
     'prevDisabled' => '<li class="page-item active">
      <a class="page-link" href="{{url}}">{{text}}<span class="sr-only word1">{{text}}</span></a>
    </li>'

];


/**
 * <div class="form-group">
 * <label class="form-control-label" for="input-last-name">Last name</label>
 * <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
 * </div>
 **/
?>
