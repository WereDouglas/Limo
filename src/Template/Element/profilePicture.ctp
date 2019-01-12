<!-- Button trigger modal -->
<a href="#" class=" btn btn-sm  btn-outline-warning" data-toggle="modal" data-target="#exampleModal">
    <i class="ni ni-camera-compact text-gray"> </i>
    <span>Pic</span>
</a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update <?= $user->full_name ?>'s profile picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="avatar-group">
                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                       data-original-title="<?= h($user->name) ?>">
                        <img alt="Image placeholder" src="<?= $image; ?>" class="rounded-circle">
                    </a>
                </div>
                <?= $this->Form->create($user, ['type' => 'file']) ?>
                <input class="form-control" type="hidden" value="<?= $user->id ?>" name="id"/>
                <?php echo $this->Form->control('photo', ['type' => 'file', 'class' => 'form-control']); ?>
                <?= $this->Form->end() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



