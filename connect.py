import mysql.connector

db = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database = "skripsi"
)

# cursor = db.cursor()
# cursor.execute("CREATE DATABASE skripsi")

# print("Database berhasil dibuat!")

# if db.is_connected():
#   print("Berhasil terhubung ke database")

# cursor = db.cursor()
# sql = """CREATE TABLE tanggapan (
#   pesan_id INT AUTO_INCREMENT PRIMARY KEY,
#   pesan VARCHAR(255),
#   sentimen Varchar(255)
# )
# """
# cursor.execute(sql)

# print("Tabel customers berhasil dibuat!")