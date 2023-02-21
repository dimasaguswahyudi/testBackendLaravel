Panduan Instalasi TestBackend Laravel

1. Download/Clone Project
2. composer install
3. Run Project (php artisan serv)


Terdapat 3 links pada bagian navbar yaitu list, query, chart
1. list untuk melakukan CRUD data anggota
2. Query untuk melihat anak, cucu, bibi, dll
3. Chart untuk melihat struktur keluarga dari budi

API
1. Untuk melihat semua data dari anggota Budi (Method GET)
localhost:8000/api/family

2. Untuk melihat semua anak dari budi (Method GET)
localhost:8000/api/family/anak

3. Untuk meihat semua cucu perempuan dari budi (Method GET)
localhost:8000/api/family/cucuPerempuan

4. Untuk melihat semua cucu laki-laki dari budi (Method GET)
localhost:8000/api/family/cucuLaki
