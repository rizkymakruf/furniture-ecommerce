<?php
if ($status == 'pending') {
    $badge_status       = 'bg-warning text-light';
    $status             = 'Pending';
}

if ($status == 'process') {
    $badge_status       = 'bg-info';
    $status             = 'Diproses';
}

if ($status == 'delivered') {
    $badge_status       = 'bg-success';
    $status             = 'Dikirim';
}

if ($status == 'cancel') {
    $badge_status       = 'bg-danger';
    $status             = 'Dibatalkan';
}


?>

<?php if ($status) : ?>
    <span class="badge rounded-pill p-1 <?= $badge_status ?>"><?= $status ?></span>
<?php endif ?>