<?php

// Home
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard'));
});

// Home > Letter of Credit
Breadcrumbs::register('letter_of_credit_bc', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Letter of Credit', route('getLetterOfCreditPage'));
});

/*
 *  Administration Module
 */

Breadcrumbs::register('role_list', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Role List', route('role.create'));
});

Breadcrumbs::register('role_permission', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Add Role Permission', route('permission.index'));
});

Breadcrumbs::register('user_list', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('User List', route('user-registration.index'));
});