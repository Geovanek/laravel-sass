<?php

declare(strict_types = 1);

use App\Brain\Auth\Processes\AuthProcess;
use App\Brain\Auth\Tasks\Generate2FaCode;
use App\Brain\Auth\Tasks\Login;
use App\Brain\Auth\Tasks\LogLogin;

it('check if auth process has all the tasks', function (): void {
    $process = new AuthProcess([]);

    expect($process->getTasks())
        ->toBe([
            Login::class,
            LogLogin::class,
            Generate2FaCode::class,
        ]);
});
