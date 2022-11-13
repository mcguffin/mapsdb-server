<?php

namespace App\Enums;

enum TileServiceParamType : string {
    case X = 'x'; /* x coord */
    case Y = 'y'; /* y coord */
    case Z = 'z'; /* z(oom) */
    case R = 'r'; /* resolution */
    case S = 's'; /* subdomain */
    case ACCESS_TOKEN = 'access_token'; /* never published */
    case TIMESTAMP = 'timestamp'; /* map rectangle */
    case PRIMITIVE = 'primitive'; /* primitive string */
    case SELECT = 'select'; /* selectable list. */
}
