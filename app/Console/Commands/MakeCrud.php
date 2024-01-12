<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Engines\FileEngine;

class MakeCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates crud';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        Artisan::call('make:model '.$name);
        $this->info('Model created successfully!!');
        Artisan::call('make:controller Admin/'.$name.'Controller --resource');
        $this->info('Controller created successfully!!');
        $this->addRoute($name);
        Artisan::call('make:request '.$name.'Request');
        $this->info('Request created successfully!!');
    }
    public function addRoute ($name) {
        $path = 'routes/web.php';
        $disk = Storage::disk('root');
        $code = 'Route::resource("'.lcfirst($name).'", '.$name.'Controller::class);';
        $old_file_path = $disk->path($path);
        $file_lines = file($old_file_path, FILE_IGNORE_NEW_LINES);
        if ($this->getLastLineNumberThatContains($code, $file_lines)) {
            $this->info('Route already existed.');
            return 0;
        }
        $end_line_number = $this->customRoutesEndLine($file_lines);
        if ($end_line_number === null) {
            $this->info('web.php modified!! End of admin route group not found!!');
        }
        $file_lines[$end_line_number + 1] = $file_lines[$end_line_number];
        $file_lines[$end_line_number] = '    '.$code;
        $neW_file_content = implode(PHP_EOL, $file_lines);

        if ($disk->put($path, $neW_file_content)) {
            $this->info('Route successfully added!!');
        } else {
            $this->info('Something went wrong!!');
        }
    }

    public function getLastLineNumberThatContains ($needle, $haystack) {
        $matchingLines = array_filter($haystack, function ($k) use ($needle) {
            return strpos($k, $needle) !== false;
        });

        if ($matchingLines) {
            return array_key_last($matchingLines);
        }

        return false;
    }

    public function customRoutesEndLine ($file_lines) {
        $end_line_number = array_search('}); //end of admin route group', $file_lines);

        if ($end_line_number) {
            return $end_line_number;
        }
        return null;
    }
}
