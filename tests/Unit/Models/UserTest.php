<?php

declare(strict_types = 1);

use App\Models\User;

test('casts', function (): void {
    # preciso usar reflection classe para ter acesso ao metodo
    $user = new User();

    $method = new ReflectionMethod(
        objectOrMethod: $user,
        method: 'casts'
    );

    $method->setAccessible(accessible: true);

    $casts = $method->invoke(object: $user);

    expect($casts)->toBe([
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ]);
});
