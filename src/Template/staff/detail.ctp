<div class="columns">
    <div>
        <h3>Staff List</h3>
        <table>
        <tbody>
            <tr><th>Staff No.</th></tr>
            <tr><td><?= h(sprintf('%07d', $staff->staff_no)) ?></td></tr>
            <tr><th>Name</th></tr>
            <tr><td><?= h($staff->name) ?></td></tr>
            <tr><th>Department</th></tr>
            <tr><td><?= h($department[$staff->department]) ?></td></tr>
            <tr><th>Sex</th></tr>
            <tr><td><?= h($sex[$staff->sex]) ?></td></tr>
        </tbody>
        </table>
        <!-- 編集画面へ -->
        <div><a class="button blue" href="../edit/<?=$staff->id?>">Edit</a></div>
        <!-- 登録削除 -->
        <div>
        <?= $this->Form->create($staff,[ 'type' => 'post', 'url' => ['controller' => 'Staff', 'action' => 'delete'] ] ) ?>
        <?= $this->Form->button('Delete') ?>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>