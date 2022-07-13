<?php
function setFlash($tipe, $pesan)
{
    $_SESSION['flash'] = [
        'pesan' => $pesan,
        'tipe' => $tipe
    ];
}

function flash()
{
    if (isset($_SESSION['flash'])) {
        echo
            "<script>
            Swal.fire({
                icon: '" . $_SESSION['flash']['tipe'] . "',
                text: '" . $_SESSION['flash']['pesan'] . "',
                confirmButtonColor: '#1cc88a'
            })
       </script>";
        unset($_SESSION['flash']);
    }
}
