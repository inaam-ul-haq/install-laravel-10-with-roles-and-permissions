<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class IuhCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'class {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating model, controller, migration, request, service classes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $className = $this->argument('name');
        $migration = Str::lower($className) . "s";
        $controllerName = $className . 'Controller';
        // $controllerNameSpace = 'App\Http\Controllers';
        $requestClassName = $className . 'Request';
        $serviceClassName = $className . 'Service';

        $stubPath = base_path('stubs/controller.plain.stub');  // Replace with the actual path to your stub file
        $stub = file_get_contents($stubPath);

        // Replace the placeholders in the stub with the desired values
        $stub = str_replace('{{ class }}', $controllerName, $stub);
        // $stub = str_replace('{{ namespace }}', $controllerNameSpace, $stub);
        $stub = str_replace('{{RequestValidation}}', $requestClassName, $stub);
        $stub = str_replace('{{ServiceName}}', $serviceClassName, $stub);

        // creating laravel model, migrations, form request, controller classes
        $this->call('make:model', ['name' => $className]);
        $this->call('make:migration', ['name' => 'create_' . $migration . '_table']);
        $this->call('make:request', ['name' => $requestClassName]);
        $this->call('make:controller', ['name' => $controllerName]);

        $newControllerPath = app_path("Http/Controllers/{$controllerName}.php");

        // Write the modified stub to the new controller file
        file_put_contents($newControllerPath, $stub);

        $classPath = app_path("Services/{$serviceClassName}.php");
        // dd($classPath);
        if (File::exists($classPath)) {
            $this->error("The class {$className} already exists!");
            return;
        } else {
            $serviceDirectory = app_path("Services");
            // Check if the directory already exists.
            if (!File::exists($serviceDirectory)) {
                // Create the directory.
                File::makeDirectory($serviceDirectory);
            }

            $serviceStubPath = base_path('stubs/service.stub');
            $serviceStubContent = file_get_contents($serviceStubPath);

            $serviceStubContent = str_replace('{{modelName}}', $className, $serviceStubContent);
            $serviceStubContent = str_replace('{{ serviceClass }}', $serviceClassName, $serviceStubContent);

            // File::put($classPath, '');
            file_put_contents($classPath, $serviceStubContent);
        }

        $this->info("Custom class {$className} generated successfully!");
    }
}
