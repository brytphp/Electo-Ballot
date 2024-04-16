<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Candidate
 *
 * @property string $id
 * @property string $election_id
 * @property string $position_id
 * @property string $color
 * @property string|null $first_name
 * @property string|null $other_names
 * @property string|null $email
 * @property string|null $phone
 * @property int $is_active
 * @property string|null $about
 * @property int|null $order_of_appearance
 * @property int|null $tally
 * @property array|null $social_media_handles
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Election|null $election
 * @property-read mixed $avatar
 * @property-read mixed $pic
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \App\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Position|null $position
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereElectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereOrderOfAppearance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereOtherNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereSocialMediaHandles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereTally($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereUpdatedAt($value)
 */
	class Candidate extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Election
 *
 * @property string $id
 * @property string $election
 * @property string $slug
 * @property string|null $about_election
 * @property string $authentication
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon|null $app_start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property \Illuminate\Support\Carbon|null $app_end_date
 * @property string $enable_exhibition
 * @property \Illuminate\Support\Carbon|null $exhibition_start_date
 * @property \Illuminate\Support\Carbon|null $exhibition_end_date
 * @property string|null $banner_title
 * @property string|null $banner_subtitle
 * @property int $auto_election
 * @property string|null $how_to_vote
 * @property int $is_sealed
 * @property int $is_active
 * @property int|null $status
 * @property int $provisional_results
 * @property string $email
 * @property string|null $email_sender_name
 * @property string $sms
 * @property string|null $sms_sender_name
 * @property string|null $username_title
 * @property string|null $password_title
 * @property string|null $voters_name
 * @property string|null $ref
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidate> $contestants
 * @property-read int|null $contestants_count
 * @property-read mixed $banner
 * @property-read mixed $logo
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \App\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Position> $positions
 * @property-read int|null $positions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $register
 * @property-read int|null $register_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vote> $skipped_votes
 * @property-read int|null $skipped_votes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vote> $total_vote_cast
 * @property-read int|null $total_vote_cast_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $verified_voters
 * @property-read int|null $verified_voters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $voted
 * @property-read int|null $voted_count
 * @method static \Illuminate\Database\Eloquent\Builder|Election newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Election newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Election query()
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereAboutElection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereAppEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereAppStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereAuthentication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereAutoElection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereBannerSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereBannerTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereElection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereEmailSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereEnableExhibition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereExhibitionEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereExhibitionStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereHowToVote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereIsSealed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election wherePasswordTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereProvisionalResults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereSms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereSmsSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereUsernameTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereVotersName($value)
 */
	class Election extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\ElectoSettings
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|ElectoSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ElectoSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ElectoSettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|ElectoSettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectoSettings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectoSettings whereValue($value)
 */
	class ElectoSettings extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\History
 *
 * @property string $id
 * @property string $election
 * @property string $slug
 * @property int $auto_election
 * @property int $provisional_results
 * @property string $history_table_name
 * @property string|null $about_election
 * @property string $authentication
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon|null $app_start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property string|null $pdf_header
 * @property \Illuminate\Support\Carbon|null $app_end_date
 * @property string $enable_exhibition
 * @property \Illuminate\Support\Carbon|null $exhibition_start_date
 * @property \Illuminate\Support\Carbon|null $exhibition_end_date
 * @property int $is_active
 * @property int $is_sealed
 * @property int|null $status
 * @property string $email
 * @property string|null $email_sender_name
 * @property string $sms
 * @property string|null $sms_sender_name
 * @property string|null $username_title
 * @property string|null $password_title
 * @property string|null $how_to_vote
 * @property string|null $banner_title
 * @property string|null $banner_subtitle
 * @property string|null $ref
 * @property int|null $total_candidates
 * @property int|null $total_positions
 * @property int|null $total_voters
 * @property int|null $total_vote_cast
 * @property int|null $total_skipped_votes
 * @property array|null $elected_candidates
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float|null $percentage_turnout
 * @method static \Illuminate\Database\Eloquent\Builder|History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|History newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|History query()
 * @method static \Illuminate\Database\Eloquent\Builder|History whereAboutElection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereAppEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereAppStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereAuthentication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereAutoElection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereBannerSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereBannerTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereElectedCandidates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereElection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereEmailSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereEnableExhibition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereExhibitionEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereExhibitionStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereHistoryTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereHowToVote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereIsSealed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History wherePasswordTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History wherePdfHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History wherePercentageTurnout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereProvisionalResults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereSms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereSmsSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereTotalCandidates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereTotalPositions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereTotalSkippedVotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereTotalVoteCast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereTotalVoters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereUsernameTitle($value)
 */
	class History extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Login
 *
 * @property string $id
 * @property string $model_id
 * @property string|null $ip
 * @property string|null $agent
 * @property string|null $platform
 * @property string|null $browser
 * @property string|null $device
 * @property string|null $robot
 * @property string|null $mac_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Login newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Login newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Login query()
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereMacAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereRobot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereUpdatedAt($value)
 */
	class Login extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array $manipulations
 * @property array $custom_properties
 * @property array $generated_conversions
 * @property array $responsive_images
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $extension
 * @property-read mixed $url
 * @property-read mixed $human_readable_size
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @property-read mixed $original_url
 * @property-read mixed $preview_url
 * @property-read mixed $type
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereGeneratedConversions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUuid($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Position
 *
 * @property string $id
 * @property string $election_id
 * @property string $position
 * @property int|null $unopposed
 * @property string $next
 * @property string $skip
 * @property string $previous
 * @property string $slug
 * @property string $color
 * @property int $can_skip
 * @property int|null $order_of_appearance
 * @property int $votes_per_voter
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidate> $candidates
 * @property-read int|null $candidates_count
 * @property-read \App\Models\Election|null $election
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vote> $skipped_votes
 * @property-read int|null $skipped_votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereCanSkip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereElectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereNext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereOrderOfAppearance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position wherePrevious($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereSkip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUnopposed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereVotesPerVoter($value)
 */
	class Position extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Reminder
 *
 * @property int $id
 * @property string $title
 * @property string $voters
 * @property \Illuminate\Support\Carbon $from_date
 * @property \Illuminate\Support\Carbon $to_date
 * @property string|null $sms
 * @property string|null $mail
 * @property int|null $status
 * @property string|null $batch
 * @property string|null $first_name
 * @property string|null $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereSms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reminder whereVoters($value)
 */
	class Reminder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string|null $first_name
 * @property string|null $other_names
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $country_code
 * @property string|null $international_phone
 * @property string|null $voter_id
 * @property string|null $election_id
 * @property int $votes_per_voter
 * @property string $access_role
 * @property string $password
 * @property string|null $fcm_token
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $session_id
 * @property int|null $otp
 * @property int|null $voting_attempts
 * @property string|null $email_checked_at
 * @property string|null $phone_checked_at
 * @property string|null $system_checked_phone_at
 * @property \Illuminate\Support\Carbon|null $verified_at
 * @property \Illuminate\Support\Carbon|null $voted_at
 * @property \Illuminate\Support\Carbon|null $attempted_at
 * @property \Illuminate\Support\Carbon|null $otp_expires_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Election|null $election
 * @property-read mixed $avatar
 * @property-read mixed $masked_email
 * @property-read mixed $masked_phone
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Login> $logins
 * @property-read int|null $logins_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \App\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vote> $votes
 * @property-read int|null $votes_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccessRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAttemptedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereElectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFcmToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInternationalPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOtherNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOtpExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSystemCheckedPhoneAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVotedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVoterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVotesPerVoter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVotingAttempts($value)
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\UserUpdate
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserUpdate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserUpdate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserUpdate query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserUpdate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserUpdate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserUpdate whereUpdatedAt($value)
 */
	class UserUpdate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vote
 *
 * @property string $id
 * @property string $election_id
 * @property string|null $candidate_id
 * @property string $position_id
 * @property string $user_id
 * @property string|null $ref
 * @property string|null $voted_at
 * @property string|null $ip
 * @property string|null $agent
 * @property string|null $platform
 * @property string|null $browser
 * @property string|null $device
 * @property string|null $mac_address
 * @property string|null $robot
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Candidate|null $candidate
 * @property-read \App\Models\User|null $member
 * @property-read \App\Models\Position|null $position
 * @method static \Illuminate\Database\Eloquent\Builder|Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereElectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereMacAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereRobot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereVotedAt($value)
 */
	class Vote extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VoterInclusion
 *
 * @property string $id
 * @property string|null $voter_id
 * @property string|null $level
 * @property string|null $surname
 * @property string|null $other_names
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $status
 * @property int $email_update
 * @property int $phone_update
 * @property int $voter_id_update
 * @property int $voter_inclusion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion query()
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereEmailUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereOtherNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion wherePhoneUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereVoterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereVoterIdUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoterInclusion whereVoterInclusion($value)
 */
	class VoterInclusion extends \Eloquent {}
}

