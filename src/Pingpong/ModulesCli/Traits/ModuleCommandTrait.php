<?php namespace Pingpong\ModulesCli\Traits;

use Illuminate\Support\Str;
use Pingpong\ModulesCli\Storage;

trait ModuleCommandTrait {

    /**
     * @param null $overwrite
     * @throws \Exception
     * @return mixed|string
     */
    public function getModuleName($overwrite = null)
    {
        $storage = Storage::getInstance();

        $module = $this->argument('module') ?: $storage->used;

        if (is_null($module) && is_null($overwrite))
        {
            throw new \Exception("No module used yet.");
        }

        $module = Str::studly($overwrite ?: $module);

        if ( ! $storage->has($module))
        {
            throw new \Exception("Module [{$module}] does not exist.");
        }

        return $module;
    }

} 