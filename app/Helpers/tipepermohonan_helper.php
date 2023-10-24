<?php


function getPpkTipePermohonan($kd_kegiatan, $kd_mks)
{
    if ($kd_kegiatan == 'E') {
        echo 'Eksport';
    } elseif ($kd_kegiatan == 'I') {
        echo 'Import';
    } elseif ($kd_kegiatan == 'K') {
        echo 'Domestik keluar';
    } elseif ($kd_kegiatan == 'M') {
        echo 'Domestik masuk';
    } elseif ($kd_kegiatan == 'N' && $kd_mks == 16) {
        echo 'Mandiri';
    } elseif ($kd_kegiatan == 'N' && $kd_mks == 21) {
        echo 'Surveilance';
    } else {
        echo 'Lainnya';
    }
}

function convertPpkTipeToFppcTipe($kd_kegiatan, $kd_mks)
{
    if ($kd_kegiatan == 'E') {
        return 'lalulintas';
    } elseif ($kd_kegiatan == 'I') {
        return 'lalulintas';
    } elseif ($kd_kegiatan == 'K') {
        return 'lalulintas';
    } elseif ($kd_kegiatan == 'M') {
        return 'lalulintas';
    } elseif ($kd_kegiatan == 'N' && $kd_mks == 16) {
        return 'mandiri';
    } elseif ($kd_kegiatan == 'N' && $kd_mks == 21) {
        return 'monsur';
    } else {
        return null;
    }
}