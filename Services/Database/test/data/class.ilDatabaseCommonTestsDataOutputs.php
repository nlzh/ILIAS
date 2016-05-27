<?php

/**
 * Class ilDatabaseCommonTestsDataOutputs
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
abstract class ilDatabaseCommonTestsDataOutputs {

	public function getIndexInfo($with_fulltext = false) {
		if ($with_fulltext) {
			return array(
				0 => array(
					'name'     => 'i1',
					'fulltext' => false,
					'fields'   => array(
						'init_mob_id' => array(
							'position' => 1,
							'sorting'  => 'ascending',
						),
					),
				),
				1 => array(
					'name'     => 'i2',
					'fulltext' => true,
					'fields'   => array(
						'address' => array(
							'position' => 1,
							'sorting'  => null,
						),
					),
				),
			);
		} else {
			return array(
				0 => array(
					'name'     => 'i1',
					'fulltext' => false,
					'fields'   => array(
						'init_mob_id' => array(
							'position' => 1,
							'sorting'  => 'ascending',
						),
					),
				),
			);
		}
	}


	/**
	 * @return array
	 */
	public function getPrimaryInfo() {
		return array(
			'name'   => 'primary',
			'fields' => array(
				'id' => array(
					'position' => 1,
					'sorting'  => 'ascending',
				),
			),
		);
	}


	/**
	 * @var array
	 */
	public static $analyzer_field_info = array(
		'id'             => array(
			'notnull'       => true,
			'nativetype'    => 'int',
			'length'        => 4,
			'unsigned'      => 0,
			'default'       => '',
			'fixed'         => null,
			'autoincrement' => null,
			'type'          => 'integer',
			'alt_types'     => '',
		),
		'is_online'      => array(
			'notnull'       => false,
			'nativetype'    => 'tinyint',
			'length'        => 1,
			'unsigned'      => 0,
			'default'       => null,
			'fixed'         => null,
			'autoincrement' => null,
			'type'          => 'integer',
			'alt_types'     => 'boolean1 ',
		),
		'is_default'     => array(
			'notnull'       => false,
			'nativetype'    => 'tinyint',
			'length'        => 1,
			'unsigned'      => 0,
			'default'       => '1',
			'fixed'         => null,
			'autoincrement' => null,
			'type'          => 'integer',
			'alt_types'     => 'boolean1 ',
		),
		'latitude'       => array(
			'notnull'       => false,
			'nativetype'    => 'double',
			'length'        => null,
			'unsigned'      => 0,
			'default'       => null,
			'fixed'         => null,
			'autoincrement' => null,
			'type'          => 'float',
			'alt_types'     => '',
		),
		'longitude'      => array(
			'notnull'       => false,
			'nativetype'    => 'double',
			'length'        => null,
			'unsigned'      => 0,
			'default'       => null,
			'fixed'         => null,
			'autoincrement' => null,
			'type'          => 'float',
			'alt_types'     => '',
		),
		'elevation'      => array(
			'notnull'       => false,
			'nativetype'    => 'double',
			'length'        => null,
			'unsigned'      => 0,
			'default'       => null,
			'fixed'         => null,
			'autoincrement' => null,
			'type'          => 'float',
			'alt_types'     => '',
		),
		'address'        => array(
			'notnull'       => false,
			'nativetype'    => 'varchar',
			'length'        => '256',
			'unsigned'      => null,
			'default'       => null,
			'fixed'         => false,
			'autoincrement' => null,
			'type'          => 'text',
			'alt_types'     => '',
		),
		'init_mob_id'    => array(
			'notnull'       => false,
			'nativetype'    => 'int',
			'length'        => 4,
			'unsigned'      => 0,
			'default'       => null,
			'fixed'         => null,
			'autoincrement' => null,
			'type'          => 'integer',
			'alt_types'     => '',
		),
		'comment_mob_id' => array(
			'notnull'       => false,
			'nativetype'    => 'varchar',
			'length'        => '250',
			'unsigned'      => null,
			'default'       => null,
			'fixed'         => false,
			'autoincrement' => null,
			'type'          => 'text',
			'alt_types'     => '',
		),
		'container_id'   => array(
			'notnull'       => false,
			'nativetype'    => 'int',
			'length'        => 4,
			'unsigned'      => 0,
			'default'       => null,
			'fixed'         => null,
			'autoincrement' => null,
			'type'          => 'integer',
			'alt_types'     => '',
		),
		'big_data'       => array(
			'notnull'       => false,
			'nativetype'    => 'longtext',
			'length'        => null,
			'unsigned'      => null,
			'default'       => null,
			'fixed'         => false,
			'autoincrement' => null,
			'type'          => 'clob',
			'alt_types'     => 'text ',
		),
	);
	/**
	 * @var array
	 */
	public static $insert_sql_output = array(
		'id'             => '58',
		'is_online'      => '1',
		'is_default'     => '0',
		'latitude'       => '47.05983',
		'longitude'      => '7.624028',
		'elevation'      => '2.56',
		'address'        => 'Farbweg 9, 3400 Burgdorf',
		'init_mob_id'    => '78',
		'comment_mob_id' => '69',
		'container_id'   => '456',
		'big_data'       => null,
	);
	/**
	 * @var array
	 */
	public static $select_usr_data_output = array(
		'usr_id'             => '6',
		'login'              => 'root',
		'is_self_registered' => '0',
	);
	/**
	 * @var array
	 */
	public static $select_usr_data_2_output = array(
		array(
			'usr_id'             => '6',
			'login'              => 'root',
			'is_self_registered' => '0',
		),
		array(
			'usr_id'             => '13',
			'login'              => 'anonymous',
			'is_self_registered' => '0',
		),
	);
	/**
	 * @var array
	 */
	public static $output_after_native_update = array(
		'id'             => '56',
		'is_online'      => '1',
		'is_default'     => '0',
		'latitude'       => '47.05983',
		'longitude'      => '7.624028',
		'elevation'      => '2.56',
		'address'        => 'Farbweg 9, 3400 Burgdorf',
		'init_mob_id'    => '2222',
		'comment_mob_id' => '69',
		'container_id'   => '456',
		'big_data'       => null,
	);
	/**
	 * @var array
	 */
	public static $output_after_native_input = array(
		'id'             => '56',
		'is_online'      => '1',
		'is_default'     => '0',
		'latitude'       => '47.05983',
		'longitude'      => '7.624028',
		'elevation'      => '2.56',
		'address'        => 'Farbweg 9, 3400 Burgdorf',
		'init_mob_id'    => '78',
		'comment_mob_id' => '69',
		'container_id'   => '456',
		'big_data'       => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
	);


	/**
	 * @param $table_name
	 * @return string
	 */
	abstract public function getCreationQueryBuildByILIAS($table_name);


	/**
	 * @return array
	 */
	public function getTableFieldDefinition() {
		return array(
			0 => array(
				'notnull'    => false,
				'nativetype' => 'int',
				'length'     => 4,
				'unsigned'   => 0,
				'default'    => null,
				'type'       => 'integer',
				'mdb2type'   => 'integer',
			),
		);
	}


	/**
	 * @var array
	 */
	public static $table_index_definition_output = array(
		'fields' => array(
			'init_mob_id' => array(
				'position' => 1,
				'sorting'  => 'ascending',
			),
		),
	);
	/**
	 * @var array
	 */
	public static $table_constraint_definition_output = array(
		'primary' => true,
		'fields'  => array(
			'id' => array(
				'position' => 1,
				'sorting'  => 'ascending',
			),
		),
	);


	/**
	 * @param $table_name
	 * @return array
	 */
	public function getTableSequences($table_name) {
		$array = array(
			0   => 'addressbook_mlist_ass',
			1   => 'addressbook_mlist',
			2   => 'adm_settings_template',
			3   => 'adv_md_record',
			4   => 'adv_mdf_definition',
			5   => 'aicc_object',
			6   => 'aicc_units',
			7   => 'ass_log',
			8   => 'benchmark',
			9   => 'booking_entry',
			10  => 'booking_object',
			11  => 'booking_reservation_group',
			12  => 'booking_reservation',
			13  => 'booking_schedule',
			14  => 'bookmark_data',
			15  => 'bookmark_social_bm',
			16  => 'cal_categories',
			17  => 'cal_ch_group',
			18  => 'cal_entries',
			19  => 'cal_notification',
			20  => 'cal_rec_exclusion',
			21  => 'cal_recurrence_rules',
			22  => 'chatroom_admconfig',
			23  => 'chatroom_history',
			24  => 'chatroom_prooms',
			25  => 'chatroom_psessions',
			26  => 'chatroom_sessions',
			27  => 'chatroom_settings',
			28  => 'chatroom_smilies',
			29  => 'chatroom_uploads',
			30  => 'cmi_comment',
			31  => 'cmi_correct_response',
			32  => 'cmi_interaction',
			33  => 'cmi_node',
			34  => 'cmi_objective',
			35  => 'conditions',
			36  => 'cp_node',
			37  => 'crs_archives',
			38  => 'crs_f_definitions',
			39  => 'crs_file',
			40  => 'crs_objective_lm',
			41  => 'crs_objective_qst',
			42  => 'crs_objective_tst',
			43  => 'crs_objectives',
			44  => 'crs_start',
			45  => 'didactic_tpl_a',
			46  => 'didactic_tpl_fp',
			47  => 'didactic_tpl_settings',
			48  => 'ecs_cmap_rule',
			49  => 'ecs_cms_data',
			50  => 'ecs_container_mapping',
			51  => 'ecs_course_assignments',
			52  => 'ecs_crs_mapping_atts',
			53  => 'ecs_events',
			54  => 'ecs_remote_user',
			55  => 'ecs_server',
			56  => 'event_appointment',
			57  => 'event_file',
			58  => 'event',
			59  => 'exc_assignment',
			60  => 'exc_crit_cat',
			61  => 'exc_crit',
			62  => 'exc_returned',
			64  => 'frm_data',
			65  => 'frm_notification',
			66  => 'frm_posts_deleted',
			67  => 'frm_posts',
			68  => 'frm_posts_tree',
			69  => 'frm_threads',
			70  => 'glossary_definition',
			71  => 'glossary_term',
			72  => 'help_module',
			73  => 'help_tooltip',
			74  => 'history',
			75  => 'il_bibl_attribute',
			76  => 'il_bibl_entry',
			77  => 'il_bibl_settings',
			78  => 'il_blog_posting',
			79  => 'il_custom_block',
			80  => 'il_dcl_data',
			81  => 'il_dcl_field_prop',
			82  => 'il_dcl_field',
			83  => 'il_dcl_record_field',
			84  => 'il_dcl_record',
			85  => 'il_dcl_stloc1_value',
			86  => 'il_dcl_stloc2_value',
			87  => 'il_dcl_stloc3_value',
			88  => 'il_dcl_table',
			89  => 'il_dcl_view',
			90  => 'il_exc_team_log',
			91  => 'il_exc_team',
			92  => 'il_external_feed_block',
			93  => 'il_gc_memcache_server',
			94  => 'il_md_cpr_selections',
			95  => 'il_meta_annotation',
			96  => 'il_meta_classification',
			97  => 'il_meta_contribute',
			98  => 'il_meta_description',
			99  => 'il_meta_educational',
			100 => 'il_meta_entity',
			101 => 'il_meta_format',
			102 => 'il_meta_general',
			103 => 'il_meta_identifier_',
			104 => 'il_meta_identifier',
			105 => 'il_meta_keyword',
			106 => 'il_meta_language',
			107 => 'il_meta_lifecycle',
			108 => 'il_meta_location',
			109 => 'il_meta_meta_data',
			110 => 'il_meta_relation',
			111 => 'il_meta_requirement',
			112 => 'il_meta_rights',
			113 => 'il_meta_tar',
			114 => 'il_meta_taxon_path',
			115 => 'il_meta_taxon',
			116 => 'il_meta_technical',
			117 => 'il_new_item_grp',
			118 => 'il_news_item',
			119 => 'il_poll_answer',
			120 => 'il_qpl_qst_fq_res',
			121 => 'il_qpl_qst_fq_res_unit',
			122 => 'il_qpl_qst_fq_ucat',
			123 => 'il_qpl_qst_fq_unit',
			124 => 'il_qpl_qst_fq_var',
			125 => 'il_rating_cat',
			126 => $table_name,
			127 => 'il_wiki_page',
			128 => 'ldap_rg_mapping',
			129 => 'ldap_role_assignments',
			130 => 'ldap_server_settings',
			131 => 'link_check',
			132 => 'lm_data',
			133 => 'lm_menu',
			134 => 'loc_tst_assignments',
			135 => 'mail_man_tpl',
			136 => 'mail_obj_data',
			137 => 'mail',
			138 => 'media_item',
			139 => 'mep_item',
			140 => 'note',
			141 => 'notification_data',
			142 => 'notification_osd',
			143 => 'obj_stat_log',
			144 => 'object_data',
			145 => 'object_reference',
			146 => 'object_reference_ws',
			147 => 'openid_provider',
			148 => 'orgu_types',
			149 => 'page_layout',
			150 => 'page_style_usage',
			151 => 'pg_amd_page_list',
			152 => 'prg_settings',
			153 => 'prg_translations',
			154 => 'prg_type_adv_md_rec',
			155 => 'prg_type',
			156 => 'prg_usr_assignments',
			157 => 'prg_usr_progress',
			158 => 'qpl_a_cloze',
			159 => 'qpl_a_errortext',
			160 => 'qpl_a_essay',
			161 => 'qpl_a_imagemap',
			162 => 'qpl_a_matching',
			163 => 'qpl_a_mc',
			164 => 'qpl_a_mdef',
			165 => 'qpl_a_mterm',
			166 => 'qpl_a_ordering',
			167 => 'qpl_a_sc',
			168 => 'qpl_a_textsubset',
			169 => 'qpl_fb_generic',
			170 => 'qpl_fb_specific',
			171 => 'qpl_hint_tracking',
			172 => 'qpl_hints',
			173 => 'qpl_num_range',
			174 => 'qpl_questionpool',
			175 => 'qpl_questions',
			176 => 'qpl_sol_sug',
			177 => 'rbac_log',
			178 => 'rbac_operations',
			179 => 'reg_er_assignments',
			180 => 'reg_registration_codes',
			181 => 'role_desktop_items',
			182 => 'sahs_sc13_seq_node',
			183 => 'sahs_sc13_seq',
			184 => 'sahs_sc13_seq_templts',
			185 => 'sahs_sc13_tree_node',
			186 => 'sc_resource_dependen',
			187 => 'sc_resource_file',
			188 => 'scorm_object',
			189 => 'search_data',
			190 => 'shib_role_assignment',
			191 => 'skl_level',
			192 => 'skl_profile',
			193 => 'skl_self_eval',
			194 => 'skl_tree_node',
			195 => 'sty_media_query',
			196 => 'style_parameter',
			197 => 'style_template',
			198 => 'svy_anonymous',
			199 => 'svy_answer',
			200 => 'svy_category',
			201 => 'svy_constraint',
			202 => 'svy_finished',
			203 => 'svy_inv_usr',
			204 => 'svy_material',
			205 => 'svy_phrase_cat',
			206 => 'svy_phrase',
			207 => 'svy_qblk_qst',
			208 => 'svy_qblk',
			209 => 'svy_qpl',
			210 => 'svy_qst_constraint',
			211 => 'svy_qst_matrixrows',
			212 => 'svy_qst_oblig',
			213 => 'svy_qtype',
			214 => 'svy_question',
			215 => 'svy_relation',
			216 => 'svy_settings',
			217 => 'svy_svy_qst',
			218 => 'svy_svy',
			219 => 'svy_times',
			220 => 'svy_variable',
			221 => 'sysc_groups',
			222 => 'sysc_tasks',
			223 => 'tax_node',
			224 => 'tos_acceptance_track',
			225 => 'tos_versions',
			226 => 'tst_active',
			227 => 'tst_manual_fb',
			228 => 'tst_mark',
			229 => 'tst_rnd_cpy',
			230 => 'tst_rnd_qpl_title',
			231 => 'tst_rnd_quest_set_qpls',
			232 => 'tst_solutions',
			233 => 'tst_test_defaults',
			234 => 'tst_test_question',
			235 => 'tst_test_result',
			236 => 'tst_test_rnd_qst',
			237 => 'tst_tests',
			238 => 'tst_times',
			239 => 'udf_definition',
			240 => 'usr_account_codes',
			241 => 'usr_data_multi',
			242 => 'usr_ext_profile_page',
			243 => 'usr_portfolio_page',
			244 => 'webr_items',
			245 => 'webr_params',
			246 => 'write_event',
			247 => 'xhtml_page',
			248 => 'xmlnestedset',
			249 => 'xmlnestedsettmp',
			250 => 'xmltags',
			251 => 'xmlvalue',
		);

		return array_values($array);
	}


	/**
	 * @var array
	 */
	public static $table_indices = array(
		0 => 'i1',
	);
	/**
	 * @var array
	 */
	public static $table_indices_fulltext = array(
		0 => 'i1',
		1 => 'i2',
	);


	/**
	 * @return array
	 */
	public function getTableConstraints() {
		return array(
			0 => 'primary',
		);
	}


	/**
	 * @return array
	 */
	public function getTableFields() {
		return array(
			0  => 'id',
			1  => 'is_online',
			2  => 'is_default',
			3  => 'latitude',
			4  => 'longitude',
			5  => 'elevation',
			6  => 'address',
			7  => 'init_mob_id',
			8  => 'comment_mob_id',
			9  => 'container_id',
			10 => 'big_data',
		);
	}


	/**
	 * @param $table_name
	 * @return array
	 */
	public function getListTables($table_name) {
		return array(
			0   => 'abstraction_progress',
			1   => 'acc_access_key',
			2   => 'acc_cache',
			3   => 'acc_user_access_key',
			4   => 'acl_ws',
			5   => 'addressbook_mlist',
			6   => 'addressbook_mlist_ass',
			7   => 'adl_shared_data',
			8   => 'adm_set_templ_hide_tab',
			9   => 'adm_set_templ_value',
			10  => 'adm_settings_template',
			11  => 'adv_md_obj_rec_select',
			12  => 'adv_md_record',
			13  => 'adv_md_record_objs',
			14  => 'adv_md_substitutions',
			15  => 'adv_md_values_date',
			16  => 'adv_md_values_datetime',
			17  => 'adv_md_values_float',
			18  => 'adv_md_values_int',
			19  => 'adv_md_values_location',
			20  => 'adv_md_values_text',
			21  => 'adv_mdf_definition',
			22  => 'aicc_course',
			23  => 'aicc_object',
			24  => 'aicc_units',
			25  => 'ass_log',
			26  => 'benchmark',
			27  => 'booking_entry',
			28  => 'booking_obj_assignment',
			29  => 'booking_object',
			30  => 'booking_reservation',
			31  => 'booking_schedule',
			32  => 'booking_schedule_slot',
			33  => 'booking_settings',
			34  => 'booking_user',
			35  => 'bookmark_data',
			36  => 'bookmark_social_bm',
			37  => 'bookmark_tree',
			38  => 'buddylist',
			39  => 'buddylist_requests',
			40  => 'cache_clob',
			41  => 'cache_text',
			42  => 'cal_auth_token',
			43  => 'cal_cat_assignments',
			44  => 'cal_categories',
			45  => 'cal_categories_hidden',
			46  => 'cal_ch_group',
			47  => 'cal_ch_settings',
			48  => 'cal_entries',
			49  => 'cal_entry_responsible',
			50  => 'cal_notification',
			51  => 'cal_rec_exclusion',
			52  => 'cal_recurrence_rules',
			53  => 'cal_registrations',
			54  => 'cal_shared',
			55  => 'cal_shared_status',
			56  => 'catch_write_events',
			57  => 'chatroom_admconfig',
			58  => 'chatroom_bans',
			59  => 'chatroom_history',
			60  => 'chatroom_proomaccess',
			61  => 'chatroom_prooms',
			62  => 'chatroom_psessions',
			63  => 'chatroom_sessions',
			64  => 'chatroom_settings',
			65  => 'chatroom_smilies',
			66  => 'chatroom_uploads',
			67  => 'chatroom_users',
			68  => 'cmi_comment',
			69  => 'cmi_correct_response',
			70  => 'cmi_custom',
			71  => 'cmi_gobjective',
			72  => 'cmi_interaction',
			73  => 'cmi_node',
			74  => 'cmi_objective',
			75  => 'conditions',
			76  => 'container_reference',
			77  => 'container_settings',
			78  => 'container_sorting',
			79  => 'container_sorting_bl',
			80  => 'container_sorting_set',
			81  => 'content_object',
			82  => 'copg_multilang',
			83  => 'copg_multilang_lang',
			84  => 'copg_pc_def',
			85  => 'copg_pobj_def',
			86  => 'copg_section_timings',
			87  => 'copy_wizard_options',
			88  => 'cp_auxilaryresource',
			89  => 'cp_condition',
			90  => 'cp_datamap',
			91  => 'cp_dependency',
			92  => 'cp_file',
			93  => 'cp_hidelmsui',
			94  => 'cp_item',
			95  => 'cp_manifest',
			96  => 'cp_mapinfo',
			97  => 'cp_node',
			98  => 'cp_objective',
			99  => 'cp_organization',
			100 => 'cp_package',
			101 => 'cp_resource',
			102 => 'cp_rule',
			103 => 'cp_sequencing',
			104 => 'cp_suspend',
			105 => 'cp_tree',
			106 => 'cron_job',
			107 => 'crs_archives',
			108 => 'crs_f_definitions',
			109 => 'crs_file',
			110 => 'crs_groupings',
			111 => 'crs_items',
			112 => 'crs_lm_history',
			113 => 'crs_objective_lm',
			114 => 'crs_objective_qst',
			115 => 'crs_objective_status',
			116 => 'crs_objective_status_p',
			117 => 'crs_objective_tst',
			118 => 'crs_objectives',
			119 => 'crs_settings',
			120 => 'crs_start',
			121 => 'crs_timings_planed',
			122 => 'crs_timings_usr_accept',
			123 => 'crs_user_data',
			124 => 'crs_waiting_list',
			125 => 'ctrl_calls',
			126 => 'ctrl_classfile',
			127 => 'ctrl_structure',
			128 => 'data_cache',
			129 => 'dav_lock',
			130 => 'dav_property',
			131 => 'dbk_translations',
			132 => 'desktop_item',
			133 => 'didactic_tpl_a',
			134 => 'didactic_tpl_abr',
			135 => 'didactic_tpl_alp',
			136 => 'didactic_tpl_alr',
			137 => 'didactic_tpl_fp',
			138 => 'didactic_tpl_objs',
			139 => 'didactic_tpl_sa',
			140 => 'didactic_tpl_settings',
			141 => 'ecs_cmap_rule',
			142 => 'ecs_cms_data',
			143 => 'ecs_cms_tree',
			144 => 'ecs_community',
			145 => 'ecs_container_mapping',
			146 => 'ecs_course_assignments',
			147 => 'ecs_crs_mapping_atts',
			148 => 'ecs_data_mapping',
			149 => 'ecs_events',
			150 => 'ecs_export',
			151 => 'ecs_import',
			152 => 'ecs_node_mapping_a',
			153 => 'ecs_part_settings',
			154 => 'ecs_remote_user',
			155 => 'ecs_server',
			156 => 'event',
			157 => 'event_appointment',
			158 => 'event_file',
			159 => 'event_items',
			160 => 'event_participants',
			161 => 'exc_assignment',
			162 => 'exc_assignment_peer',
			163 => 'exc_crit',
			164 => 'exc_crit_cat',
			165 => 'exc_data',
			166 => 'exc_mem_ass_status',
			167 => 'exc_members',
			168 => 'exc_returned',
			169 => 'exc_usr_tutor',
			170 => 'export_file_info',
			171 => 'export_options',
			172 => 'file_based_lm',
			173 => 'file_data',
			174 => 'file_usage',
			175 => 'frm_data',
			176 => 'frm_notification',
			177 => 'frm_posts',
			178 => 'frm_posts_deleted',
			179 => 'frm_posts_tree',
			180 => 'frm_settings',
			181 => 'frm_thread_access',
			182 => 'frm_threads',
			183 => 'frm_user_read',
			184 => 'glo_advmd_col_order',
			185 => 'glossary',
			186 => 'glossary_definition',
			187 => 'glossary_term',
			188 => 'grp_settings',
			189 => 'help_map',
			190 => 'help_module',
			191 => 'help_tooltip',
			192 => 'history',
			193 => 'il_bibl_attribute',
			194 => 'il_bibl_data',
			195 => 'il_bibl_entry',
			196 => 'il_bibl_overview_model',
			197 => 'il_bibl_settings',
			198 => 'il_block_setting',
			199 => 'il_blog',
			200 => 'il_blog_posting',
			201 => 'il_certificate',
			202 => 'il_cld_data',
			203 => 'il_component',
			204 => 'il_custom_block',
			205 => 'il_dcl_data',
			206 => 'il_dcl_datatype',
			207 => 'il_dcl_datatype_prop',
			208 => 'il_dcl_field',
			209 => 'il_dcl_field_prop',
			210 => 'il_dcl_field_prop_b',
			211 => 'il_dcl_field_prop_s_b',
			212 => 'il_dcl_record',
			213 => 'il_dcl_record_field',
			214 => 'il_dcl_stloc1_value',
			215 => 'il_dcl_stloc2_value',
			216 => 'il_dcl_stloc3_value',
			217 => 'il_dcl_table',
			218 => 'il_dcl_view',
			219 => 'il_dcl_viewdefinition',
			220 => 'il_disk_quota',
			221 => 'il_event_handling',
			222 => 'il_exc_team',
			223 => 'il_exc_team_log',
			224 => 'il_external_feed_block',
			225 => 'il_gc_memcache_server',
			226 => 'il_html_block',
			227 => 'il_md_cpr_selections',
			228 => 'il_media_cast_data',
			229 => 'il_media_cast_data_ord',
			230 => 'il_meta_annotation',
			231 => 'il_meta_classification',
			232 => 'il_meta_contribute',
			233 => 'il_meta_description',
			234 => 'il_meta_educational',
			235 => 'il_meta_entity',
			236 => 'il_meta_format',
			237 => 'il_meta_general',
			238 => 'il_meta_identifier',
			239 => 'il_meta_identifier_',
			240 => 'il_meta_keyword',
			241 => 'il_meta_language',
			242 => 'il_meta_lifecycle',
			243 => 'il_meta_location',
			244 => 'il_meta_meta_data',
			245 => 'il_meta_relation',
			246 => 'il_meta_requirement',
			247 => 'il_meta_rights',
			248 => 'il_meta_tar',
			249 => 'il_meta_taxon',
			250 => 'il_meta_taxon_path',
			251 => 'il_meta_technical',
			252 => 'il_new_item_grp',
			253 => 'il_news_item',
			254 => 'il_news_read',
			255 => 'il_news_subscription',
			256 => 'il_object_def',
			257 => 'il_object_group',
			258 => 'il_object_sub_type',
			259 => 'il_object_subobj',
			260 => 'il_plugin',
			261 => 'il_pluginslot',
			262 => 'il_poll',
			263 => 'il_poll_answer',
			264 => 'il_poll_vote',
			265 => 'il_qpl_qst_fq_res',
			266 => 'il_qpl_qst_fq_res_unit',
			267 => 'il_qpl_qst_fq_ucat',
			268 => 'il_qpl_qst_fq_unit',
			269 => 'il_qpl_qst_fq_var',
			270 => 'il_rating',
			271 => 'il_rating_cat',
			272 => 'il_request_token',
			273 => 'il_subscribers',
			274 => 'il_tag',
			275 => $table_name,
			276 => 'il_verification',
			277 => 'il_wac_secure_path',
			278 => 'il_wiki_contributor',
			279 => 'il_wiki_data',
			280 => 'il_wiki_imp_pages',
			281 => 'il_wiki_missing_page',
			282 => 'il_wiki_page',
			283 => 'int_link',
			284 => 'item_group_item',
			285 => 'itgr_data',
			286 => 'last_visited',
			287 => 'ldap_attribute_mapping',
			288 => 'ldap_rg_mapping',
			289 => 'ldap_role_assignments',
			290 => 'ldap_server_settings',
			291 => 'license_data',
			292 => 'link_check',
			293 => 'link_check_report',
			294 => 'lm_data',
			295 => 'lm_data_transl',
			296 => 'lm_glossaries',
			297 => 'lm_menu',
			298 => 'lm_read_event',
			299 => 'lm_tree',
			300 => 'lng_data',
			301 => 'lng_log',
			302 => 'lng_modules',
			303 => 'lo_access',
			304 => 'loc_rnd_qpl',
			305 => 'loc_settings',
			306 => 'loc_tst_assignments',
			307 => 'loc_tst_run',
			308 => 'loc_user_results',
			309 => 'log_components',
			310 => 'loginname_history',
			311 => 'mail',
			312 => 'mail_attachment',
			313 => 'mail_cron_orphaned',
			314 => 'mail_man_tpl',
			315 => 'mail_obj_data',
			316 => 'mail_options',
			317 => 'mail_saved',
			318 => 'mail_template',
			319 => 'mail_tpl_ctx',
			320 => 'mail_tree',
			321 => 'map_area',
			322 => 'media_item',
			323 => 'member_agreement',
			324 => 'member_noti',
			325 => 'member_noti_user',
			326 => 'mep_data',
			327 => 'mep_item',
			328 => 'mep_tree',
			329 => 'mob_parameter',
			330 => 'mob_usage',
			331 => 'module_class',
			332 => 'note',
			333 => 'note_settings',
			334 => 'notification',
			335 => 'notification_channels',
			336 => 'notification_data',
			337 => 'notification_listener',
			338 => 'notification_osd',
			339 => 'notification_queue',
			340 => 'notification_types',
			341 => 'notification_usercfg',
			342 => 'obj_content_master_lng',
			343 => 'obj_lp_stat',
			344 => 'obj_members',
			345 => 'obj_stat',
			346 => 'obj_stat_log',
			347 => 'obj_stat_tmp',
			348 => 'obj_type_stat',
			349 => 'obj_user_data_hist',
			350 => 'obj_user_stat',
			351 => 'object_data',
			352 => 'object_description',
			353 => 'object_reference',
			354 => 'object_reference_ws',
			355 => 'object_translation',
			356 => 'openid_provider',
			357 => 'orgu_data',
			358 => 'orgu_types',
			359 => 'orgu_types_adv_md_rec',
			360 => 'orgu_types_trans',
			361 => 'page_anchor',
			362 => 'page_editor_settings',
			363 => 'page_history',
			364 => 'page_layout',
			365 => 'page_object',
			366 => 'page_pc_usage',
			367 => 'page_qst_answer',
			368 => 'page_question',
			369 => 'page_style_usage',
			370 => 'personal_clipboard',
			371 => 'personal_pc_clipboard',
			372 => 'pg_amd_page_list',
			373 => 'preview_data',
			374 => 'prg_settings',
			375 => 'prg_translations',
			376 => 'prg_type',
			377 => 'prg_type_adv_md_rec',
			378 => 'prg_usr_assignments',
			379 => 'prg_usr_progress',
			380 => 'qpl_a_cloze',
			381 => 'qpl_a_cloze_combi_res',
			382 => 'qpl_a_errortext',
			383 => 'qpl_a_essay',
			384 => 'qpl_a_imagemap',
			385 => 'qpl_a_kprim',
			386 => 'qpl_a_lome',
			387 => 'qpl_a_matching',
			388 => 'qpl_a_mc',
			389 => 'qpl_a_mdef',
			390 => 'qpl_a_mterm',
			391 => 'qpl_a_ordering',
			392 => 'qpl_a_sc',
			393 => 'qpl_a_textsubset',
			394 => 'qpl_fb_generic',
			395 => 'qpl_fb_specific',
			396 => 'qpl_hint_tracking',
			397 => 'qpl_hints',
			398 => 'qpl_num_range',
			399 => 'qpl_qst_cloze',
			400 => 'qpl_qst_errortext',
			401 => 'qpl_qst_essay',
			402 => 'qpl_qst_fileupload',
			403 => 'qpl_qst_flash',
			404 => 'qpl_qst_horder',
			405 => 'qpl_qst_imagemap',
			406 => 'qpl_qst_javaapplet',
			407 => 'qpl_qst_kprim',
			408 => 'qpl_qst_lome',
			409 => 'qpl_qst_matching',
			410 => 'qpl_qst_mc',
			411 => 'qpl_qst_numeric',
			412 => 'qpl_qst_ordering',
			413 => 'qpl_qst_sc',
			414 => 'qpl_qst_skl_assigns',
			415 => 'qpl_qst_skl_sol_expr',
			416 => 'qpl_qst_textsubset',
			417 => 'qpl_qst_type',
			418 => 'qpl_questionpool',
			419 => 'qpl_questions',
			420 => 'qpl_sol_sug',
			421 => 'rbac_fa',
			422 => 'rbac_log',
			423 => 'rbac_operations',
			424 => 'rbac_pa',
			425 => 'rbac_ta',
			426 => 'rbac_templates',
			427 => 'rbac_ua',
			428 => 'rcat_settings',
			429 => 'read_event',
			430 => 'reg_access_limit',
			431 => 'reg_er_assignments',
			432 => 'reg_registration_codes',
			433 => 'remote_course_settings',
			434 => 'rfil_settings',
			435 => 'rglo_settings',
			436 => 'rgrp_settings',
			437 => 'rlm_settings',
			438 => 'role_data',
			439 => 'role_desktop_items',
			440 => 'rtst_settings',
			441 => 'rwik_settings',
			442 => 'sahs_lm',
			443 => 'sahs_sc13_sco',
			444 => 'sahs_sc13_seq_assign',
			445 => 'sahs_sc13_seq_cond',
			446 => 'sahs_sc13_seq_course',
			447 => 'sahs_sc13_seq_item',
			448 => 'sahs_sc13_seq_mapinfo',
			449 => 'sahs_sc13_seq_node',
			450 => 'sahs_sc13_seq_obj',
			451 => 'sahs_sc13_seq_rule',
			452 => 'sahs_sc13_seq_templ',
			453 => 'sahs_sc13_seq_templts',
			454 => 'sahs_sc13_seq_tree',
			455 => 'sahs_sc13_tree',
			456 => 'sahs_sc13_tree_node',
			457 => 'sahs_user',
			458 => 'sc_item',
			459 => 'sc_manifest',
			460 => 'sc_organization',
			461 => 'sc_organizations',
			462 => 'sc_resource',
			463 => 'sc_resource_dependen',
			464 => 'sc_resource_file',
			465 => 'sc_resources',
			466 => 'scorm_object',
			467 => 'scorm_tracking',
			468 => 'scorm_tree',
			469 => 'search_command_queue',
			470 => 'search_data',
			471 => 'service_class',
			472 => 'settings',
			473 => 'settings_deactivated_s',
			474 => 'shib_role_assignment',
			475 => 'skl_assigned_material',
			476 => 'skl_level',
			477 => 'skl_personal_skill',
			478 => 'skl_profile',
			479 => 'skl_profile_level',
			480 => 'skl_profile_user',
			481 => 'skl_self_eval',
			482 => 'skl_self_eval_level',
			483 => 'skl_skill_resource',
			484 => 'skl_templ_ref',
			485 => 'skl_tree',
			486 => 'skl_tree_node',
			487 => 'skl_usage',
			488 => 'skl_user_has_level',
			489 => 'skl_user_skill_level',
			490 => 'sty_media_query',
			491 => 'style_char',
			492 => 'style_color',
			493 => 'style_data',
			494 => 'style_folder_styles',
			495 => 'style_parameter',
			496 => 'style_setting',
			497 => 'style_template',
			498 => 'style_template_class',
			499 => 'style_usage',
			500 => 'svy_360_appr',
			501 => 'svy_360_rater',
			502 => 'svy_anonymous',
			503 => 'svy_answer',
			504 => 'svy_category',
			505 => 'svy_constraint',
			506 => 'svy_finished',
			507 => 'svy_inv_usr',
			508 => 'svy_material',
			509 => 'svy_phrase',
			510 => 'svy_phrase_cat',
			511 => 'svy_qblk',
			512 => 'svy_qblk_qst',
			513 => 'svy_qpl',
			514 => 'svy_qst_constraint',
			515 => 'svy_qst_matrix',
			516 => 'svy_qst_matrixrows',
			517 => 'svy_qst_mc',
			518 => 'svy_qst_metric',
			519 => 'svy_qst_oblig',
			520 => 'svy_qst_sc',
			521 => 'svy_qst_text',
			522 => 'svy_qtype',
			523 => 'svy_quest_skill',
			524 => 'svy_question',
			525 => 'svy_relation',
			526 => 'svy_settings',
			527 => 'svy_skill_threshold',
			528 => 'svy_svy',
			529 => 'svy_svy_qst',
			530 => 'svy_times',
			531 => 'svy_variable',
			532 => 'sysc_groups',
			533 => 'sysc_tasks',
			534 => 'syst_style_cat',
			535 => 'table_properties',
			536 => 'table_templates',
			537 => 'tax_data',
			538 => 'tax_node',
			539 => 'tax_node_assignment',
			540 => 'tax_tree',
			541 => 'tax_usage',
			542 => 'tos_acceptance_track',
			543 => 'tos_versions',
			544 => 'tree',
			545 => 'tree_workspace',
			546 => 'tst_active',
			547 => 'tst_addtime',
			548 => 'tst_dyn_quest_set_cfg',
			549 => 'tst_invited_user',
			550 => 'tst_manual_fb',
			551 => 'tst_mark',
			552 => 'tst_pass_result',
			553 => 'tst_qst_solved',
			554 => 'tst_result_cache',
			555 => 'tst_rnd_cpy',
			556 => 'tst_rnd_qpl_title',
			557 => 'tst_rnd_quest_set_cfg',
			558 => 'tst_rnd_quest_set_qpls',
			559 => 'tst_seq_qst_answstatus',
			560 => 'tst_seq_qst_checked',
			561 => 'tst_seq_qst_optional',
			562 => 'tst_seq_qst_postponed',
			563 => 'tst_seq_qst_tracking',
			564 => 'tst_sequence',
			565 => 'tst_skl_thresholds',
			566 => 'tst_solutions',
			567 => 'tst_test_defaults',
			568 => 'tst_test_question',
			569 => 'tst_test_result',
			570 => 'tst_test_rnd_qst',
			571 => 'tst_tests',
			572 => 'tst_times',
			573 => 'udf_clob',
			574 => 'udf_data',
			575 => 'udf_definition',
			576 => 'udf_text',
			577 => 'usr_account_codes',
			578 => 'usr_cron_mail_reminder',
			579 => 'usr_data',
			580 => 'usr_data_multi',
			581 => 'usr_ext_profile_page',
			582 => 'usr_form_settings',
			583 => 'usr_portf_acl',
			584 => 'usr_portfolio',
			585 => 'usr_portfolio_page',
			586 => 'usr_pref',
			587 => 'usr_pwassist',
			588 => 'usr_search',
			589 => 'usr_sess_istorage',
			590 => 'usr_session',
			591 => 'usr_session_log',
			592 => 'usr_session_stats',
			593 => 'usr_session_stats_raw',
			594 => 'ut_lp_coll_manual',
			595 => 'ut_lp_collections',
			596 => 'ut_lp_marks',
			597 => 'ut_lp_settings',
			598 => 'ut_lp_user_status',
			599 => 'ut_online',
			600 => 'webr_items',
			601 => 'webr_params',
			602 => 'wiki_page_template',
			603 => 'wiki_stat',
			604 => 'wiki_stat_page',
			605 => 'wiki_stat_page_user',
			606 => 'wiki_stat_user',
			607 => 'wiki_user_html_export',
			608 => 'write_event',
			609 => 'xhtml_page',
			610 => 'xmlnestedset',
			611 => 'xmlnestedsettmp',
			612 => 'xmlparam',
			613 => 'xmltags',
			614 => 'xmlvalue',
		);
	}
}
