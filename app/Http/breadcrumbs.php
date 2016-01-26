<?php


// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('company', function($breadcrumbs, $company)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($company->name, route('companies.show', $company->id));
});

Breadcrumbs::register('keywordsPlan', function($breadcrumbs, $keywordsPlan)
{
    $breadcrumbs->parent('company', $keywordsPlan->company);
    $breadcrumbs->push('Keywords Plan');
});
