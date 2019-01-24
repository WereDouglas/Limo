<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<h1 class="mb--1"><span class="badge badge-pill badge-danger"> <span class="alert-icon"><i class="ni ni-bell-55"></i></span><?= $message ?></span> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button></h1>
