<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DownloadImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $image = 'https://image.hoang-phuc.com/filters:format(webp):proportion(0.67)/catalog/product//2/2/2208c7025-wht-1_1_4.jpg';
        $paths = explode('/', $image);
        $fileName = "products/" . end($paths);

        Storage::put($fileName, file_get_contents($image));
//        $images = DB::table('products')->pluck('image');
//        foreach ($images as $image) {
//        }
    }
}
