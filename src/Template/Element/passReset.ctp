<a href="#" class="btn btn-sm btn-outline-danger " data-toggle="modal"
   data-target="#modal-notification">
    <i class="ni ni-lock-circle-open text-red"></i>
    <span>Reset</span>
</a>
<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
     aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <div class="dropdown-divider"></div>
                <h5 class="modal-title" id="exampleModalLabel">
                    Update <?= $user->full_name ?> 's password</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-lock-circle-open ni-3x"></i>
                    <?php echo $this->Form->create('users', array(
                        'inputDefaults' => array(
                            'div' => 'form-group',
                            'label' => false,
                            'wrapInput' => false,
                            'class' => 'form-control',
                            'role' => 'form'
                        )
                    ));
                    ?>
                    <input class="form-control" type="hidden" value="<?= $user->id ?>"
                           name="id"/>
                    <br>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" placeholder="Password"
                                   type="password"
                                   value="<?= $user->contact ?>" name="password"/>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="Submit" class="btn btn-primary my-4">Reset
                        </button>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-white ml-auto"
                        data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>


