<?php

Events::listen('routes.fail', \App\Events\RoutesFailed::class); // not found or method not allowed
Events::listen('internal.error', \App\Events\ApplicationErrors::class); // production errors (500 internal)
Events::listen('maintenance', \App\Events\MaintenanceMode::class); // maintenance mode
Events::listen('output.log', \App\Events\OutputEvent::class); // track logs
