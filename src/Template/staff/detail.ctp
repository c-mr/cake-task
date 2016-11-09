<div class="container theme-showcase">
    <div>
        <div class="page-header">
            <h3>Staff Detail</h3>
        </div>
        <table class="table">
        <tbody>
            <tr><th>Staff No.</th></tr>
            <tr><td><?= h(sprintf('%07d', $staff->staff_no)) ?></td></tr>
            <tr><th>Name</th></tr>
            <tr><td><?= h($staff->name) ?></td></tr>
            <tr><th>Department</th></tr>
            <tr><td><?= h($department[$staff->department]) ?></td></tr>
            <tr><th>Gender</th></tr>
            <tr><td><?= h($gender[$staff->gender]) ?></td></tr>
        </tbody>
        </table>
        <!-- 編集画面へ -->
        <p><a class="btn btn-primary" href="../edit/<?=$staff->id?>">Edit</a></p>
        <!-- 登録削除 -->
        <div>
        <?= $this->Form->create($staff,[ 'type' => 'post', 'url' => ['controller' => 'Staff', 'action' => 'delete'] ] ) ?>
        <?= $this->Form->button('Delete', ['class' => 'btn btn-danger']) ?>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>