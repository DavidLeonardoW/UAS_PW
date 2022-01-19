<!-- Nama : David Leonardo W
NRP  : 1972017 -->
<div class="alert alert-primary">
Employee Attendance
</div>

<br>
<br>

<p><?php $_SESSION['session_id']?></p>

<p><?php $_SESSION['session_user']?></p>

<p><?php $_SESSION['session_role']?></p>

<table class="display" id="myTable" border="1">
    <thead>
    <tr>
        <th>Date</th>
        <th>First In Time</th>
        <th>Last Out Time</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if (!empty($result)){
        foreach ($result as $row) {

            echo '<tr>';
            echo '<td>' . $row->id . '</td>';
            echo '<td>' . $row->first_in_time . '</td>';
            echo '<td>' . $row->last_out_time . '</td>';
        }
        $link = null;

    } else {
        echo 'data not found';
    }

    ?>
    </tbody>
</table>

