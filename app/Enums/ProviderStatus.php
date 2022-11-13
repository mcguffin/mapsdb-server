<?php

namespace App\Enums;

enum ProviderStatus : string {
    case Alive = 'alive'; /* Provider up and operable */
    case Discontinued = 'discontinued'; /* Provider gave up */
    case Depublished = 'depublished'; /* Provider wishes not to be published */
}
