# 📰 News App (PHP & MySQL)

## 📂 محتويات المشروع
- ملفات المشروع (PHP):
  - create_account.php
  - login.php
  - dashboard.php
  - create_category.php
  - list_categories.php
  - create_news.php
  - list_news.php
  - edit_news.php
  - delete_news.php
  - deleted_news.php
  - restore_news.php
  - connectionOnDatabase.php
- ملف قاعدة البيانات:
  - news_app.sql

---

## ⚙️ خطوات التشغيل
1. ضع مجلد المشروع `final_assig` داخل مجلد `htdocs` الخاص بـ XAMPP.
2. شغل **Apache** و **MySQL** من XAMPP Control Panel.
3. افتح [http://localhost/phpmyadmin](http://localhost/phpmyadmin) ثم:
   - اضغط **New** لإنشاء قاعدة بيانات جديدة باسم:
     ```
     news app
     ```
   - اختر **Import**.
   - حمّل ملف **news_app.sql**.
4. افتح المتصفح واذهب إلى:

http://localhost/php_corse/final_assig/dashboard.php

5. يمكنك الآن:
- إنشاء حساب جديد.
- تسجيل الدخول.
- إضافة فئات وأخبار.
- عرض وتعديل وحذف واستعادة الأخبار.

---

## 👩‍💻 المتطلبات
- PHP 8+
- MySQL
- XAMPP / MAMP أو سيرفر محلي مشابه
- متصفح حديث

---

## 📝 ملاحظات
- تأكد من تشغيل Apache و MySQL قبل فتح المشروع.
- الملف `connectionOnDatabase.php` يحتوي بيانات الاتصال بقاعدة البيانات.
