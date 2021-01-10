CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `palette_id` int(11) NOT NULL,
  `color` varchar(7) NOT NULL
);

CREATE TABLE `pallets` (
  `palette_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
);

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
);


ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `palette_FK` (`palette_id`);

ALTER TABLE `pallets`
  ADD PRIMARY KEY (`palette_id`),
  ADD KEY `user_FK` (`user_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pallets`
  MODIFY `palette_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `colors`
  ADD CONSTRAINT `palette_FK` FOREIGN KEY (`palette_id`) REFERENCES `pallets` (`palette_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pallets`
  ADD CONSTRAINT `user_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

