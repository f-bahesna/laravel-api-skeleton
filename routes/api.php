<?php
declare(strict_types=1);

use App\Application\CommandDispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Yaml\Yaml;

/**
 * @author frada <fbahezna@gmail.com>
 */

$modulesPath = base_path('src');

foreach(scandir($modulesPath) as $module) {
    if(in_array($module, ['.', '..'])) continue;

    $routeFile = "{$modulesPath}/{$module}/Infrastructure/routes/route.yaml";

    if(!file_exists($routeFile)) continue;

    $routes = Yaml::parseFile($routeFile);

    foreach($routes as $definition){
        Route::match(
            $definition['methods'],
            $definition['path'],
            function (Request $request) use ($module, $definition) {
                return app(CommandDispatcher::class)->dispatch(
                    $module,
                    $definition['command'],
                    $request->all()
                );
            }
        )->middleware($definition['middleware'] ?? []);
    }
}
