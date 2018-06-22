<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function setUp()
    {
        if (! $this->app) {
            $this->refreshApplication();
        }
    }

    protected function getPackageProviders($app)
    {
        return [\Toonday\BulkSMSNigeria\BulkSMSNigeriaServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $config = array_merge(
            require __DIR__."/../config/bulksmsnigeria.php",
            require __DIR__."/../config/base_config.php"
        );

        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
