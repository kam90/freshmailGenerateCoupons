<?php

namespace App\Console\Commands;

use App\Http\Controllers\CodesController;
use Illuminate\Console\Command;

class generateCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-codes {--numberOfCodes=10} {--lengthOfCode=10} {--file=kody.txt}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate unique codes';

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
     * @return mixed
     */
    public function handle()
    {
        $obj = new CodesController();
        $obj->generateUniqueCodes(
            $this->option('lengthOfCode'),
            $this->option('numberOfCodes'),
            $this->option('file')
        );

        $this->info('Plik o nazwie '.$this->option('file').' został utworzony.');

    }
}
