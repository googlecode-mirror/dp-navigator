CREATE TABLE category (id BIGINT AUTO_INCREMENT, name TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dp_version (id BIGINT, name VARCHAR(255) NOT NULL, confidence VARCHAR(255), alias TEXT, category_id BIGINT, synopsis TEXT, context TEXT, problem TEXT, problem_details TEXT, solution TEXT, solution_details TEXT, literature TEXT, notes TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, version BIGINT, PRIMARY KEY(id, version)) ENGINE = INNODB;
CREATE TABLE dp (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, confidence VARCHAR(255), alias TEXT, category_id BIGINT, synopsis TEXT, context TEXT, problem TEXT, problem_details TEXT, solution TEXT, solution_details TEXT, literature TEXT, notes TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, version BIGINT, INDEX category_id_idx (category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dp_relation (source_id BIGINT, target_id BIGINT, type_id BIGINT, INDEX type_id_idx (type_id), PRIMARY KEY(source_id, target_id)) ENGINE = INNODB;
CREATE TABLE relation_type (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id INT AUTO_INCREMENT, user_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id INT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id INT, group_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE dp_version ADD CONSTRAINT dp_version_id_dp_id FOREIGN KEY (id) REFERENCES dp(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE dp ADD CONSTRAINT dp_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL;
ALTER TABLE dp_relation ADD CONSTRAINT dp_relation_type_id_relation_type_id FOREIGN KEY (type_id) REFERENCES relation_type(id) ON DELETE CASCADE;
ALTER TABLE dp_relation ADD CONSTRAINT dp_relation_target_id_dp_id FOREIGN KEY (target_id) REFERENCES dp(id) ON DELETE CASCADE;
ALTER TABLE dp_relation ADD CONSTRAINT dp_relation_source_id_dp_id FOREIGN KEY (source_id) REFERENCES dp(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
