<?php

function canDisplayLink($userRole, $allowedRoles)
{
    return in_array($userRole, $allowedRoles);
}