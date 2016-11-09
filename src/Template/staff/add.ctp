<div class="columns">
    <div class="row">
        <h3>Staff Register</h3>
        <?= $this->Form->create(null, [ 'type' => 'post', 'url' => ['controller' => 'Staff', 'action' => 'add'] ] ) ?>
            <table class="">
                <tbody>
                    <?php
                    if (isset($errors)) {
                        echo "<tr><td>";
                        foreach ($errors as $keys => $error) {
                            foreach ($error as $key => $value) {
                                echo $keys." ： ".$value."<br />";
                            }
                        }
                        echo "</td></tr>";
                    }
                    ?>
                    <tr>
                        <td><?= $this->Form->input('staff_no', ['type' => 'text' ]); ?></td>
                    </tr>
                    <tr>
                        <td><?= $this->Form->input('name', ['type' => 'text' ]); ?></td>
                    </tr>
                    <tr>
                        <td><?= $this->Form->input('department', ['type' => 'select', 'options' => ['' => 'Select']+$department ]); ?></td>
                    </tr>
                    <tr>
                        <td><?= $this->Form->input('sex',['type' => 'radio', 'options' => $sex ]); ?></td>
                    </tr>
                    <tr>
                        <td><?= $this->Form->submit('Save') ?></td>
                    </tr>
                </tbody>
            </table>
        <?= $this->Form->end() ?>
    </div>
</div>