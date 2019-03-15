<?php

use App\Actions\IndexAction;
use App\Actions\ParseAction;

$app->get('/', IndexAction::class);
$app->post('/parse', ParseAction::class);

