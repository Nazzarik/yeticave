# Insert users
insert into users (email, name, password_hash, avatar)
values
  ('ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', 'img/bfujimoto.jpg'),
  ('kitty_93@li.ru', 'Леночка', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', 'img/user.jpg'),
  ('warrior07@mail.ru', 'Руслан', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', 'img/avatar.jpg');

#   Insert categories
insert into categories (name)
values
  ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');

#   Insert lots
insert into lots (id, name, category_id, image, lot_rate, lot_step, close_date, description)
values
  (1, '2014 Rossignol District Snowboard', 1, 'lot-1.jpg', 10999, 12000, null, 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами.'),
  (2, 'DC Play Mens 2016/2017 Snowboard', 1, 'lot-image.jpg', 159999, 12000, null, 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.'),
  (3, 'Крепления Union Contact Pro 2015 года размер L/XL', 2, 'lot-3.jpg', 8000, 12000, null, 'Еще один лот для теста =)'),
  (4, 'Ботинки для сноуборда DC Mutiny Charocal', 3, 'lot-4.jpg', 10999, 12000, null, 'Тест =)'),
  (5, 'Куртка для сноуборда DC Mutiny Charocal', 4, 'lot-5.jpg', 7500, 12000, null, 'Тестовый лот №5'),
  (6, 'Маска Oakley Canopy', 6, 'lot-6.jpg', 5400, 12000, null, 'Еще один лот для теста =) №6');

#   Insert bets
insert into bets (price, user_id, lot_id)
values
  (10999, 3, 1),
  (159999, 1, 1),
  (8000, 1, 2),
  (10999, 2, 2),
  (7500, 2, 3),
  (9400, 3, 3),
  (7500, 1, 4),
  (9400, 2, 4),
  (7500, 3, 5),
  (9400, 2, 5),
  (7500, 1, 6),
  (9400, 2, 6);

#   Select all categories
select name from categories;



#
# select
#   l.name,
#   l.initial_price,
#   l.image,
#   ifnull((select bi.price from bets bi where l.id = bi.lot_id order by bi.price desc limit 1), l.initial_price) ''actual_price'',
#   count(b.id) ''bet_count'',
#   c.name
# from lots l
#   left join bets b on l.id = b.lot_id
#   join categories c on l.category_id = c.id
# group by l.name, l.initial_price, l.image, c.name;
#
# /*показать лот по его id*/
# select l.*, c.name
# from lots l
#   join categories c on l.category_id = c.id
# where l.id = 1;
#
# /*обновить название лота по его идентификатору*/
# update lots set name = concat(name, '' 2018'') where id = 4;
#
# /*получить список самых свежих ставок для лота по его идентификатору*/
# select b.price
# from bets b
# where b.lot_id = 3
# order by b.create_date desc
# limit 10;
