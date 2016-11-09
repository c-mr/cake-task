<div class="columns">
    <h3>Staff List</h3>
    <div><a class="button blue" href="staff/add/">New Entry</a></div>
    <table class="sortable" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>Staff No.</th>
            <th>Name</th>
            <th>Department</th>
            <th>Gender</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($staffs as $staff): ?>
        <tr>
            <td><?= h(sprintf('%07d', $staff->staff_no)) ?></td>
            <td><?= h($staff->name) ?></td>
            <td><?= h($department[$staff->department]) ?></td>
            <td><?= h($gender[$staff->gender]) ?></td>
            <td><a href="staff/detail/<?=$staff->id?>">Detail</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>