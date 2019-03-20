<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SyncUserActiveAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pca7bbs:sync-user-actived-at';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '用户最后登录时间从redis同步到数据库中';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(User $user)
    {
        $user->syncUserActivedAt();
        $this->info('同步成功!');
    }
}
