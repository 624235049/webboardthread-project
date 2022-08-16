# ออกแบบตารางฐานข้อมูล

- ตารางข้อมูลสมาชิก
```sql
CREATE TABLE `members` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT  PRIMARY KEY ,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'รหัสผ่าน',
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'ชื่อ',
  `surname` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'นามสกุล',
  `tel` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `nickname` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'ชื่อเล่น',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้าง',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ปรับปรุง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
- ตารางข้อมูลกระทู้
```sql
CREATE TABLE `questions` (
  `id` bigint  UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(191) CHARACTER SET utf8mb4 NOT NULL COMMENT 'หัวข้อกระทู้',
  `detail` text CHARACTER SET utf8mb4 COMMENT 'รายละเอียด',
  `view` int NOT NULL COMMENT 'จำนวนคนอ่าน',
  `reply` int NOT NULL COMMENT 'จำนวนคนตอบ',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้าง',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ปรับปรุง',
  `member_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
- ตารางข้อมูลการแสดงความคิดเห็นต่อกระทู้
```sql
CREATE TABLE `replies` (
  `id` bigint  UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `detail` text CHARACTER SET utf8mb4 NOT NULL COMMENT 'แสดงความคิดเห็น',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้าง',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ปรับปรุง',
  `commenter` varchar(191) CHARACTER SET utf8mb4 NULL COMMENT 'ผู้คอมเม้น',
  `question_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- กำหนด INDEX ให้กับฟิลด์ที่เป็น ForeignKey
```sql
CREATE INDEX member_id ON `questions` (`member_id`);
```
```sql
CREATE INDEX question_id ON `replies` (`question_id`);
```

- ความสัมพันธ์ระหว่างตาราง members กับ questions เป็น One to Many
```sql
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_members` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
```

- ความสัมพันธ์ระหว่างตาราง questions กับ replies เป็น One to Many
```sql
ALTER TABLE `replies`
  ADD CONSTRAINT `fk_replies_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
```

- จำลองข้อมูลสมาชิก
   - [members.sql](/members.sql)
<br>
<br>

---
<p align="center"> จัดทำโปรแกรมคอมพิวเตอร์พัฒนาระบบงานธุรกิจส่วนตัวและหน่วยงาน ใส่ใจคุณภาพ คุ้มราคา ส่งงานตรงเวลา<br>ติดต่อ 086-288-7987 (ท็อป) หรืออีเมล์    itopcybersoft@gmail.com<br>ติดตามผลงานได้ที่ <a href="https://itopcybersoft.com" target="_blank">www.itopcybersoft.com</a></p>
