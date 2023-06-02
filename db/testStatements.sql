Select * from users;
Select * from cheese;
Select * from pasta;
Select * from recipes;
Select * from recipe_cheese_join
Where rcj_rec_id = 19;

SELECT *
FROM recipes
JOIN users ON rec_user_id = user_id;
