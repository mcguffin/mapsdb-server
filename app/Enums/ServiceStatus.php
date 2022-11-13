<?php

namespace App\Enums;

enum ServiceStatus : string {
    case Alive = 'alive'; /* Service alive and operable */
    case Deprecated = 'deprecated';  /* Service is deprecated, may still work */
    case Discontinued = 'discontinued'; /* Service is discontinued */
    case Depublished = 'depublished'; /* Provider wishes service not to be published */
}
