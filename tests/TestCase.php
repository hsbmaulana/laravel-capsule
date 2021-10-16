<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $application = require __DIR__ . '/../bootstrap/app.php'; $application->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $application;
    }

    /**
     * @param string $title
     * @param mixed $data
     * @return void
     */
    protected function explore($title, $data)
    {
        $this->expectNotToPerformAssertions();

        fwrite(STDOUT, "(" . $title . ")" . "\n" . var_export($data, true) . "\n\n");
    }
}