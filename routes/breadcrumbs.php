<?php
/**
 * Created by PhpStorm.
 * User: Masiur
 * Date: 11/8/17
 * Time: 6:18 PM
 */
// first argument must be route name
#Dashboard
Breadcrumbs::register('dashboard.main', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard.main'));
});
#Dashboard / My Profile
Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.main');
    $breadcrumbs->push('My Profile', route('profile'));
});
#Dashboard / My Profile / Change Avatar
Breadcrumbs::register('profile.pic.change', function ($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('Change Avatar', route('profile.pic.change'));
});
#Dashboard / My Profile / Change Password
Breadcrumbs::register('profile.password.reset', function ($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('Change Password', route('profile.password.reset'));
});