/*
 Navicat Premium Data Transfer

 Source Server         : _developer_local
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : adminsa_db

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 21/02/2023 16:55:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for act_activities
-- ----------------------------
DROP TABLE IF EXISTS `act_activities`;
CREATE TABLE `act_activities`  (
  `act_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `act_lead_id` bigint(20) NULL DEFAULT NULL,
  `act_stage_status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `act_type_code` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `act_create_by` bigint(20) NULL DEFAULT NULL,
  `act_describe_activity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `act_follow_in` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `act_result_of_activity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `act_task_times` datetime(0) NULL DEFAULT NULL,
  `act_task_times_due` datetime(0) NULL DEFAULT NULL,
  `act_comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `act_run_status` enum('beready','running','closed') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `act_priority` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`act_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of act_activities
-- ----------------------------

-- ----------------------------
-- Table structure for act_activity_types
-- ----------------------------
DROP TABLE IF EXISTS `act_activity_types`;
CREATE TABLE `act_activity_types`  (
  `aat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aat_type_code` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aat_type_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aat_icon` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`aat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of act_activity_types
-- ----------------------------

-- ----------------------------
-- Table structure for cst_companies
-- ----------------------------
DROP TABLE IF EXISTS `cst_companies`;
CREATE TABLE `cst_companies`  (
  `cst_id` bigint(20) NOT NULL,
  `cst_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cst_add_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cst_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cst_companies
-- ----------------------------

-- ----------------------------
-- Table structure for cst_contact_emails
-- ----------------------------
DROP TABLE IF EXISTS `cst_contact_emails`;
CREATE TABLE `cst_contact_emails`  (
  `eml_id` int(11) NOT NULL,
  `eml_cnt_id` int(11) NULL DEFAULT NULL,
  `eml_label` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `eml_number` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`eml_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cst_contact_emails
-- ----------------------------

-- ----------------------------
-- Table structure for cst_contact_phones
-- ----------------------------
DROP TABLE IF EXISTS `cst_contact_phones`;
CREATE TABLE `cst_contact_phones`  (
  `pho_id` int(11) NOT NULL,
  `pho_cnt_id` int(11) NULL DEFAULT NULL,
  `pho_label` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pho_number` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`pho_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cst_contact_phones
-- ----------------------------

-- ----------------------------
-- Table structure for cst_locations
-- ----------------------------
DROP TABLE IF EXISTS `cst_locations`;
CREATE TABLE `cst_locations`  (
  `loc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `loc_address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `loc_sub_district` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `loc_city` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `loc_province` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `loc_represent` enum('IND','ORG') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `loc_represent_id` bigint(20) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`loc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cst_locations
-- ----------------------------

-- ----------------------------
-- Table structure for cst_personals
-- ----------------------------
DROP TABLE IF EXISTS `cst_personals`;
CREATE TABLE `cst_personals`  (
  `cnt_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cnt_cst_id` int(11) NULL DEFAULT NULL,
  `cnt_loc_id` int(11) NULL DEFAULT NULL,
  `cnt_fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cnt_nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cnt_company_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `cnt_notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cnt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cst_personals
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for instansis
-- ----------------------------
DROP TABLE IF EXISTS `instansis`;
CREATE TABLE `instansis`  (
  `ins_id` int(11) NOT NULL,
  `ins_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ins_alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ins_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ins_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ins_visi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ins_misi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ins_main_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ins_favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ins_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of instansis
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id_menu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mn_level_user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_parent_id` int(11) NULL DEFAULT NULL,
  `mn_icon_code` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_title` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_slug` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'ADM', 0, 'ar_dashboard.svg', 'Home', 'home', '2022-12-21 15:19:34', '2016-07-28 07:08:51');
INSERT INTO `menus` VALUES (2, 'ADM', 0, 'ar_customer.svg', 'Customer', 'customer', '2023-01-20 11:14:20', '2023-01-18 13:57:12');
INSERT INTO `menus` VALUES (3, 'ADM', 0, 'ar_leads.svg', 'Leads', 'leads', '2023-01-20 11:16:37', '2023-01-18 14:01:55');
INSERT INTO `menus` VALUES (4, 'ADM', 0, 'ar_opportunities.svg', 'Opportunity', 'opportunities', '2023-01-20 11:17:04', '2023-01-18 14:04:03');
INSERT INTO `menus` VALUES (100, 'ADM', 0, 'ar_settings2.svg', 'Pengaturan', 'setting', '2023-01-18 13:58:32', '2014-08-14 01:22:17');
INSERT INTO `menus` VALUES (101, 'ADM', 100, 'ar_items.svg', 'User', 'setting/user', '2023-01-18 13:58:52', '2016-12-08 10:54:08');
INSERT INTO `menus` VALUES (102, 'ADM', 100, 'ar_items.svg', 'Instansi', 'setting/instansi', '2023-01-18 13:58:58', '2019-12-21 00:38:40');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (5, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (6, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for opr_opportunities
-- ----------------------------
DROP TABLE IF EXISTS `opr_opportunities`;
CREATE TABLE `opr_opportunities`  (
  `opr_id` bigint(20) NOT NULL,
  `opr_lead_id` bigint(20) NULL DEFAULT NULL,
  `opr_title` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `opr_status` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` date NULL DEFAULT curdate,
  `opr_close_status` enum('WIN','LOSE') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `opr_estimate_closing` date NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`opr_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opr_opportunities
-- ----------------------------

-- ----------------------------
-- Table structure for opr_opportunity_notes
-- ----------------------------
DROP TABLE IF EXISTS `opr_opportunity_notes`;
CREATE TABLE `opr_opportunity_notes`  (
  `onp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `onp_opportunity_id` int(11) NULL DEFAULT NULL,
  `onp_opportunity_status` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `onp_titlte` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `onp_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `onp_parameter_check` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`onp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opr_opportunity_notes
-- ----------------------------

-- ----------------------------
-- Table structure for opr_product_opportunity
-- ----------------------------
DROP TABLE IF EXISTS `opr_product_opportunity`;
CREATE TABLE `opr_product_opportunity`  (
  `por_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `por_opportunity_id` bigint(20) NULL DEFAULT NULL,
  `por_product_id` int(11) NULL DEFAULT NULL,
  `por_quantity` int(11) NULL DEFAULT NULL,
  `por_unit_value` int(11) NULL DEFAULT NULL,
  `por_total_value` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`por_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opr_product_opportunity
-- ----------------------------

-- ----------------------------
-- Table structure for opr_stage_statuses
-- ----------------------------
DROP TABLE IF EXISTS `opr_stage_statuses`;
CREATE TABLE `opr_stage_statuses`  (
  `oss_id` int(11) NOT NULL AUTO_INCREMENT,
  `oss_status_code` int(11) NULL DEFAULT NULL,
  `oss_status_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `oss_img_preferense` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`oss_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opr_stage_statuses
-- ----------------------------

-- ----------------------------
-- Table structure for opr_value_assumtions
-- ----------------------------
DROP TABLE IF EXISTS `opr_value_assumtions`;
CREATE TABLE `opr_value_assumtions`  (
  `ovs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ovs_opportunity_id` bigint(20) NULL DEFAULT NULL,
  `opr_title` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `opr_value` bigint(20) NULL DEFAULT NULL,
  `opr_vaule_constant` bigint(20) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ovs_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opr_value_assumtions
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for prd_product
-- ----------------------------
DROP TABLE IF EXISTS `prd_product`;
CREATE TABLE `prd_product`  (
  `prd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prd_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prd_vendor` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prd_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`prd_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prd_product
-- ----------------------------

-- ----------------------------
-- Table structure for prd_subproducts
-- ----------------------------
DROP TABLE IF EXISTS `prd_subproducts`;
CREATE TABLE `prd_subproducts`  (
  `psp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `psp_product_id` int(11) NULL DEFAULT NULL,
  `psp_subproduct_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `psp_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`psp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prd_subproducts
-- ----------------------------

-- ----------------------------
-- Table structure for prs_lead_customers
-- ----------------------------
DROP TABLE IF EXISTS `prs_lead_customers`;
CREATE TABLE `prs_lead_customers`  (
  `plc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plc_lead_id` bigint(20) NULL DEFAULT NULL,
  `plc_personal_id` bigint(20) NULL DEFAULT NULL,
  `plc_company_id` bigint(20) NULL DEFAULT NULL,
  `plc_lead_rule` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_by` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`plc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prs_lead_customers
-- ----------------------------

-- ----------------------------
-- Table structure for prs_lead_statuses
-- ----------------------------
DROP TABLE IF EXISTS `prs_lead_statuses`;
CREATE TABLE `prs_lead_statuses`  (
  `pls_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pls_status_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pls_status_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`pls_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prs_lead_statuses
-- ----------------------------

-- ----------------------------
-- Table structure for prs_lead_values
-- ----------------------------
DROP TABLE IF EXISTS `prs_lead_values`;
CREATE TABLE `prs_lead_values`  (
  `lvs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lvs_lead_id` bigint(20) NULL DEFAULT NULL,
  `lvs_base_value` bigint(20) NULL DEFAULT NULL,
  `lvs_target_value` bigint(20) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` date NULL DEFAULT curdate,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`lvs_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prs_lead_values
-- ----------------------------

-- ----------------------------
-- Table structure for prs_leads
-- ----------------------------
DROP TABLE IF EXISTS `prs_leads`;
CREATE TABLE `prs_leads`  (
  `lds_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `lds_title` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lds_describe` int(11) NULL DEFAULT NULL,
  `lds_status` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`lds_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prs_leads
-- ----------------------------

-- ----------------------------
-- Table structure for prs_product_offers
-- ----------------------------
DROP TABLE IF EXISTS `prs_product_offers`;
CREATE TABLE `prs_product_offers`  (
  `pof_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pof_lead_id` bigint(20) NULL DEFAULT NULL,
  `pof_product_id` int(11) NULL DEFAULT NULL,
  `pof_quantity` int(11) NULL DEFAULT NULL,
  `pof_unit_value` int(11) NULL DEFAULT NULL,
  `pof_total_value` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`pof_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prs_product_offers
-- ----------------------------

-- ----------------------------
-- Table structure for prs_qualifications
-- ----------------------------
DROP TABLE IF EXISTS `prs_qualifications`;
CREATE TABLE `prs_qualifications`  (
  `lqs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lqs_lead_id` bigint(20) NULL DEFAULT NULL,
  `lqs_variable` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lqs_var_values` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lqs_parameter` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`lqs_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prs_qualifications
-- ----------------------------

-- ----------------------------
-- Table structure for prs_salesmans
-- ----------------------------
DROP TABLE IF EXISTS `prs_salesmans`;
CREATE TABLE `prs_salesmans`  (
  `slm_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slm_user` int(11) NULL DEFAULT NULL,
  `slm_rules` enum('head','member') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'head',
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`slm_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prs_salesmans
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `phone` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Agus Salim', 'agus123', 'ADM', NULL, '$2y$10$oQgqoiq/sf3ugAqvV1hFJugis285NXL1.8j6MKAwH8XSrtDh1Kzkm', 'agus@webmaster.com', '2022-12-01 15:03:18', NULL, NULL, NULL, '2022-12-01 15:04:29', '2023-02-03 08:28:07', NULL);
INSERT INTO `users` VALUES (4, 'aldi taher', 'aldi', 'ADM', NULL, '$2y$10$oYaYTHFI3EIoOH5m4InQ2uZbRZEs1gCRvXCQI1a30U7zK4bRay6Me', 'aldi@gmail.com', NULL, NULL, NULL, NULL, '2022-12-23 15:33:58', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
