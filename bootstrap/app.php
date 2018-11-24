<?php

declare(strict_types = 1);

use Modulus\Support\DEPConfig;

DEFINE('DS', DIRECTORY_SEPARATOR);
DEPConfig::$appdir = __DIR__ . DS . '..' . DS;
