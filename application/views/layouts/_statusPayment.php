<?php
if ($status_code == '201') {
    $badge_status       = 'bg-warning text-dark';
    $status             = 'Pending';
}

if ($status_code == '200') {
    $badge_status       = 'bg-success';
    $status             = 'Success';
}
if ($status_code == '204') {
    $badge_status       = 'bg-danger';
    $status             = 'Failure';
}


?>

<?php if ($status_code) : ?>
    <span class="badge p-2 <?= $badge_status ?>"><?= $status ?></span>
<?php endif ?>