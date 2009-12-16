CREATE TABLE category (id BIGINT AUTO_INCREMENT, name TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dp (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, confidence VARCHAR(255), alias TEXT, category_id BIGINT, synopsis TEXT, context TEXT, problem TEXT, problem_details TEXT, solution TEXT, solution_details TEXT, literature TEXT, notes TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dp_relation (source_id BIGINT, target_id BIGINT, type_id BIGINT, INDEX type_id_idx (type_id), PRIMARY KEY(source_id, target_id)) ENGINE = INNODB;
CREATE TABLE relation_type (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE dp ADD CONSTRAINT dp_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL;
ALTER TABLE dp_relation ADD CONSTRAINT dp_relation_type_id_relation_type_id FOREIGN KEY (type_id) REFERENCES relation_type(id) ON DELETE CASCADE;
ALTER TABLE dp_relation ADD CONSTRAINT dp_relation_target_id_dp_id FOREIGN KEY (target_id) REFERENCES dp(id) ON DELETE CASCADE;
ALTER TABLE dp_relation ADD CONSTRAINT dp_relation_source_id_dp_id FOREIGN KEY (source_id) REFERENCES dp(id) ON DELETE CASCADE;
