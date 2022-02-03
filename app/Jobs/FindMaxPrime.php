<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\PrimeFound;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FindMaxPrime implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $limit, $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $limit, int $userId)
    {
        $this->limit = $limit;
        $this->user = User::find($userId);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $primo = 1;
            for ($num = 1; $num <= $this->limit; $num++) {
                for ($div = 2; $div <= $num; $div++) {
                    if ($num % $div == 0) {
                        break;
                    }
                }
                if ($num == $div) {
                    $primo = $num;
                }
            }
            $title = 'Sucesso!';
            $description = "Sucesso ao retornar o máximo número primo: $primo;";
        } catch (\Throwable $th) {
            $title = 'Erro!';
            $description = "Erro ao retornar o maior número primo! | $th";
        }
        logger()->info($title . $description);
        $this->user->notify(new PrimeFound($title, $description));
    }
}
