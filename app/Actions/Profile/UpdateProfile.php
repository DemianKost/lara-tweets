<?php

namespace App\Actions\Profile;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProfile
{
    use AsAction;

    public function handle( $data )
    {
        auth()->user()->update([
            'name' => $data['name']
        ]);

        auth()->user()->profile()->update([
            'about' => $data['about']
        ]);
    }
}
