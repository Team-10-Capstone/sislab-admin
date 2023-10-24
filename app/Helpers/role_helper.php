<?php

function canDisplayLink($userRole, $allowedRoles)
{
    return in_array($userRole, $allowedRoles);
}

function getRoleName($role)
{
    switch ($role) {
        case 0:
            return 'Superuser';
        case 1:
            return 'Manajer Teknis';
        case 2:
            return 'Penyelia';
        case 3:
            return 'Analis';
        default:
            return 'Petugas Lab';

    }
}