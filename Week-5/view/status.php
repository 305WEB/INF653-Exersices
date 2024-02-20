<?php
$created = filter_input(INPUT_GET, 'created', FILTER_VALIDATE_INT);
$updated = filter_input(INPUT_GET, 'updated', FILTER_VALIDATE_INT);
$deleted = filter_input(INPUT_GET, 'deleted', FILTER_VALIDATE_INT);

if ($created) {
    echo "New city record added.";
}
if ($updated) {
    echo "City record updated.";
}
if ($deleted) {
    echo "City record deleted.";
}





?>