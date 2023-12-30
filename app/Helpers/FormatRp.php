
<?php
function formatToRupiah($value)
{
    return 'Rp ' . number_format($value, 0, ',', '.');
}
