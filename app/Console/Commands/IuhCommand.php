<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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
        $migration = Str::plural(strtolower($className));
        $controllerName = $className . 'Controller';
        // $controllerNameSpace = 'App\Http\Controllers';
        $requestClassName = $className . 'Request';
        $serviceClassName = $className . 'Service';

        $this->create_php_classes($controllerName, $requestClassName, $serviceClassName, $migration, $className);
        $this->create_blade($migration, $className);
        // $this->create_components($migration, $className);

        $this->info("Custom class {$className} generated successfully!");
    }

    private function create_components($migration, $className)
    {
        $data = null;
        $rolesAllData = "";
        $rolesShowData = "";
        $rolesCreateData = "";
        $rolesEditData = "";
        $roles = Role::pluck('name')->all();
        foreach ($roles as $role) {
            // create component for all.blade.php
            $componentAllDirectory = ucfirst(strtolower($role)) . '/Pages/' . $className . '/All';
            $this->call('make:component', ['name' => $componentAllDirectory]);
            $rolesAllData .= "\t\t\t\t@hasrole('" . strtolower($role) . "')";
            $rolesAllData .= "<x-" . strtolower($role) . ".pages." . Str::kebab($className) . ".all :compoData='$data' />";
            $rolesAllData .= "@endhasrole\n\n";

            // create component for show.blade.php
            $componentShowDirectory = ucfirst(strtolower($role)) . '/Pages/' . $className . '/Show';
            $this->call('make:component', ['name' => $componentShowDirectory]);
            $rolesShowData .= "\t\t\t\t@hasrole('" . strtolower($role) . "')";
            $rolesShowData .= "<x-" . strtolower($role) . ".pages." . Str::kebab($className) . ".show :compoData='$data' />";
            $rolesShowData .= "@endhasrole\n\n";

            // create component for create.blade.php
            $componentCreateDirectory = ucfirst(strtolower($role)) . '/Pages/' . $className . '/Create';
            $this->call('make:component', ['name' => $componentCreateDirectory]);
            $rolesCreateData .= "\t\t\t\t@hasrole('" . strtolower($role) . "')";
            $rolesCreateData .= "<x-" . strtolower($role) . ".pages." . Str::kebab($className) . ".create />";
            $rolesCreateData .= "@endhasrole\n\n";

            // create component for edit.blade.php
            $componentEditDirectory = ucfirst(strtolower($role)) . '/Pages/' . $className . '/Edit';
            $this->call('make:component', ['name' => $componentEditDirectory]);
            $rolesEditData .= "\t\t\t\t@hasrole('" . strtolower($role) . "')";
            $rolesEditData .= "<x-" . strtolower($role) . ".pages." . Str::kebab($className) . ".edit :compoData='$data' />";
            $rolesEditData .= "@endhasrole\n\n";
        }

        $authViewPath = resource_path('views/auth/pages/' . $migration . '/');
        // create file for all.blade.php
        $viewAllStub = $authViewPath . 'all.blade.php';
        $viewAllStubContent = file_get_contents($viewAllStub);
        $viewAllStubContent = str_replace('{{rolesData}}', $rolesAllData, $viewAllStubContent);
        file_put_contents($viewAllStub, $viewAllStubContent);

        // create file for show.blade.php
        $viewShowStub = $authViewPath . 'show.blade.php';
        $viewShowStubContent = file_get_contents($viewShowStub);
        $viewShowStubContent = str_replace('{{rolesData}}', $rolesShowData, $viewShowStubContent);
        file_put_contents($viewShowStub, $viewShowStubContent);

        // create file for create.blade.php
        $viewCreateStub = $authViewPath . 'create.blade.php';
        $viewCreateStubContent = file_get_contents($viewCreateStub);
        $viewCreateStubContent = str_replace('{{rolesData}}', $rolesCreateData, $viewCreateStubContent);
        file_put_contents($viewCreateStub, $viewCreateStubContent);

        // create file for edit.blade.php
        $viewEditStub = $authViewPath . 'edit.blade.php';
        $viewEditStubContent = file_get_contents($viewEditStub);
        $viewEditStubContent = str_replace('{{rolesData}}', $rolesEditData, $viewEditStubContent);
        file_put_contents($viewEditStub, $viewEditStubContent);

        // dd($migration, $className, ucfirst(strtolower($role)), $componentAllDirectory, $componentViewDirectory);
    }

    private function create_php_classes($controllerName, $requestClassName, $serviceClassName, $migration, $className)
    {
        $stubPath = base_path('stubs/controller.plain.stub');  // Replace with the actual path to your stub file
        $stub = file_get_contents($stubPath);

        // Replace the placeholders in the stub with the desired values
        $stub = str_replace('{{ class }}', $controllerName, $stub);
        // $stub = str_replace('{{ namespace }}', $controllerNameSpace, $stub);
        $stub = str_replace('{{RequestValidation}}', $requestClassName, $stub);
        $stub = str_replace('{{ServiceName}}', $serviceClassName, $stub);
        $stub = str_replace('{{pagename}}', $migration, $stub);

        // creating laravel model, migrations, form request, controller classes
        $this->call('make:model', [
            'name' => $className,
            '--migration' => true, // Generate migration
            '--controller' => true, // Generate controller
        ]);
        $this->call('make:request', ['name' => $requestClassName]);

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

        return true;
    }

    private function create_blade($migration, $className)
    {
        $viewDirectory = resource_path('views/auth/pages/' . $migration);
        if (!File::exists($viewDirectory)) {
            // Create the directory.
            File::makeDirectory($viewDirectory);
        }

        // create file for all.blade.php
        $viewAllStub = base_path('stubs/all_blade.stub');
        $viewAllStubContent = file_get_contents($viewAllStub);
        $viewAllStubContent = str_replace('{{pageTitle}}', 'All ' . $className, $viewAllStubContent);
        file_put_contents($viewDirectory . '/all.blade.php', $viewAllStubContent);

        // create file for create.blade.php
        $viewCreateStub = base_path('stubs/create_blade.stub');
        $viewCreateStubContent = file_get_contents($viewCreateStub);
        $viewCreateStubContent = str_replace('{{pageTitle}}', 'Create ' . $className, $viewCreateStubContent);
        file_put_contents($viewDirectory . '/create.blade.php', $viewCreateStubContent);

        // create file for show.blade.php
        $viewshowStub = base_path('stubs/show_blade.stub');
        $viewshowStubContent = file_get_contents($viewshowStub);
        $viewshowStubContent = str_replace('{{pageTitle}}', $className . ' Detail', $viewshowStubContent);
        file_put_contents($viewDirectory . '/show.blade.php', $viewshowStubContent);

        // create file for edit.blade.php
        $vieweditStub = base_path('stubs/edit_blade.stub');
        $vieweditStubContent = file_get_contents($vieweditStub);
        $vieweditStubContent = str_replace('{{pageTitle}}', 'Update ' . $className, $vieweditStubContent);
        file_put_contents($viewDirectory . '/edit.blade.php', $vieweditStubContent);

        return true;

        $this->info("Custom class {$className} generated successfully!");
    }
}
