before starting create an uploads folder in the outermost part of the code or equivalent to index.php
create book and cover folders inside the uploads folder

then create a database with the name “library”

create a users table in the database with the contents :
user_id (primary Key) INT AUTO INCREMENT
username VARCHAR
email VARCHAR
password VARCHAR
profile_img VARCHAR

and books table:
id (Primary Key) INT AUTO INCREMENT
title VARCHAR
author VARCHAR
posted_by FK references user_id
cover VARCHAR
file_name VARCHAR
create_at Time_Stamp() defaults Now
update_at Time_Stamp() defaults Now

or use the data base available in the database table


// ID
sebelum memulai buatlah folder uploads di bagian terluar code atau setara dengan index.php
buat folder book dan cover di dalam folder uploads

lalu buatlah database dengan nama "library"

buat tabel users dalam database dengan isi :
user_id (primary Key) INT AUTO INCREMENT
username VARCHAR
email VARCHAR
password VARCHAR
profil_img VARCHAR



dan tabel books :
id (Primary Key) INT AUTO INCREMENT
title VARCHAR
author VARCHAR
posted_by FK references user_id
cover VARCHAR
file_name VARCHAR
create_at Time_Stamp() default Now
update_at Time_Stamp() default Now

atau gunakan data base yang tersedia di tabel database
