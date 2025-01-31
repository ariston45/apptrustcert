<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Act_activity
 *
 * @property int $act_id
 * @property int|null $act_lead_id
 * @property string|null $act_lead_status
 * @property string|null $act_todo_type_id
 * @property string|null $act_run_status
 * @property string|null $act_todo_priority
 * @property string|null $act_todo_describe
 * @property string|null $act_todo_result
 * @property string|null $act_task_times
 * @property string|null $act_task_times_due
 * @property string|null $act_user_customer
 * @property int|null $act_user_assigned
 * @property int|null $act_user_created
 * @property string|null $act_user_teams
 * @property string|null $act_comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActLeadStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActRunStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActTaskTimes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActTaskTimesDue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActTodoDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActTodoPriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActTodoResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActTodoTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActUserAssigned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActUserCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActUserCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereActUserTeams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity whereUpdatedBy($value)
 */
	class Act_activity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Act_activity_type
 *
 * @property int $aat_id
 * @property string|null $aat_type_code
 * @property string|null $aat_type_name
 * @property string|null $aat_type_button
 * @property string|null $aat_icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereAatIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereAatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereAatTypeButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereAatTypeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereAatTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act_activity_type whereUpdatedBy($value)
 */
	class Act_activity_type extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Addr_city
 *
 * @property int $city_id
 * @property string|null $city_name
 * @property int|null $prov_id
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_city newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_city newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_city query()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_city whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_city whereCityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_city whereProvId($value)
 */
	class Addr_city extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Addr_district
 *
 * @property int $dis_id
 * @property string|null $dis_name
 * @property int|null $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_district newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_district newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_district query()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_district whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_district whereDisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_district whereDisName($value)
 */
	class Addr_district extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Addr_province
 *
 * @property int $prov_id
 * @property string|null $prov_name
 * @property int|null $locationid
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_province whereLocationid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_province whereProvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_province whereProvName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_province whereStatus($value)
 */
	class Addr_province extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Addr_subdistrict
 *
 * @property int $subdis_id
 * @property string|null $subdis_name
 * @property int|null $dis_id
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_subdistrict newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_subdistrict newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_subdistrict query()
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_subdistrict whereDisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_subdistrict whereSubdisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addr_subdistrict whereSubdisName($value)
 */
	class Addr_subdistrict extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_bussiness_field
 *
 * @property int $bus_id
 * @property string|null $bus_name
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field whereBusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field whereBusName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_bussiness_field whereUpdatedBy($value)
 */
	class Cst_bussiness_field extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_company
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_company query()
 */
	class Cst_company extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_contact_email
 *
 * @property int $eml_id
 * @property int|null $eml_cnt_id
 * @property string|null $eml_param
 * @property string|null $eml_label
 * @property string|null $eml_address
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereEmlAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereEmlCntId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereEmlId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereEmlLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereEmlParam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_email whereUpdatedBy($value)
 */
	class Cst_contact_email extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_contact_mobile
 *
 * @property int $mob_id
 * @property int|null $mob_cnt_id
 * @property string|null $mob_param
 * @property string|null $mob_label
 * @property string|null $mob_number
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereMobCntId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereMobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereMobLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereMobNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereMobParam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_mobile whereUpdatedBy($value)
 */
	class Cst_contact_mobile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_contact_phone
 *
 * @property int $pho_id
 * @property int|null $pho_cnt_id
 * @property string|null $pho_param
 * @property string|null $pho_label
 * @property string|null $pho_number
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone wherePhoCntId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone wherePhoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone wherePhoLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone wherePhoNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone wherePhoParam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_contact_phone whereUpdatedBy($value)
 */
	class Cst_contact_phone extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_customer
 *
 * @property int $cst_id
 * @property int|null $cst_institution
 * @property string|null $cst_string_id
 * @property string|null $cst_name
 * @property string|null $cst_web
 * @property string|null $cst_business_field
 * @property string|null $cst_notes
 * @property string|null $view_option
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCstBusinessField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCstId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCstInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCstNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCstStringId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereCstWeb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_customer whereViewOption($value)
 */
	class Cst_customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_institution
 *
 * @property int $ins_id
 * @property string|null $ins_name
 * @property string|null $ins_note
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution whereInsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution whereInsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution whereInsNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_institution whereUpdatedBy($value)
 */
	class Cst_institution extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_location
 *
 * @property int $loc_id
 * @property int|null $loc_cst_id
 * @property string|null $loc_represent
 * @property string|null $loc_street
 * @property string|null $loc_district
 * @property string|null $loc_city
 * @property string|null $loc_province
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereLocCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereLocCstId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereLocDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereLocId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereLocProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereLocRepresent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereLocStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_location whereUpdatedBy($value)
 */
	class Cst_location extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cst_personal
 *
 * @property int $cnt_id
 * @property int|null $cnt_cst_id
 * @property string|null $cnt_fullname
 * @property string|null $cnt_nickname
 * @property string|null $cnt_company_position
 * @property string|null $cnt_notes
 * @property string|null $view_option
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereCntCompanyPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereCntCstId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereCntFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereCntId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereCntNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereCntNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cst_personal whereViewOption($value)
 */
	class Cst_personal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Menu
 *
 * @property int $id_menu
 * @property string|null $mn_level_user
 * @property int|null $mn_parent_id
 * @property string|null $mn_icon_code
 * @property string|null $mn_title
 * @property string|null $mn_slug
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Menu> $children
 * @property-read int|null $children_count
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIdMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMnIconCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMnLevelUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMnParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMnSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMnTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prd_product
 *
 * @property int $prd_id
 * @property string|null $prd_name
 * @property string|null $prd_vendor
 * @property string|null $prd_describe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product wherePrdDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product wherePrdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product wherePrdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product wherePrdVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_product whereUpdatedBy($value)
 */
	class Prd_product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prd_subproduct
 *
 * @property int $psp_id
 * @property int|null $psp_product_id
 * @property string|null $psp_subproduct_name
 * @property float|null $psp_estimate_value
 * @property string|null $psp_describe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct wherePspDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct wherePspEstimateValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct wherePspId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct wherePspProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct wherePspSubproductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prd_subproduct whereUpdatedBy($value)
 */
	class Prd_subproduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_contact
 *
 * @property int $plc_id Ids
 * @property int|null $plc_lead_id Data lead (id)
 * @property int $plc_attendant_id Data pic (ids)
 * @property string|null $plc_attendant_rule Data rule personal customer
 * @property int|null $plc_customer_id Data company/institution (id)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact wherePlcAttendantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact wherePlcAttendantRule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact wherePlcCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact wherePlcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact wherePlcLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_contact whereUpdatedBy($value)
 */
	class Prs_contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_lead
 *
 * @property int $lds_id
 * @property string|null $lds_title
 * @property string|null $lds_describe
 * @property string|null $lds_status
 * @property string|null $lds_customer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereLdsCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereLdsDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereLdsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereLdsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereLdsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead whereUpdatedBy($value)
 */
	class Prs_lead extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_lead_customer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_customer query()
 */
	class Prs_lead_customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_lead_product
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_product query()
 */
	class Prs_lead_product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_lead_status
 *
 * @property int $pls_id
 * @property int|null $pls_user_profile
 * @property string|null $pls_status_color
 * @property string|null $pls_status_code
 * @property string|null $pls_code_name
 * @property string|null $pls_status_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status wherePlsCodeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status wherePlsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status wherePlsStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status wherePlsStatusColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status wherePlsStatusName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status wherePlsUserProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_status whereUpdatedBy($value)
 */
	class Prs_lead_status extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_lead_statuses
 *
 * @property int $pls_id
 * @property int|null $pls_user_profile
 * @property string|null $pls_status_color
 * @property string|null $pls_status_code
 * @property string|null $pls_code_name
 * @property string|null $pls_status_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses wherePlsCodeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses wherePlsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses wherePlsStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses wherePlsStatusColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses wherePlsStatusName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses wherePlsUserProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_statuses whereUpdatedBy($value)
 */
	class Prs_lead_statuses extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_lead_value
 *
 * @property int $lvs_id
 * @property int|null $lvs_lead_id
 * @property float|null $lvs_base_value
 * @property float|null $lvs_target_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value whereLvsBaseValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value whereLvsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value whereLvsLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value whereLvsTargetValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_lead_value whereUpdatedBy($value)
 */
	class Prs_lead_value extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_product_offer
 *
 * @property int $pof_id
 * @property int|null $pof_lead_id
 * @property int|null $pof_product_id
 * @property int|null $pof_quantity
 * @property int|null $pof_unit_value
 * @property int|null $pof_total_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer wherePofId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer wherePofLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer wherePofProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer wherePofQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer wherePofTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer wherePofUnitValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_product_offer whereUpdatedBy($value)
 */
	class Prs_product_offer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_qualification
 *
 * @property int $lqs_id
 * @property int|null $lqs_lead_id
 * @property string|null $lqs_type_identification
 * @property string|null $lqs_parameter
 * @property string|null $lqs_describe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereLqsDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereLqsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereLqsLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereLqsParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereLqsTypeIdentification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_qualification whereUpdatedBy($value)
 */
	class Prs_qualification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prs_salesperson
 *
 * @property int $slm_id
 * @property int|null $slm_user
 * @property int|null $slm_lead
 * @property string|null $slm_rules
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson whereSlmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson whereSlmLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson whereSlmRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson whereSlmUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prs_salesperson whereUpdatedBy($value)
 */
	class Prs_salesperson extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $level
 * @property string|null $image
 * @property string $password
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $phone
 * @property string|null $remember_token
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_by
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

