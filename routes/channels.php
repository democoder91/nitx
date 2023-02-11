<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('newScreen.{screenId}', function () {
    return true;
});

Broadcast::channel('screen.{screenId}', function () {
    return true;
});

Broadcast::channel('forceRefresh', function () {
    return true;
});

Broadcast::channel('screen-media-.{sequenceId}', function () {
    return true;
});

Broadcast::channel('screen-rotation-.{screenId}', function () {
    return true;
});

Broadcast::channel('screen-orientation-.{screenId}', function () {
    return true;
});