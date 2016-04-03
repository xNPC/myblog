CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `alias` VARCHAR(255) NOT NULL,
  `anons` TEXT NOT NULL,
  `content` MEDIUMTEXT NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `status` SMALLINT NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB default charset=utf8 auto_increment=1;


CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `alias` VARCHAR(100) NOT NULL,
  `description` VARCHAR(255),
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB default charset=utf8 auto_increment=1;

INSERT INTO `blog_category` (`id`, `name`, `alias`,`description`) VALUES('1','Программирование','programming','');


CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB default charset=utf8 auto_increment=1;


CREATE TABLE `blog_post_tags` (
  `tag_id` int(11),
  `post_id` int(11)
) ENGINE=InnoDB default charset=utf8 auto_increment=1;


ALTER TABLE `blog_post`
  ADD CONSTRAINT `FK-blog_post-category_id-blog_category-id` FOREIGN KEY (`category_id`) REFERENCES `blog_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `blog_post_tags`
  ADD CONSTRAINT `FK-blog_post_tags-tag_id-blog_tags-id` FOREIGN KEY (`tag_id`) REFERENCES `blog_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `blog_post_tags`
  ADD CONSTRAINT `FK-blog_post_tags-post_id-blog_post-id` FOREIGN KEY (`post_id`) REFERENCES `blog_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `blog_post`
  ADD CONSTRAINT `FK-blog_post-author_id-user-id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;