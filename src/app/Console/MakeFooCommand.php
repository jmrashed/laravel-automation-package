<?php

namespace Jmrashed\Automation\App\Console;

use Illuminate\Console\GeneratorCommand;

class MakeFooCommand extends GeneratorCommand
{
    protected $name = 'make:foo';

    protected $description = 'Create a new foo class';

    protected $type = 'Foo';

    protected function getStub()
    {
        return __DIR__ . '/stubs/foo.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Foo';
    }

    public function handle()
    {
        parent::handle();

        $this->doOtherOperations();
    }

    protected function doOtherOperations()
    {
        // Get the fully qualified class name (FQN)
        $class = $this->qualifyClass($this->getNameInput());

        // get the destination path, based on the default namespace
        $path = $this->getPath($class);

        $content = file_get_contents($path);

        // Update the file content with additional data (regular expressions)

        file_put_contents($path, $content);
    }
}
