Select * from users;
Select * from cheese;
Select * from pasta;
Select * from recipes;
Select * from recipe_cheese_join;
Select * from recipe_user_join;
truncate users;

INSERT INTO users (user_password, user_name, user_email, user_fav_che_id) VALUES ('cheese', 'MatthewandCheese', 'marty@mac.com', 6);

INSERT INTO recipes (rec_name, rec_desc, rec_user_id, rec_pas_id) VALUES ('Grandma\'s Recipe', 'Add a little salt and butter', 1, 2);
INSERT INTO recipe_cheese_join (rcj_rec_id, rcj_che_id) VALUES (1, 2);
INSERT INTO recipe_cheese_join (rcj_rec_id, rcj_che_id) VALUES (1, 3);
INSERT INTO recipe_cheese_join (rcj_rec_id, rcj_che_id) VALUES (1, 6);


INSERT INTO recipes (rec_name, rec_desc, rec_user_id, rec_pas_id) VALUES ('Mac Rec - OG', 'W Cheese', 1, 1);
INSERT INTO recipe_cheese_join (rcj_rec_id, rcj_che_id) VALUES (2, 1);
INSERT INTO recipe_cheese_join (rcj_rec_id, rcj_che_id) VALUES (2, 3);

UPDATE recipes
SET rec_desc = 'Add 3.14 tbsps butter and milk'
WHERE rec_id = 3;