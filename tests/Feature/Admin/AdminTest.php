<?php

use App\Models\Admin;

beforeEach(function () {
    $this->seed();
    $this->admin = [
        'email' => 'admin2@admin.com',
        'password' => 'admin'
    ];
});

test('admin login form can be rendered', function () {
    $response = $this->get(route('admin.loginForm'));
    $response->assertOk();
    $response->assertViewIs('admin.loginForm');
})->group('admin', 'admin-login-form');

test('admin login form can be submitted', function () {
    $response = $this->post(route('admin.login'), [
        'email' => 'admin@admin.com',
        'password' => 'admin',
    ]);
    $response->assertFound();
    $response->assertRedirect(route('admin.dashboard'));
})->group('admin', 'admin-login-form');

test('admin dashboard can be rendered', function () {
    $response = $this->actingAs(Admin::first(), 'admin')->get(route('admin.dashboard'));
    $response->assertOk();
    $response->assertViewIs('admin.dashboard');
})->group('admin', 'admin-dashboard');

test('admin can logout', function () {
    $response = $this->actingAs(Admin::first(), 'admin')->post(route('admin.logout'));
    $response->assertFound();
    $response->assertRedirect(route('admin.loginForm'));
})->group('admin', 'admin-logout');

test('redirect to dashboard if already logged in', function () {
    $response = $this->actingAs(Admin::first(), 'admin')->get(route('admin'));
    $response->assertFound();
    $response->assertRedirect(route('admin.dashboard'));
})->group('admin', 'admin-login-form');

test('admin redirect to login form if not logged in', function () {
    $response = $this->get(route('admin.dashboard'));
    $response->assertFound();
    $response->assertRedirect(route('admin'));
})->group('admin', 'admin-dashboard');

test('cannot login with invalid credentials', function () {
    $response = $this->post(route('admin.login'), [
        'email' => 'admin@admin.com',
        'password' => 'invalid',
    ]);
    $response->assertFound();
    $response->assertRedirect(route('admin.loginForm'));
    $response->assertSessionHasErrors('email');
})->group('admin', 'admin-login-form');

test('invalid credentials', function (array $credentials) {
    $this->admin = [...$this->admin, ...$credentials];
    $response = $this->post(route('admin.login'), $this->admin);
    $response->assertRedirect(route('home'));
    $response->assertFound();
    $response->assertSessionHasErrors([...array_keys($credentials)]);
})->with(
    [
        'Empty email' => [['email' => '']],
        'Empty password' => [['password' => '']],
        'Invalid email' => [['email' => 'invalid']],
        'Invalid email and password' => [['email' => 'invalid', 'password' => '']],
    ]
)->group('admin', 'admin-login-form', 'dataset');
