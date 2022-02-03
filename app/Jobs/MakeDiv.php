<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\DivMade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeDiv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $num1, $num2, $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(float $num1, float $num2, int $userId)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->user = User::find($userId);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->num2) {
            $title = 'Erro';
            $description = 'Divisão por zero';
        } else {
            try {
                $div = $this->num1 / $this->num2;
                $title = 'Sucesso';
                $description = "Div = $div";
            } catch (\Throwable $th) {
                $title = 'Erro';
                $description = 'Erro ao tentar fazer a divisão';
            }
        }

        $this->user->notify(new DivMade($title, $description));
    }
}
