<?php

namespace App\Enums;

enum SuggestionStatus : string {
    case Draft = 'draft'; /* users draft */
    case Pending = 'pending'; /* awaiting review */
    case Review = 'review'; /* in review */
    case Approved = 'approved'; /* approved and merged */
    case Rejected = 'rejected'; /* rejected */
}
