<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'election', 'slug', 'authentication', 'start_date', 'app_start_date', 'end_date', 'app_end_date', 'role', 'enable_exhibition', 'exhibition_start_date', 'exhibition_end_date', 'is_active', 'is_sealed', 'status', 'email', 'email_sender_name', 'sms', 'sms_sender_name', 'ref', 'about_election', 'username_title', 'password_title', 'pdf_header', 'banner_title', 'banner_subtitle', 'allow_proxy', 'auto_election', 'provisional_results', 'how_to_vote', 'history_table_name', 'total_candidates', 'election_details', 'elected_candidates', 'total_positions', 'total_voters', 'total_vote_cast', 'total_skipped_votes', 'percentage_turnout',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime:M d, Y g:i:s a',
        'created_at' => 'datetime:M d, Y g:i:s a',
        'app_start_date' => 'datetime:M d, Y g:i:s a',
        'end_date' => 'datetime:M d, Y g:i:s a',
        'app_end_date' => 'datetime:M d, Y g:i:s a',
        'election_details' => 'array',
        'exhibition_start_date' => 'datetime:M d, Y g:i:s a',
        'exhibition_end_date' => 'datetime:M d, Y g:i:s a',
        'elected_candidates' => 'array',
    ];
}
