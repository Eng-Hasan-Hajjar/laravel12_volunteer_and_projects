<div align="center">

<img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
<img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
<img src="https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white"/>
<img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white"/>
<img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge"/>

<br><br>

```
 ██╗███████╗███╗   ███╗ █████╗  █████╗ ██████╗
 ██║██╔════╝████╗ ████║██╔══██╗██╔══██╗██╔══██╗
 ██║█████╗  ██╔████╔██║███████║███████║██████╔╝
 ██║██╔══╝  ██║╚██╔╝██║██╔══██║██╔══██║██╔══██╗
 ██║███████╗██║ ╚═╝ ██║██║  ██║██║  ██║██║  ██║
 ╚═╝╚══════╝╚═╝     ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝
```

# 🏗️ منصة إعمار
### نظام إدارة وتنظيم العمل التطوعي لإعادة إعمار المشاريع الصغيرة

<br>

**منصة إلكترونية متكاملة تربط المتطوعين بأصحاب المشاريع المتضررة**
لتسهيل عملية إعادة بناء المحلات والورش والمرافق الخدمية

<br>

[![المشاريع](https://img.shields.io/badge/المشاريع-مفتوح%20للتطوع-2E7D4F?style=flat-square)](/)
[![المتطوعون](https://img.shields.io/badge/المتطوعون-مرحباً%20بك-F4A024?style=flat-square)](/)
[![الحالة](https://img.shields.io/badge/الحالة-نشط-22c55e?style=flat-square)](/)

</div>

---

## 📋 جدول المحتويات

- [نظرة عامة](#-نظرة-عامة)
- [المميزات الرئيسية](#-المميزات-الرئيسية)
- [لقطات الشاشة](#-لقطات-الشاشة)
- [التقنيات المستخدمة](#-التقنيات-المستخدمة)
- [متطلبات التشغيل](#-متطلبات-التشغيل)
- [التثبيت والإعداد](#-التثبيت-والإعداد)
- [هيكل قاعدة البيانات](#-هيكل-قاعدة-البيانات)
- [أدوار المستخدمين](#-أدوار-المستخدمين)
- [هيكل المشروع](#-هيكل-المشروع)
- [بيانات الدخول التجريبية](#-بيانات-الدخول-التجريبية)
- [المساهمة في المشروع](#-المساهمة-في-المشروع)
- [الترخيص](#-الترخيص)

---

## 🌟 نظرة عامة

**منصة إعمار** هي تطبيق ويب متكامل يهدف إلى دعم جهود إعادة الإعمار من خلال تنظيم وإدارة العمل التطوعي. تربط المنصة بين ثلاثة أطراف رئيسية:

```
┌─────────────────────────────────────────────────────────┐
│                                                         │
│   👤 المتطوع  ←──────→  🏗️ المنصة  ←──────→  🏪 صاحب المشروع  │
│                              ↑                          │
│                         🔑 المدير                        │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

### ما تحله المنصة؟

| المشكلة | الحل |
|---------|------|
| صعوبة إيجاد متطوعين مؤهلين | نظام مطابقة ذكي حسب المهارة والموقع |
| عدم تنظيم فرق العمل | إدارة مهام متكاملة (Kanban Board) |
| ضياع الموارد والتبرعات | نظام تتبع شفاف للتبرعات والموارد |
| غياب المتابعة والتقارير | لوحة تحكم بإحصائيات تفصيلية |
| عدم التوثيق | رفع صور قبل/بعد الإعمار |

---

## ✨ المميزات الرئيسية

<table>
<tr>
<td width="50%">

### 👥 إدارة المستخدمين
- ✅ نظام أدوار متعدد (مدير / متطوع / صاحب مشروع)
- ✅ ملف شخصي كامل لكل متطوع
- ✅ نظام المهارات والتخصصات
- ✅ تتبع ساعات التطوع

</td>
<td width="50%">

### 🏗️ إدارة المشاريع
- ✅ تصنيف المشاريع حسب الأولوية والضرر
- ✅ نظام موافقة إداري
- ✅ تتبع تقدم الإنجاز (Progress Bar)
- ✅ رفع صور قبل/بعد الإعمار

</td>
</tr>
<tr>
<td width="50%">

### 📋 إدارة المهام
- ✅ تقسيم المشروع إلى مهام صغيرة
- ✅ لوحة Kanban تفاعلية
- ✅ توزيع المهام على المتطوعين
- ✅ تتبع حالة كل مهمة

</td>
<td width="50%">

### 🏆 نظام التحفيز
- ✅ نقاط الإنجاز (Gamification)
- ✅ شارات المستوى (مبتدئ → بلاتيني)
- ✅ لوحة المتصدرين
- ✅ تقييم المتطوعين وأصحاب المشاريع

</td>
</tr>
<tr>
<td width="50%">

### 💰 إدارة التبرعات
- ✅ قبول تبرعات مادية وعينية
- ✅ تتبع استخدام الموارد
- ✅ تقارير مالية شفافة

</td>
<td width="50%">

### 📊 التقارير والإحصائيات
- ✅ لوحة تحكم تحليلية
- ✅ رسوم بيانية تفاعلية
- ✅ تقارير حسب المدينة والنوع
- ✅ إحصائيات شهرية

</td>
</tr>
</table>

---

## 📸 لقطات الشاشة

<div align="center">

| الصفحة الرئيسية | لوحة التحكم |
|:-:|:-:|
| ![Home](https://via.placeholder.com/400x250/2E7D4F/ffffff?text=الصفحة+الرئيسية) | ![Dashboard](https://via.placeholder.com/400x250/1B5E35/ffffff?text=لوحة+التحكم) |

| صفحة المشاريع | ملف المتطوع |
|:-:|:-:|
| ![Projects](https://via.placeholder.com/400x250/F4A024/ffffff?text=المشاريع) | ![Profile](https://via.placeholder.com/400x250/3b82f6/ffffff?text=الملف+الشخصي) |

</div>

---

## 🛠️ التقنيات المستخدمة

<div align="center">

| الطبقة | التقنية | الإصدار |
|--------|---------|---------|
| **Backend** | Laravel | 12.x |
| **Language** | PHP | 8.2+ |
| **Database** | MySQL | 8.0+ |
| **Frontend** | Blade Templates | - |
| **CSS Framework** | Bootstrap RTL | 5.3 |
| **Icons** | Bootstrap Icons | 1.11 |
| **Fonts** | Google Fonts (Tajawal/Cairo) | - |
| **Authentication** | Laravel Breeze (Custom) | - |
| **Storage** | Laravel Filesystem | - |

</div>

### المعمارية المستخدمة

```
┌────────────────────────────────────────────────────────────┐
│                    MVC Architecture                         │
│                                                            │
│  Client (Browser)                                          │
│       │                                                    │
│       ▼                                                    │
│  ┌─────────┐    ┌─────────────┐    ┌──────────────────┐   │
│  │  Routes  │───▶│ Controllers │───▶│     Models       │   │
│  └─────────┘    └─────────────┘    └──────────────────┘   │
│                       │                     │              │
│                       ▼                     ▼              │
│                  ┌─────────┐          ┌──────────┐        │
│                  │  Views  │          │ Database │        │
│                  │(Blade)  │          │ (MySQL)  │        │
│                  └─────────┘          └──────────┘        │
└────────────────────────────────────────────────────────────┘
```

---

## 📋 متطلبات التشغيل

قبل البدء، تأكد من توفر المتطلبات التالية:

| المتطلب | الإصدار المطلوب | التحقق |
|---------|----------------|--------|
| PHP | >= 8.2 | `php --version` |
| Composer | >= 2.0 | `composer --version` |
| MySQL | >= 8.0 | `mysql --version` |
| Node.js (اختياري) | >= 18.0 | `node --version` |

---

## 🚀 التثبيت والإعداد

### الخطوة 1: استنساخ المشروع

```bash
git clone https://github.com/your-username/volunteer-platform.git
cd volunteer-platform
```

### الخطوة 2: تثبيت الاعتماديات

```bash
composer install
```

### الخطوة 3: إعداد ملف البيئة

```bash
cp .env.example .env
```

ثم عدّل هذه القيم في `.env`:

```env
APP_NAME="منصة إعمار"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=volunteer_platform
DB_USERNAME=root
DB_PASSWORD=your_password

# مهم جداً — استخدم file لتجنب أخطاء CSRF
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

### الخطوة 4: توليد مفتاح التطبيق

```bash
php artisan key:generate
```

### الخطوة 5: إنشاء قاعدة البيانات

```sql
CREATE DATABASE volunteer_platform CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### الخطوة 6: تشغيل الـ Migrations والـ Seeders

```bash
php artisan migrate --seed
```

### الخطوة 7: ربط مجلد التخزين

```bash
# Windows (كـ Administrator)
php artisan storage:link

# Linux/Mac
php artisan storage:link
chmod -R 775 storage bootstrap/cache
```

### الخطوة 8: تشغيل التطبيق

```bash
php artisan serve
```

ثم افتح المتصفح على: **http://127.0.0.1:8000**

---

## 🗄️ هيكل قاعدة البيانات

```
┌──────────────────────────────────────────────────────────────┐
│                     ERD - Entity Relations                    │
│                                                              │
│  users ─────────────────────────────────────────────────┐   │
│    │                                                     │   │
│    ├──── volunteer_profiles (1:1)                        │   │
│    │                                                     │   │
│    ├──── projects (owner_id) ──────────────────────────┐ │   │
│    │         │                                         │ │   │
│    │         ├──── tasks                               │ │   │
│    │         ├──── project_updates                     │ │   │
│    │         ├──── donations                           │ │   │
│    │         ├──── ratings                             │ │   │
│    │         └──── volunteer_applications              │ │   │
│    │                                                   │ │   │
│    └──── project_volunteer (M:M) ─────────────────────┘ │   │
│                                                          │   │
│  announcements ──────────────────────────────────────────┘   │
│  notifications                                               │
│  sessions / cache / jobs                                     │
└──────────────────────────────────────────────────────────────┘
```

### الجداول الرئيسية

| الجدول | الوصف | الأعمدة الرئيسية |
|--------|-------|-----------------|
| `users` | المستخدمون | id, name, email, role, city |
| `volunteer_profiles` | ملفات المتطوعين | skills, points, rating, hours |
| `projects` | المشاريع | title, type, status, priority, damage_percentage |
| `tasks` | المهام | title, status, assigned_to, estimated_hours |
| `project_volunteer` | ربط المتطوعين بالمشاريع | status, hours_contributed |
| `volunteer_applications` | طلبات التطوع | status, message |
| `ratings` | التقييمات | rating (1-5), comment |
| `donations` | التبرعات | type, amount, status |
| `project_updates` | تحديثات المشاريع | progress_percentage, images |
| `announcements` | الإعلانات | target, is_published |

---

## 👥 أدوار المستخدمين

### 🔑 المدير (Admin)
```
✅ الموافقة على المشاريع أو رفضها
✅ إدارة جميع المستخدمين
✅ عرض التقارير والإحصائيات الشاملة
✅ إدارة الإعلانات
✅ متابعة التبرعات
✅ تغيير حالة المشاريع
```

### 🙋 المتطوع (Volunteer)
```
✅ تصفح المشاريع والتقدم لها
✅ إدارة الملف الشخصي والمهارات
✅ متابعة المهام المكلّف بها
✅ كسب النقاط والشارات
✅ تقديم التقييمات
✅ عرض لوحة المتصدرين
```

### 🏪 صاحب المشروع (Project Owner)
```
✅ تسجيل المشاريع ورفع الصور
✅ قبول أو رفض طلبات التطوع
✅ إدارة مهام المشروع
✅ نشر تحديثات التقدم
✅ استقبال التبرعات
```

---

## 📁 هيكل المشروع

```
volunteer-platform/
│
├── 📁 app/
│   ├── 📁 Http/
│   │   ├── 📁 Controllers/         # 14 Controller
│   │   │   ├── AdminController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── ProjectController.php
│   │   │   ├── VolunteerController.php
│   │   │   ├── TaskController.php
│   │   │   └── Auth/ ...
│   │   └── 📁 Middleware/
│   │       └── RoleMiddleware.php
│   ├── 📁 Models/                  # 9 Models
│   │   ├── User.php
│   │   ├── Project.php
│   │   ├── VolunteerProfile.php
│   │   └── ...
│   ├── 📁 Notifications/
│   │   ├── ProjectStatusChanged.php
│   │   └── ApplicationStatusChanged.php
│   └── 📁 Policies/
│       └── ProjectPolicy.php
│
├── 📁 database/
│   ├── 📁 migrations/              # 7 Migration files
│   ├── 📁 seeders/
│   │   └── DatabaseSeeder.php      # بيانات تجريبية
│   └── 📁 factories/
│
├── 📁 resources/views/             # 35+ Blade Views
│   ├── 📁 layouts/                 # app.blade.php + sidebar
│   ├── 📁 auth/                    # login, register, reset
│   ├── 📁 dashboard/               # admin, volunteer, owner
│   ├── 📁 projects/                # index, show, create, edit
│   ├── 📁 volunteers/              # index, profile, leaderboard
│   ├── 📁 admin/                   # users, projects, reports
│   └── 📁 components/              # reusable components
│
├── 📁 routes/
│   ├── web.php                     # جميع المسارات
│   └── auth.php
│
├── 📁 bootstrap/
│   └── app.php                     # إعدادات Laravel 12
│
└── 📁 config/
    ├── app.php
    ├── auth.php
    ├── database.php
    └── session.php
```

---

## 🔐 بيانات الدخول التجريبية

> ⚠️ **تحذير**: هذه البيانات للاختبار فقط — غيّرها في بيئة الإنتاج!

| الدور | البريد الإلكتروني | كلمة المرور | الصلاحيات |
|-------|-----------------|------------|-----------|
| 🔑 **مدير النظام** | admin@volunteer.com | `password` | كاملة |
| 🙋 **متطوع** | volunteer0@test.com | `password` | محدودة |
| 🏪 **صاحب مشروع** | ahmed@test.com | `password` | محدودة |

---

## 🗺️ خارطة المسارات الرئيسية

```
GET    /                          → الصفحة الرئيسية
GET    /projects                  → قائمة المشاريع
GET    /projects/{id}             → تفاصيل مشروع
GET    /volunteers                → قائمة المتطوعين
GET    /volunteers/leaderboard    → لوحة المتصدرين

--- محمية بـ auth ---
GET    /dashboard                 → لوحة التحكم (حسب الدور)
GET    /my-profile                → ملف المتطوع الشخصي
POST   /projects/{id}/apply       → طلب التطوع
POST   /projects/{id}/donate      → إرسال تبرع

--- admin فقط ---
GET    /admin/users               → إدارة المستخدمين
GET    /admin/projects            → إدارة المشاريع
GET    /admin/reports             → التقارير
GET    /admin/donations           → التبرعات
GET    /admin/announcements       → الإعلانات
```

---

## 🔮 أفكار للتطوير المستقبلي

| الميزة | الوصف | الأولوية |
|--------|-------|---------|
| 🗺️ خرائط Google Maps | عرض المشاريع جغرافياً | عالية |
| 📱 تطبيق موبايل | React Native / Flutter | عالية |
| 🤖 مطابقة ذكية | AI لاقتراح المشاريع المناسبة | متوسطة |
| 🔔 إشعارات فورية | Pusher / WebSockets | متوسطة |
| 💳 بوابة دفع | تبرعات إلكترونية آمنة | متوسطة |
| 📧 إشعارات بريد | تنبيهات البريد الإلكتروني | منخفضة |
| 🌍 تعدد اللغات | دعم الإنجليزية والفرنسية | منخفضة |

---

## 🧪 تشغيل الاختبارات

```bash
# تشغيل جميع الاختبارات
php artisan test

# تشغيل اختبار محدد
php artisan test --filter=ProjectTest

# مع تقرير التغطية
php artisan test --coverage
```

---

## ⚡ أوامر مفيدة

```bash
# إعادة بناء قاعدة البيانات من الصفر
php artisan migrate:fresh --seed

# مسح جميع الكاش
php artisan optimize:clear

# عرض جميع المسارات
php artisan route:list

# تشغيل shell تفاعلي
php artisan tinker

# ربط مجلد التخزين
php artisan storage:link
```

---

## 🤝 المساهمة في المشروع

نرحب بمساهماتك! اتبع هذه الخطوات:

```bash
# 1. Fork المشروع
# 2. أنشئ فرع جديد
git checkout -b feature/amazing-feature

# 3. Commit تغييراتك
git commit -m "feat: إضافة ميزة رائعة"

# 4. Push للفرع
git push origin feature/amazing-feature

# 5. افتح Pull Request
```

### معايير الكود

- اتبع معايير **PSR-12** لكتابة PHP
- أضف **تعليقات بالعربية** للدوال الرئيسية
- اكتب **اختبارات** للمميزات الجديدة
- تأكد من تنسيق الكود: `./vendor/bin/pint`

---

## 🐛 الإبلاغ عن مشكلة

إذا وجدت مشكلة، يرجى:

1. التحقق من [القضايا الموجودة](https://github.com/your-username/volunteer-platform/issues)
2. إنشاء قضية جديدة مع:
   - وصف واضح للمشكلة
   - خطوات إعادة إنتاجها
   - لقطة شاشة إن أمكن
   - إصدار PHP و Laravel

---

## 📄 الترخيص

هذا المشروع مرخّص تحت رخصة **MIT** — راجع ملف [LICENSE](LICENSE) للتفاصيل.

```
MIT License

Copyright (c) 2026 منصة إعمار

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction...
```

---

## 👨‍💻 المطور

<div align="center">

**تم تطويره بـ ❤️ لخدمة المجتمع وإعادة بناء ما دمّرته الكوارث**

```
 ___________________________
|                           |
|   🏗️  منصة إعمار          |
|   معاً نُعيد البناء        |
|___________________________|
```

<br>

![Made with Love](https://img.shields.io/badge/Made%20with-❤️-red?style=for-the-badge)
![For Community](https://img.shields.io/badge/For-المجتمع-2E7D4F?style=for-the-badge)
![Laravel](https://img.shields.io/badge/Built%20with-Laravel-FF2D20?style=for-the-badge&logo=laravel)

</div>

---

<div align="center">

⭐ **إذا أعجبك المشروع، أضف له نجمة على GitHub!** ⭐

</div>