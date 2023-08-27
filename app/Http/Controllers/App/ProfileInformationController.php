<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\ProfileInformationUpdatedResponse;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class ProfileInformationController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @return \Laravel\Fortify\Contracts\ProfileInformationUpdatedResponse
     */
    public function update(
        Request $request,
        UpdatesUserProfileInformation $updater
    ) {
        $updater->update($request->user(), $request->all());

        return app(ProfileInformationUpdatedResponse::class);
    }
}
