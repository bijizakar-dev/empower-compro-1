<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Enable/disable backward compatibility breaking features.
 */
class Feature extends BaseConfig
{
    /**
     * Use improved new auto routing instead of the default legacy version.
     */
    public bool $autoRoutesImproved = true;

    /**
     * Use filter execution order in 4.4 or before.
     */
    public bool $oldFilterOrder = false;

    /**
     * The behavior of `limit(0)` in Query Builder.
     *
     * If true, `limit(0)` returns all records. (the behavior of 4.4.x or before in version 4.x.)
     * If false, `limit(0)` returns no records. (the behavior of 3.1.9 or later in version 3.x.)
     */
    public bool $limitZeroAsAll = true;
    
    /**
     * When true, the request's locale string is compared against App::$supportedLocales
     * and App::$defaultLocale; if it doesn't match one of those, a 406 error is returned.
     * When false, invalid locales fall back to the default locale instead.
     */
    public bool $strictLocaleNegotiation = false;
}
